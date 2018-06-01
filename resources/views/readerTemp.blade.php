@extends('layouts.app')

@section('content')




<h1>Currently reading: {{$book->filepath}}</h1>
<iframe src="/pdfjs/web/viewer.html?file=bookstore/{{$book->filepath}}.pdf" style="border: 0" width="100%" height="800" frameborder="0" scrolling="no"></iframe>

<div class="panel col-md-8">
<form method="POST" action="/comments" enctype="multipart/form-data">

{{ csrf_field() }}
	<div class="form-group">
            <label class="col-md-3 control-label" name="resume">Write a comment:</label>
           <!--input  type="text" id="filepath" placeholder="Book Name" name="filepath" class=""/-->
	<TEXTAREA name="comment_body" class="form-control"></TEXTAREA>
	<input type="hidden" name="book_id" value="{{ $book->id }}">
	<input type="submit" class="btn btn-success pull-right" value="Comment">
</form>
</div>
</br></br>
@foreach($book->comments as $comment)
	<div class="panel">
		<div class="panel panel-info">
		<div class="panel-heading"> {{$comment->user->name}} </div>
				<div class="panel-body">
					{{ $comment->comment_body }}
			</div>
			<div class="panel-footer">{{ $comment->created_at }}
				@if((Auth::user()->id) == $book->user_id)
				<form action="/comments/{{ $comment->id }}" class="pull-right" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button href="/comments/{{ $comment->id }}" class="btn btn-danger btn-sm">Delete this comment</button>
				</form>
				@endif

			</div>
		</div>
	</div>
@endforeach



@endsection