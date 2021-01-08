@extends('components.template')
@include('partials.datatable')
@section('section')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $data->subject->name }}</h5>
                <p class="card-text bold text-center">Curso</p>
			    <p class="card-text text-center">{{ $data->course->name }}</p>
                {{-- <p class="card-text bold text-center">Profesor</p> --}}
			    {{-- <p class="card-text text-center">{{ $data->teacher->name }} {{ $data->teacher->last_name }}</p> --}}
                <p class="card-text text-center bold">Periodo</p>
                <p class="card-text text-center">{{ \Carbon\Carbon::create($data->period->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::create($data->period->end_date)->format('d/m/Y') }}</p>
                <div class="flex flex-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Lista de Estudiantes
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Students --}}
    <!-- Button trigger modal -->
    <!-- Modal -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error:</strong><br>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
                @endforeach
            </ul>
            <div class="flex flex-center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button>
            </div>
        </div>
    @endif
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @foreach ($data->course_students as $item)
                <div class="card">
                    <div class="card-body">
                                <div class="card-subtitle">
                                    <div class="row m-0">
                                        <div class="col-md-12 col-12">{{ $item->student->name }} {{ $item->student->last_name }}</div>
                                    </div>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>

    <div class="col-md-6 center">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('teacher.class.create') }}" method="post">
                    <input type="hidden" name="course_subject_id" value="{{ $data->id }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Nueva clase</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="flex flex-center">
                        <button class="btn btn-success" type="submit">Crear</button>
                    </div>
                </form>
                <form action="{{ route('teacher.class.masscreate') }}" method="post">
                    <input type="hidden" name="course_subject_id" value="{{ $data->id }}">
                    @csrf
                    <div class="form-group">
                        <label for="">Nueva clase (creación masiva)</label>
                        <textarea name="name" id="" cols="30" rows="10" required class="form-control"></textarea>
                    </div>
                    <div class="flex flex-center">
                        <button class="btn btn-success" type="submit">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /Students --}}
    <div class="col-md-12">
    	<div id="content-class" class="row flex flex-center">
            @foreach($data->class_subject as $class_subject)
            <div class="col-md-10">
                <div class="card" style="box-shadow: 0 1px 3px rgba(0,0,0,0.25), 0 1px 2px rgba(0,0,0,0.24);">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $class_subject->name }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-12">
        <div class="card flex-center flex flex-y" style="box-shadow: 0 1px 3px rgba(0,0,0,0.25), 0 1px 2px rgba(0,0,0,0.24);">
            <h4 class="text-center bold">Porcentaje de actitud negativa detectada</h4>
            <div>
                <div id="cont-percent" data-pct="{{ $percent }}">
                <svg id="percent-element" width="200" height="200" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                  <circle r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                  <circle id="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                </svg>
                
            </div>
        </div>
    </div>
</div>    
<script>


	function saveCommentByClass(event, id){
        event.preventDefault();
		var url = "{{ route('student.class.comment')}}";
		$.easyAjax({
            url: url,
            type: "POST",
            redirect: false,
            data:  $('#form-'+id).serialize(),
            success: function (response) {
                toastr.success(response.message);
            },
            error: function(error){
                toastr.warning(error.responseJSON.message)
            }
        })
	}

    $(document).ready(function() {
        calculatePercent({{ $percent }}, '#percent-element #bar', 'cont-percent');
    });

</script>
@endsection