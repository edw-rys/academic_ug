@extends('components.template')
@include('partials.datatable')
@section('section')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            	<select style="width: 50%" class="select2 center" id="period" onchange="updateClass(this.value)">
                    @foreach($periods as $period)
                        <option value="{{ $period->id }}">{{ $period->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12">
    	<div id="content-class" class="row"></div>
    </div>
</div>    
<script>
	function updateClass(id){
		var url = "{{ route('teacher.class.find', ':id')}}";
        url = url.replace(':id', id);
		$.easyAjax({
            url: url,
            type: "GET",
            redirect: false,
            data:  {_token: '{{ csrf_token() }}'},
            success: function (response) {
				$('#content-class').html('');
				for(let data of response){
					var textHtml = loadClass(data);
					$('#content-class').html($('#content-class').html() + textHtml)
				}
            }
        })
	}

	function loadClass(class_){
		var url = "{{ route('teacher.class.show', ':id')}}";
        url = url.replace(':id', class_.id);
		return '<div class="card col-md-3" style="margin: 15px;box-shadow: 0 1px 3px rgba(0,0,0,0.25), 0 1px 2px rgba(0,0,0,0.24);">'+
				'<a href="'+url+'" style="color: #000;text-decoration:none">'+
		  		'<div class="card-body">'+
		    		'<h5 class="card-title text-center">'+class_.subject.name+'</h5>'+
		    		'<p class="card-text text-center">Curso: '+ class_.course.name +'</p>'+
		    		'<p class="card-text"><p class="text-center">Periodo</p><p class="text-center">'+ moment(class_.period.start_date).format('DD/MM/YYYY') + ' - '+ moment(class_.period.end_date).format('DD/MM/YYYY') +'</p></p>'+
		  		'</div>'+
			'</div></a>';
	}
	$(document).ready(function() {
		updateClass($('#period').val());
    });
	// moment(class_.start_date).format('DD/MM/YYYY') + ' - '+ moment(class_.end_date).format('DD/MM/YYYY')
	

</script>
@endsection