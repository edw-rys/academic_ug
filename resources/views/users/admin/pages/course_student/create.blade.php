<div class="row">
    
    <div class="col-sm-12">
        <div class="card">
            <form action="{{ route($route) }}" id="formSave" method="POST" enctype="multipart/form-data" onsubmit="saveData(event)">
                @csrf

                <div class="card-header">
                    <h3>Asignar {{ 'Estudiante' }}</h3>
                </div>

                <div class="card-body">
                    <div class="form-group @error('course_id') {{ 'is-invalid' }} @enderror">
                        <label for="course_id">Curso</label>
                        <select style="width: 100%" name="course_id" class="select2" id="course_id" onchange="searchData(this.value)">
                            @foreach ($course_all as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <p id="err-course_id" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('course_subject_id') {{ 'is-invalid' }} @enderror">
                        <label for="course_subject_id">Curso</label>
                        <select style="width: 100%" name="course_subject_id" class="select2" id="course_subject_id">
                        </select>
                        <p id="err-course_subject_id" class="hidden helper-block err-fields"></p>
                    </div>
                    <div class="form-group @error('student_id') {{ 'is-invalid' }} @enderror">
                        <label for="student_id">Estudiante</label>
                        <select style="width: 100%" name="student_id" class="select2" id="student_id">
                            @foreach (getUsersByRole('student')->where('status', 'active')->get() as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->last_name }} {{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        <p id="err-student_id" class="hidden helper-block err-fields"></p>
                    </div>

                </div>

                <div class="card-footer">
                    <input class="btn btn-success" type="submit" value="Guardar">
                </div>
                <span class="alert alert-warning">Los datos se agregarán al periodo actual</span>

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
                // document.getElementById("formSave").reset();
                window.LaravelDataTables["{{$action}}-table"].draw()
            },
            error: function (error) {
                showErrors(error);
            },
        });
    }

    function searchData(id) {
        
        $('#course_subject_id').empty(null).trigger('change');

        var url = "{{route('admin.course_subject.by-curse', ':id')}}";
        url = url.replace(':id', id)
        $.easyAjax({
            url: url,
            container: '#formSave',
            type: "GET",
            redirect: false,
            success: function (response) {
                response.forEach(data=>{
                    var newOption = new Option(
                        data.teacher.name + ' ' + data.teacher.last_name +' - ' +data.subject.name, data.id, false, false
                    );
                    $('#course_subject_id').append(newOption).trigger('change');
                });
                console.log(response);
            },
        });
    }
    $(document).ready(function() {
        searchData($('#course_id').val());
    });


</script>
