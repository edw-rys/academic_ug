<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route, $item->id) }}" id="formSave" method="PUT" enctype="multipart/form-data" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Crear {{ $singular_title ?? 'usuario' }}</h3>
                </div>
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="card-body">
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="name">Nombres</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') {{ 'is-invalid' }} @enderror" value="{{ $item->name }}"  autofocus>
                        <p id="err-name" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="start_date">Fecha de inicio</label>
                        <input type="text" id="start_date" name="start_date" class="form-control @error('start_date') {{ 'is-invalid' }} @enderror" value="{{ $item->start_date }}"  autofocus>
                        <p id="err-start_date" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('end_date') {{ 'is-invalid' }} @enderror">
                        <label for="end_date">Fecha de fin</label>
                        <input type="text" id="end_date" name="end_date" class="form-control @error('end_date') {{ 'is-invalid' }} @enderror" value="{{ $item->end_date }}"  autofocus>
                        <p id="err-end_date" class="hidden helper-block err-fields"></p>
                    </div>
                </div>

                <div class="card-footer">
                    <input class="btn btn-success" type="submit" value="Guardar">
                </div>

            </form>
        </div>
    </div>
</div>
<script src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script>

    $("#start_date").datepicker({
        format: '{{ config('app_academic.setting.date_picker') }}',
        todayHighlight: true,
        autoclose: true,
        defaultDate: new Date()
    }).on('changeDate', function (selected) {
        $('#end_date').datepicker({
            format: '{{ config('app_academic.setting.date_picker') }}',
            autoclose: true,
            todayHighlight: true,
            defaultDate: new Date()
        });
        var minDate = new Date(selected.date.valueOf());
        $('#end_date').datepicker("update", minDate);
        $('#end_date').datepicker('setStartDate', minDate);
    });
    $("#start_date").datepicker("setDate", new Date('{{$item->start_date}}'));
    $("#end_date").datepicker("setDate", new Date('{{$item->end_date}}'));
    function saveData(event){
        $('.err-fields').addClass('hidden')
        event.preventDefault();
        $.easyAjax({
            url: '{{route($route, $item->id)}}',
            container: '#formSave',
            type: "PUT",
            redirect: false,
            data: $('#formSave').serialize(), 
            success: function (response) {
                $.notify(
                    {
                        icon: 'flaticon-hands',
                        title: response.message,
                        message: '',
                    },{
                    type: 'info',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    time: 1000,
                });
                window.LaravelDataTables["{{$action}}-table"].draw()
                
                $('#modal-component').trigger('click');
            },
            error: function (error) {
                // $.notify(
                //     {
                //         icon: 'flaticon-hands-1',
                //         title: error.responseJSON.message,
                //         message: '',
                //     },{
                //     type: 'warning',
                //     placement: {
                //         from: "bottom",
                //         align: "right"
                //     },
                //     time: 1000,
                // });
                if(error.responseJSON.errors){
                    var dataKeys = Object.keys(error.responseJSON.errors);
                    var dataValues = Object.values(error.responseJSON.errors);
                    for (let index = 0; index < dataKeys.length; index++) {
                        $('#err-'+dataKeys[index])
                            .text(dataValues[index])
                            .removeClass('hidden');
                        $.notify(
                            {
                                icon: 'flaticon-hands-1',
                                title: dataValues[index],
                                message: '',
                            },{
                            type: 'warning',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            time: 1000,
                        });
                    }
                }
            },
        });
    }
</script>
