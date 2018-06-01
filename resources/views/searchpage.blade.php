@extends('layouts.app')

@section('content')
  <div class="row">
	
<div class="col-md-6 col-md-offset-3">

<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Search for any book here:</h1>
		</div>
<div class="panel-body">

<form method="POST" action="/search" enctype="multipart/form-data">

{{ csrf_field() }}
	<div class="form-group">
		
                       
        <div class="panel row">
        <div class=" col-md-12">
      		<input id="search" type="text" class="form-control col-md-12" name="searchname" placeholder="Type book name here...">
    		</div>
        </div>
     
<div class="panel-footer">
	<input type="submit" class="btn btn-success pull-right" value="Search">
</div>
</form>
	
</div>
</div>

</div>
	

</div>

</div>



<div class="row">

	@forelse($results as $result)
		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-default">
				<div class="panel-heading"> {{ $result->filepath }} </div>
				<div class="panel-body">
				<span>{{ $result->content }}</span>
				</div>
				<div class="panel-footer"><a href="/books/{{ $result->id }}">Read this book</a>
				</div>
			</div>
		</div>
	@empty
		<div class="">
  <div class="">
    <h1></h1>
  </div>
</div>
	@endforelse	
</div>


@endsection