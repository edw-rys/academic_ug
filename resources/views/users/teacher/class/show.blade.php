@extends('components.template')
@include('partials.datatable')
@section('styles_cdn')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet" type="text/css">
@endsection
@section('scripts_cdn')
<script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>
@endsection
@section('section')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div class="card-body">
            <h5 class="card-title fw-bold text-white text-center">{{ $data->subject->name }}</h5>
            <p class="text-white card-text fw-bold text-center">Curso</p>
            <p class="text-white card-text text-center">{{ $data->course->name }}</p>
            {{-- <p class="card-text bold text-center">Profesor</p> --}}
            {{-- <p class="card-text text-center">{{ $data->teacher->name }} {{ $data->teacher->last_name }}</p> --}}
            <p class="card-text text-white text-center fw-bold">Periodo</p>
            <p class="card-text text-white text-center">{{ \Carbon\Carbon::create($data->period->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::create($data->period->end_date)->format('d/m/Y') }}</p>
            <div class="flex flex-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Lista de Estudiantes
                </button>
            </div>
        </div>
        <div class="ml-md-auto py-2 py-md-0">
          {{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
          <a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
        </div>
      </div>
    </div>
  </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            
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
            <h5 class="modal-title" id="exampleModalLabel">Estudiantes</h5>
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
            <h4 class="text-center bold">Porcentaje de actitudes</h4>
            <div class="row">
                <div class="col-md-8" style="margin: auto">
                    <canvas id="pie" width="600" height="400"></canvas>
                </div>
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
            },
            error: function(error){
                $.notify(
                    {
                        icon: 'flaticon-hands-1',
                        title: error.responseJSON.message,
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
        })
	}

    $(document).ready(function() {
        var data = {
            labels: [
                "Actitud negativa",
                "Actitud positiva",
                "Neutral",
                "Sin comentarios",
            ],
            datasets: [
                {
                    data: [
                        {{ round($negative_percent,2) }},
                        {{ round($positive_percent,2) }} ,
                        {{ round($neutral_percent,2) }} ,
                        {{ 100-(round($positive_percent,2) + round($negative_percent,2) + round($neutral_percent,2)) }}
                    ],
                    backgroundColor: [
                        "#FF9E23",
                        "#2DFFD1",
                        "#FCF591",
                        "#C5C5C5",
                    ]
                }]
        };
 
        var pieChart = document.getElementById('pie').getContext('2d');
        var myPieChart = new Chart(pieChart, {
			type: 'pie',
			data: data,
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom',
					labels : {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle : true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
				// tooltips: true,
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		})
    });

</script>
@endsection