<?php

namespace App\DataTables;
// namespace App\DataTables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

trait DataTableBase
{
    /**
     * Get Table ID
     *
     * @return string
     */
    protected function getTableId(): string
    {
        return $this->action . '-table';
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return $this->action . '_' . date('YmdHis');
    }

    /**
     * Get Html
     *
     * @param int $order
     * @param string $orientation
     * @return mixed
     */
    protected function getHtml(int $order = -1, $orientation = 'desc')
    {
        $builder = $this
            ->builder()
            ->minifiedAjax()
            ->setTableId($this->getTableId())
            ->addTableClass('table table-hover table-striped table-bordered dataTable dt-responsive nowrap w-100')
            ->dom('<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>><"row"<"col-sm-12"tr>><"row mt-2"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"p<"text-right"i>>>')
            ->select([
                'style'         => 'os',
                'selector'      => 'td:first-child',
                'blurable'      => true
            ]);

        if (route_exists($this->route . '.index')) {
            $builder = $builder->postAjax([
                'url' => route($this->route . '.index'),
                'type' => 'POST',
                'data' => 'function (d) {
                    let search_filters = $("#search-filters");
                    d.status        = search_filters.find("#status").val();
                    d.departamento  = search_filters.find("#departamento").val();
                    d.tipo_practica  = search_filters.find("#tipo_practica").val();
                }',
            ]);
        }

        $builder
            ->parameters($this->getParameters())
            ->columns($this->getColumns())
            ->buttons($this->getButtons())
            ->language($this->getLanguageTranslation())
            ->stateSave(false)
            ->stateSaveCallback('function (settings, data) {
                window.localStorage.setItem("' . $this->getTableId() . '", JSON.stringify(data));
            }')
            ->stateLoadCallback('function (settings) {
                var data = JSON.parse(window.localStorage.getItem("' . $this->getTableId() . '"));
                if (data) data.start = 0;
                return data;
            }');

        if ($order > -1) {
            $builder->orderBy($order, $orientation);
        }

