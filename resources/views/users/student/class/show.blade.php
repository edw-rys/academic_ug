@extends('components.template')
@include('partials.datatable')
@section('section')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            	<h5 class="card-title text-center">{{ $data->subject->name }}</h5>
                <p class="card-text bold text-center">Profesor</p>
			    <p class="card-text text-center">{{ $data->teacher->name }} {{ $data->teacher->last_name }}</p>
                <p class="card-text text-center bold">Periodo</p>
                <p class="card-text text-center">{{ \Carbon\Carbon::create($data->period->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::create($data->period->end_date)->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
    	<div id="content-class" class="row flex flex-center">
            @foreach($data->class_subject as $class_subject)
            <div class="col-md-10">
                <div class="card" style="box-shadow: 0 1px 3px rgba(0,0,0,0.25), 0 1px 2px rgba(0,0,0,0.24);">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $class_subject->name }}</h5>
                            <div class="">
                                <form method="POST" class="flex flex-y flex-center" id="form-{{$class_subject->id}}" onsubmit="saveCommentByClass(event, {{ $class_subject->id }} )">
                                    @csrf
                                        <input type="hidden" name="class_id" value="{{$class_subject->id}}">
                                        <input type="hidden" name="class_student_id" value="{{$data->id}}">
                                    <div class="form-group">
                                        <div class="hidden">
                                        @dump($class_subject->comment)
                                        </div>
                                        <textarea class="form-control" name="comment" placeholder="¿Què tal estuvo la clase?" style="min-height: 118px">{{ $class_subject->comment ? $class_subject->comment->comment : '' }}</textarea>
                                        
                                    </div>
                                    <div class="flex flex-center">
                                        <button class="btn btn-primary" type="submit">Publicar</button>
                                    </div>
                                </form>
                            </div>
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
		var url = "{{ route('user.student.class.comment')}}";
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