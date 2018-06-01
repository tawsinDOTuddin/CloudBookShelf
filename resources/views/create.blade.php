@extends('layouts.app')

@section('content')
<div class="row">
	
<div class="col-md-6 col-md-offset-3">

<div class="panel panel-default">
	<div class="panel-heading">
		<h1>Upload a book</h1>
		</div>
<div class="panel-body">

<form method="POST" action="/books" enctype="multipart/form-data">

{{ csrf_field() }}
	<div class="form-group">
		<div class="panel row">
            <label class="col-md-4 control-label" name="resume">Upload pdf:</label>
            
                <input  type="file" id="book" placeholder="Book" name="book" class=""/>
            </div>
                       
            <div class="panel row">
            <label class="col-md-4 control-label" name="resume">Book Name:</label>
           <input  type="text" id="filepath" placeholder="Book Name" name="filepath" class=""/>
       		</div>
     <div class="panel">
	<label for="content"> Book Description </label>
	<TEXTAREA name="content" class="form-control"></TEXTAREA>
</div>
<div class="panel-footer">
	<input type="submit" class="btn btn-success btn-lg btn-block" value="Upload">
</div>
</form>
	
</div>
</div>

</div>
	

</div>

</div>
@endsection