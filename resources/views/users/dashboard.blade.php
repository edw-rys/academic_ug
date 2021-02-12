@extends('components.template')
<!-- partial -->
@section('styles_cdn')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet" type="text/css">
@endsection
@section('scripts_cdn')
    <script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js">
    </script> --}}
@endsection
@section('section')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">{{ titleView() }}</h2>
                    {{-- <h5 class="text-white op-7 mb-2">Free Bootstrap 4 Admin Dashboard
                    </h5> --}}
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    {{-- <a href="#"
                        class="btn btn-white btn-border btn-round mr-2">Manage</a>
                    <a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Estadísticas por periodo</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 375px">
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <div id="myChartLegend"></div>
                    </div>
                </div>
            </div>
            {{-- Teachers --}}
            @if (auth()->user()->hasRole('student') || auth()->user()->hasRole('teacher'))
              <div class="col-md-6 col-xs-4">
                  <div class="card">
                      <div class="card-body">
                          <div class="card-title fw-mediumbold">Asignaturas del periodo {{$data->period->name}}</div>
                          <div class="card-list">
                            @foreach ($data->subjects as $item)
                              <div class="item-list">
                                  <div class="avatar">
                                      <img src="{{ asset('img/subject.jpg') }} " alt="..." class="avatar-img rounded-circle">
                                  </div>
                                  <div class="info-user ml-3">
                                      <div class="username">{{ $item->subject->name}}</div>
                                      <div class="status">{{ $item->course->name}}</div>
                                  </div>
                                  <a href="{{ route($data->routeinit.'.class.show', $item->id)}}" class="btn btn-icon btn-primary btn-round btn-xs pt-0">
                                      Ir
                                  </a>
                              </div>
                            @endforeach
                          </div>
                      </div>
                  </div>
              </div>
            @endif
            @if (auth()->user()->hasRole('student'))
              <div class="col-md-6">
                  <div class="card full-height">
                      <div class="card-header">
                          <div class="card-title">Últimas Clases</div>
                      </div>
                      <div class="card-body">
                          <ol class="activity-feed">
                            @foreach ($data->classes as $item)
                              <li class="feed-item feed-item-color" style="--btn-item-color: {{$item->course_subject->subject->color}}">
                                  <time class="date" datetime="9-25">{{ $item->created_at->format('d/m/Y')}}</time>
                                  <span class="text">{{ $item->course_subject->subject->name }}<a href="{{ route($data->routeinit.'.class.show', $item->course_subject->id)}}">"{{ $item->name }}"</a></span>
                              </li>
                            @endforeach
                          </ol>
                      </div>
                  </div>
              </div>
            @endif
        </div>

        <div class="row">
        </div>
    </div>
    <script>
      $(document).ready(function() {
        loadStadistic();
      });
      function loadStadistic() {
        $.easyAjax({
            url: "{{route('user.dashboard.Statistics')}}",
            type: "GET",
            redirect: false,
            success: function (response) {
              console.log(response);
              // Periods
              var periods = response.map(e=>e.period.name);
              var neg = [];
              var pos = [];
              var neu = [];
              for (const item of response) {
                neg.push(Number.parseFloat(item.negative_percent).toFixed(2));
                pos.push(Number.parseFloat(item.positive_percent).toFixed(2));
                neu.push(Number.parseFloat(item.neutral_percent).toFixed(2));
              }
              createGrapicth(
                periods,[
                  // Neg
                //   addDataGraph('Negativismo', '#fdaf4b','rgba(253, 175, 75, 0.6)','rgba(253, 175, 75, 0.4)', '#fdaf4b',neg), 
                  addDataGraph('Negativismo', '#f3545d','rgba(243, 84, 93, 0.6)','rgba(243, 84, 93, 0.4)', '#f3545d',neg), 
                  // Pos
                  addDataGraph('Positivos', '#177dff','rgba(23, 125, 255, 0.6)','rgba(23, 125, 255, 0.4)', '#177dff',pos), 
                //   addDataGraph('Positivos', '#fdaf4b','rgba(253, 175, 75, 0.6)','rgba(253, 175, 75, 0.4)', '#fdaf4b',pos), 
                  // Neu
                  addDataGraph('Neutral', '#fdaf4b','rgba(253, 175, 75, 0.6)','rgba(253, 175, 75, 0.4)', '#fdaf4b',neu)
                //   addDataGraph('Neutral', '#177dff','rgba(23, 125, 255, 0.6)','rgba(23, 125, 255, 0.4)', '#177dff',neu)
                ]
              );
            },
            error: function (error) {
            },
        });
      }
      function addDataGraph(label, borderColor, pointBackgroundColor, backgroundColor,legendColor, data) {
        return {
                  label: label,
                  borderColor: borderColor,
                  pointBackgroundColor: pointBackgroundColor,
                  pointRadius: 0,
                  backgroundColor: backgroundColor,
                  legendColor: legendColor,
                  fill: true,
                  borderWidth: 2,
                  data: data
                }
      }
    </script>
@endsection
