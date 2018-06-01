@extends('layouts.app')

@section('content')

<div class="row">
	@forelse($books as $book)
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading"> {{ $book->filepath }} </div>
				<div class="panel-heading">
				<span>{{ $book->content }}</span>
				</div>
				
				<div class="panel-body">
					<a class="col-sm-4" href="/books/{{ $book->id }}"><div class="btn btn-primary btn-sm">Read this book</div></a>
					<a class="col-sm-4" href="/pdfjs/web/bookstore/{{$book->filepath}}.pdf" download="{{$book->filepath}}.pdf"><div class="btn btn-success btn-sm">Save Offline</div></a>
				@if((Auth::user()->id) == $book->user_id)
				<form action="/books/{{ $book->id }}" class="col-sm-4" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button href="/books/{{ $book->id }}" class="pull-right btn btn-danger btn-sm">Delete this book</button>
				</form>
				@endif
				</div>
			
			</div>
		</div>
	@empty
		<div class="container">
  <div class="jumbotron">
    <h1>No Books Available</h1>
  </div>
</div>
	@endforelse	
</div>

<div class="col-md6 col-md-offset-3">
	{{$books->links()}}
</div>



@endsection