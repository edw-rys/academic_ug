<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route) }}" id="formSave" method="POST" enctype="multipart/form-data" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Crear {{ $singular_title ?? 'Asignatura' }}</h3>
                </div>

                <div class="card-body">
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="name">Nombres</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') {{ 'is-invalid' }} @enderror" value="{{ old('name') }}"  autofocus>
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
            url: '{{route($route)}}',
            container: '#formSave',
            type: "POST",
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
                document.getElementById("formSave").reset();
                window.LaravelDataTables["{{$action}}-table"].draw()
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
