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
                </div>

                <div class="card-footer">
                    <input class="btn btn-success" type="submit" value="Guardar">
                </div>

            </form>
        </div>
    </div>
</div>
<script>
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
                    showErrors(error);
                }
            },
        });
    }
</script>
