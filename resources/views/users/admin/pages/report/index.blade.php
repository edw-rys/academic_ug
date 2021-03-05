@extends('components.template')
@section('section')
<div class="row">
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route($route) }}" id="formSave" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h3 class="text-center">Contruir {{ $singular_title ?? 'Reporte' }}</h3>
                        </div>
                        <div class="row" style="margin: 0 10px">
                            {{-- PERIOD --}}
                            <div class="form-group col-md-6 flex flex-y col-12">
                                <label for="name">Periodos</label>
                                <select type="text" id="period_id" name="period_id[]" multiple class="form-control select2"  autofocus>
                                    {{-- <option value="all">Todos</option> --}}
                                    @foreach ($periods as $period)
                                        <option value="{{ $period->id }}">{{ \Carbon\Carbon::create($period->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::create($period->end_date)->format('d/m/Y')  }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            {{-- COURSE --}}
                            <div class="form-group col-md-6 flex flex-y col-12">
                                <label for="name">Cursos</label>
                                <select type="text" id="course_id" name="course_id[]" multiple class="form-control select2"  autofocus>
                                    {{-- <option value="all">Todos</option> --}}
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            {{-- Teacher --}}
                            <div class="form-group col-md-6 flex flex-y col-12">
                                <label for="name">Profesor</label>
                                <select type="text" id="teacher_id" name="teacher_id[]" multiple class="form-control select2"  autofocus>
                                    {{-- <option value="all">Todos</option> --}}
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                            {{-- Subject --}}
                            <div class="form-group col-md-6 flex flex-y col-12">
                                <label for="name">Asignatura</label>
                                <select type="text" id="subject_id" name="subject_id[]" multiple class="form-control select2"  autofocus>
                                    {{-- <option value="all">Todos</option> --}}
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                        <div class="card-footer flex flex-center">
                            <input class="btn btn-success" type="submit" value="Consultar">
                        </div>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (isset($reports) && !empty($reports))
        <div class="flex flex-center">
            <button class="btn btn-sm btn-info" id="printButton" onclick="printPDF()">Imprimir</button>
        </div>
        <div id="table_print" class="col-md-12">
            <div class="flex flex-center">
                <div style="background: #06418F">
                    <img src="{{ asset('img/logo.png') }}" alt="navbar brand" class="navbar-brand" style="width: 180px">
                </div>
            </div>

            @foreach ($reports as $report)    
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Periodo: {{ \Carbon\Carbon::create($period->start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::create($period->end_date)->format('d/m/Y')  }}</h3>
                        {{-- Courses --}}
                        <div style="margin-bottom: 25px">
                            <h4 class="text-center">Cursos</h4>
                            @foreach ($report->course_list as $course)
                            @php
                                $total_neg = 0;
                                $total_pos = 0;
                                $total_neu = 0;
                            @endphp
                                <h5 class="text-center">{{ $course->name}}</h5>
                                @if (isset($course->data_list))
                                <div style="display: flex;justify-content: center;align-self: center" class="m-2">
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th class="text-center p-1">Profesor</th>
                                                <th class="text-center p-1">Asignatura</th>
                                                <th class="text-center p-1">Positivismo</th>
                                                <th class="text-center p-1">Neutralidad</th>
                                                <th class="text-center p-1">Negatividad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($course->data_list as $key=> $item)
                                                    <tr>
                                                        <td class="text-center p-2">{{ $item->teacher ? $item->teacher->name : '-' }}</td>
                                                        <td class="text-center p-2">{{ $item->subject ? $item->subject->name : '-' }}</td>
                                                        <td class="text-center p-2">{{ $item->percetages ? number_format($item->percetages->negative_percent, 2) : '0' }}%</td>
                                                        <td class="text-center p-2">{{ $item->percetages ? number_format($item->percetages->positive_percent, 2) : '0' }}%</td>
                                                        <td class="text-center p-2">{{ $item->percetages ? number_format($item->percetages->neutral_percent, 2) : '0' }}%</td>
                                                    </tr>
                                                    @php
                                                        $total_neg = $total_neg + ($item->percetages ? $item->percetages->negative_percent : 0);
                                                        $total_pos = $total_pos + ($item->percetages ? $item->percetages->positive_percent : 0);
                                                        $total_neu = $total_neu + ($item->percetages ? $item->percetages->neutral_percent : 0);
                                                    @endphp
                                                @endforeach
                                            <tr style="background: #0b408d24">
                                                <td class="text-center p-2">Total Curso</td>
                                                <td class="text-center p-2"></td>
                                                <td class="text-center p-2">{{ $total_neg ? number_format($total_neg/ count($course->data_list), 2) : '0' }}%</td>
                                                <td class="text-center p-2">{{ $total_pos ? number_format($total_pos/ count($course->data_list), 2) : '0' }}%</td>
                                                <td class="text-center p-2">{{ $total_neu ? number_format($total_neu/ count($course->data_list), 2) : '0' }}%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                    <p class="text-center">No hay información</p>
                                @endif

                            @endforeach
                        </div>
                        
                    </div>
                </div>
            @endforeach    
        </div>
    @endif
</div>    
<script>
     function printPDF() {
        var mode = 'iframe'; //popup

        var close = mode == "popup";
        var options = { mode : mode, popClose : close, popHt: 500 , popWd: 100 };
        $("#table_print").printArea( options );
    }
</script>
@endsection