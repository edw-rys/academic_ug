<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route) }}" id="formSave" method="POST" enctype="multipart/form-data" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Crear {{ $singular_title ?? 'usuario' }}</h3>
                </div>

                <div class="card-body">
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="name">Nombres</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') {{ 'is-invalid' }} @enderror" value="{{ old('name') }}"  autofocus>
                        <p id="err-name" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="last_name">Apellidos</label>
                        <input type="text" id="last_name" name="last_name" class="form-control @error('name') {{ 'is-invalid' }} @enderror" value="{{ old('name') }}"  autofocus>
                        <p id="err-last_name" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('name') {{ 'is-invalid' }} @enderror">
                        <label for="email">Correo</label>
                        <input type="email" id="email" name="email" class="form-control @error('name') {{ 'is-invalid' }} @enderror" value="{{ old('name') }}" required autofocus>
                        <p id="err-email" class="hidden helper-block err-fields"></p>
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
                showErrors(error);
            },
        });
    }
</script>
