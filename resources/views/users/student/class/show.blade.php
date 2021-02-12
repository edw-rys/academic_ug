@extends('components.template')
@section('styles_cdn')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet" type="text/css">
@endsection
@section('scripts_cdn')
<script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>
@endsection
@include('partials.datatable')
@section('section')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            	<h5 class="card-title text-center">{{ $data->subject->name }}</h5>
                <p class="card-text bold text-center">Profesor</p>
                <p class="card-text text-center">{{ $data->teacher->name }} {{ $data->teacher->last_name }}</p>
                <p class="card-text bold text-center">Curso</p>
			    <p class="card-text text-center">{{ $data->course->name }}</p>
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
                                @if ($class_subject->comment == null)
                                <form method="POST" class="flex flex-y flex-center" id="form-{{$class_subject->id}}" onsubmit="saveCommentByClass(event, {{ $class_subject->id }} )">
                                    @csrf
                                        <input type="hidden" name="class_id" value="{{$class_subject->id}}">
                                        <input type="hidden" name="class_student_id" value="{{$data->id}}">
                                    <div class="form-group">
                                    <div class="hidden">
                                        @dump($class_subject->comment)
                                    </div>
                                        <textarea class="form-control" name="comment" placeholder="¿Què tal estuvo la clase?" style="min-height: 118px">{{ $class_subject->comment ? $class_subject->comment->comment : '' }}</textarea>
                                        <p id="err-comment" class="hidden helper-block err-fields"></p>
                                    </div>
                                    <div class="flex flex-center">
                                        <button class="btn btn-primary" type="submit">Publicar</button>
                                    </div>
                                </form>
                                @else
                                    <p class="">{{ $class_subject->comment->comment }}</p>
                                @endif
                            </div>
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
            {{-- <div class="row">
                <div class="col-xs-12 col-md-2 col-1">
                    <div id="cont-percent" data-pct="{{ round($negative_percent) }}">
                    <svg id="percent-element" width="200" height="200" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <circle r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                        <circle id="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                    </svg>
                </div>
                <div class="col-xs-12 col-md-2 col-1">
                    <div id="cont-percent" data-pct="{{ round($positive_percent) }}">
                    <svg id="percent-element" width="200" height="200" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <circle r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                        <circle id="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                    </svg>
                </div>
                <div class="col-xs-12 col-md-2 col-1">
                    <div id="cont-percent" data-pct="{{ round($neutral_percent) }}">
                    <svg id="percent-element" width="200" height="200" viewPort="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <circle r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                        <circle id="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.48" stroke-dashoffset="0"></circle>
                    </svg>
                </div>    --}}            
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
                setTimeout(() => {
                    location.reload();
                }, 1000);
            },
            error: function(error){
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