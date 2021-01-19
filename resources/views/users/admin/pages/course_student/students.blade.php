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
<h5 class="text-center">Estudiantes</h5>

@foreach ($data->course_students as $key => $item)
    <div class="card" style="margin: 0">
        <div class="card-body">
            <div class="card-subtitle">
                <div class="row m-0">
                    <div class="col-md-12 col-12">{{ $key + 1 }}. {{ $item->student->name }}
                        {{ $item->student->last_name }}</div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
