
@section('styles_cdn')
    @parent
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/r-2.2.3/rr-1.2.6/sl-1.3.1/datatables.min.css">
@endsection

@section('scripts_cdn')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/fh-3.1.6/r-2.2.3/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

@endsection

@section('scripts')
    @parent
    @isset($dataTable)
        <script>{{ $dataTable->generateScripts() }}</script>
    @endisset
@endsection
