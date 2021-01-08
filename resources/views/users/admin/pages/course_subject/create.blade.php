<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route) }}" id="formSave" method="POST" enctype="multipart/form-data" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Asignar {{ 'Profesor-Asignatura' }}</h3>
                </div>

                <div class="card-body">
                    <div class="form-group @error('course_id') {{ 'is-invalid' }} @enderror">
                        <label for="course_id">Curso</label>
                        <select name="course_id" class="select2" id="course_id">
                            @foreach ($course_all as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <p id="err-course_id" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('teacher_id') {{ 'is-invalid' }} @enderror">
                        <label for="teacher_id">Profesor</label>
                        <select name="teacher_id" class="select2" id="teacher_id">
                            @foreach (getUsersByRole('teacher')->where('status', 'active')->get() as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->last_name }} {{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        <p id="err-teacher_id" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('subject_id') {{ 'is-invalid' }} @enderror">
                        <label for="subject_id">Asignatura</label>
                        <select name="subject_id" class="select2" id="subject_id">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        <p id="err-subject_id" class="hidden helper-block err-fields"></p>
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
    $('.select2').select2();
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
                toastr.success(response.message)
                // document.getElementById("formSave").reset();
                window.LaravelDataTables["{{$action}}-table"].draw()
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
