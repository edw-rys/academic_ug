@extends('components.template')
@include('partials.datatable')
@section('section')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    {!! $dataTable->table([], false) !!}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection