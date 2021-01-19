
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
        <div class="card flex-center flex flex-y" style="box-shadow: 0 1px 3px rgba(0,0,0,0.25), 0 1px 2px rgba(0,0,0,0.24);">
            <h4 class="text-center bold">Porcentaje de actitudes</h4>
            <div class="row">
                <div class="col-md-8" style="margin: auto">
                    <canvas id="pie" width="600" height="400"></canvas>
                </div>
            </div>            
            {{-- </div>  --}}
        </div>
    </div>

    <div class="col-md-12">
        <div class="card flex-center flex flex-y" style="box-shadow: 0 1px 3px rgba(0,0,0,0.25), 0 1px 2px rgba(0,0,0,0.24);">
            <h4 class="text-center bold">Peores Comentarios</h4>
            <div class="row">
                <ul>
                    @foreach ($data->class_subject as $cs)
                        @foreach ($cs->comments as $comment)
                            @if ($comment->negative>0.5)
                                <li class="col-md-8" style="margin: auto">
                                    {{ $comment->comment}}
                                </li>
                                
                            @endif
                        @endforeach
                    @endforeach
                </ul>
            </div>            
            {{-- </div>  --}}
        </div>
    </div>
</div>    
<script>

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
 
        /*var pie = document.getElementById('pie');
        var pieConfig = new Chart(pie, {
            type: 'pie',
            data: data,
            options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: true, // Add to prevent default behaviour of full-width/height 
            }
        });*/
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