        return $builder;
    }

    /**
     * Get Parameters
     *
     * @return array
     */
    protected function getParameters(): array
    {
        $pagination = $this->getPaginationLength();
        // dd($pagination);
        return [
            'paging'            => true,
            'pagingType'        => 'numbers',
            'searching'         => true,
            'info'              => true,
            'fixedHeader'       => true,
            'responsive'        => true,
            'searchDelay'       => 350,
            'lengthMenu'        => $pagination,
            'iDisplayLength'    => $pagination,
            'pageLength'        => 10,
            'lengthChange'      => true,
            'initComplete'      => 'function(settings, json) {
                // select2();
                // tooltip();
                let api = this.api();
                let search_filters = $("#search-filters");
                if (search_filters.length > 0) {
                    search_filters.on("click", "#search-filter-submit", function(e) {
                        e.preventDefault();
                        api.draw(true);
                    });
                    search_filters.on("click", "#search-filter-reset", function(e) {
                        let form = $(this).parents("form");
                        form.trigger("reset");
                        form.find(".select2").each(function(index, value) {
                            $(this).val(null).trigger("change");
                        });
                        api.draw(true);
                    });
                }
                //
                $(".dataTables_filter input").unbind().bind("input", function (e) {
                    // If the length is 3 or more characters, or the user pressed ENTER then search
                    if (this.value.length >= 3 || e.keyCode == 13) {
                        api.search(this.value).draw();
                    }
                    // Ensure we clear the search if they backspace far enough
                    if (this.value === "") {
                        api.search("").draw();
                    }
                    return;
                });
            }',
        ];
    }

    /**
     * Get Pagination Length
     *
     * @return array
     */
    protected function getPaginationLength(): array
    {
        $length1 = [5,10,25,50];
        $length2 = [5,10,25,50];

        $pagination_length = 10;

        if (! in_array($pagination_length, $length1, false)) {
            $length1 [] = (int) $pagination_length;
            sort($length1, SORT_REGULAR);
        }

        if (! in_array($pagination_length, $length2, false)) {
            $length2 [] = (int) $pagination_length;
            sort($length2, SORT_REGULAR);
        }

        return [
            array_merge($length1, [-1]),
            array_merge($length2, ['Todos'])
        ];
    }

    /**
     * Check Status For Name or Title Column
     *
     * @param string $name
     * @param Model $query
     * @param string $route
     * @param string $align
     * @return string
     */
    protected function canEditItem(string $name, Model $query, string $route, string $align = 'left'): string
    {
        if (in_array($query->status, ['0', 'inactive', 'blocked', 'deleted'], true)) {
            return '<div class="text-' . $align . '">' . $name . '</div>';
        }

        $optimus = optimus()->encode($query->id);

        return '<div class="text-' . $align . '">' .
            '<a href="' . route($route . '.edit', $optimus) . '" class="text-primary font-weight-normal">' . $name . '</a>' .
            '</div>';
    }

    /**
     * Get Buttons
     *
     * @return array
     */
    protected function getButtons(): array
    {
        $buttons = [];
        // dd(route_exists($this->route . '.create'));
        // Create item
        if (route_exists($this->route . '.create') && have_permission('create_' .$this->action)) {
            $buttons ['addButton'] = [
                'text'          => '<i class="fas fa-plus"></i>' . ' ' . 'Agregar',
                'className'     => 'btn-success rounded mr-3',
                'action'        => 'function(e, dt, node, config) { $.ajaxModal("#modal-component","'.route($this->route . '.create').'");}',
                'attr'          => [
                    'data-toggle'       => 'tooltip',
                    'title'             => 'Nuevo',
                    'aria-label'        => 'Nuevo'
                ]
            ];
        }


        // Print items
        $buttons ['colvis'] = [
            'extend'        => 'colvis',
            'className'     => 'btn-default rounded mx-2',
            'text'          => '<i class="far fa-eye"></i>',
            'attr'          => [
                'data-toggle'       => 'tooltip',
                'title'             => 'Mostrar',
                'aria-label'        => 'Mostrar'
            ]
        ];

        // Refresh items
        $buttons ['refreshButton'] = [
            'text'          => '<i class="fas fa-redo-alt"></i>',
            'className'     => 'btn-default rounded mx-1',
            'action'        => 'function (e, dt, node, config) { dt.ajax.reload(null, false); }',
            'attr'          => [
                'data-toggle'       => 'tooltip',
                'title'             => 'Recargar',
                'aria-label'        => 'Recargar'
            ]
        ];

        return $buttons;
    }

    /**
     * Languages for DataTables
     *
     * @return array
     */
    protected function getLanguageTranslation(): array
    {
        return [
            'sProcessing'       => 'Procesando...',
            'sLengthMenu'       => 'Mostrar _MENU_ registros',
            'sZeroRecords'      => 'No se encontraron resultados.',
            'sEmptyTable'       => 'Ningún dato disponible en esta tabla.',
            'sInfo'             => 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros.',
            'sInfoEmpty'        => 'Mostrando registros del 0 al 0 de un total de 0 registros.',
            'sInfoFiltered'     => '(filtrado de un total de _MAX_ registros)',
            'sInfoPostFix'      => '',
            'sSearch'           => 'Buscar:',
            'sUrl'              => '',
            'sInfoThousands'    => ',',
            'sLoadingRecords'   => 'Cargando...',
            'oPaginate'         => [
                'sFirst'    => 'Primero',
                'sLast'     => 'Último',
                'sNext'     => 'Siguiente',
                'sPrevious' => 'Anterior'
            ],
            'oAria'             =>  [
                'sSortAscending'    => ': Activar para ordenar la columna de manera ascendente.',
                'sSortDescending'   => ': Activar para ordenar la columna de manera descendente.'
            ],
            'buttons'           => [
                'copy'      => 'Copiar',
                'colvis'    => 'Visibilidad'
            ]
        ];
    }
}