@extends('components.template')
@include('partials.datatable')
@section('section')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <span>Periodo: </span>
            <div class="card-body ">
            	<select style="width: 50%" class="select2 center" id="period" onchange="updateDataTable(this.value)">
                    @foreach($periods as $period)
                        <option value="{{ $period->id }}">{{ $period->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 flex" style="margin: 20px">
                        <div class="" style="margin: auto">
                            <h2 class="text-center">{{ $title ?? 'Cursos'}}</h2>
                            {{-- <a href="@if(route_exists($route)) {{ route($route) }} @endif" class="btn btn-primary">Nuevo</a> --}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            {!! $dataTable->table([], false) !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>    
<script>
    function updateDataTable(id) {
        loadTable();
    }
    function loadTable(){
        window.LaravelDataTables["{{$action}}-table"].draw();
    }
    $("#{{$action}}-table").on('preXhr.dt', function (e, settings, data) {
        var period_id = $('#period').val();

        data['period_id'] = period_id;
    });
</script>
@endsection