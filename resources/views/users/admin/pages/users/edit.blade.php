<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route, $user->id) }}" id="formSave" method="PUT" enctype="multipart/form-data" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Crear {{ $singular_title ?? 'usuario' }}</h3>
                </div>
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="card-body">
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="name">Nombres</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') {{ 'is-invalid' }} @enderror" value="{{ $user->name }}"  autofocus>
                        <p id="err-name" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="last_name">Apellidos</label>
                        <input type="text" id="last_name" name="last_name" class="form-control @error('name') {{ 'is-invalid' }} @enderror" value="{{ $user->last_name }}"  autofocus>
                        <p id="err-last_name" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control @error('name') {{ 'is-invalid' }} @enderror" value="" autofocus>
                        <p class="helper-block">La contraseña se cambiará cuando usted escriba en el campo de texto.</p>
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
            url: '{{route($route, $user->id)}}',
            container: '#formSave',
            type: "PUT",
            redirect: false,
            data: $('#formSave').serialize(), 
            success: function (response) {
                toastr.success(response.message)
                window.LaravelDataTables["{{$action}}-table"].draw()
                
                $('#modal-component').trigger('click');
            },
            error: function (error) {
                toastr.warning(error.responseJSON.message)
                if(error.responseJSON.errors){
                    var dataKeys = Object.keys(error.responseJSON.errors);
                    var dataValues = Object.values(error.responseJSON.errors);
                    for (let index = 0; index < dataKeys.length; index++) {
                        $('#err-'+dataKeys[index])
                            .text(dataValues[index])
                            .removeClass('hidden');
                        
                    }
                }
            },
        });
    }
</script>
