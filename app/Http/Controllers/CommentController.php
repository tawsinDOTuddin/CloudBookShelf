<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Book;
use Auth;

class CommentController extends Controller
{
    
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('home', ['comments'=> $comments]);
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment_body'=>'required|max:1000'
            ]);

        $comment = new Comment();
        $comment->comment_body = $request->comment_body;
        $comment->user_id = Auth::user()->id;
        $comment->book_id = $request->book_id;
        $comment->save();
        $book = Book::findOrFail($comment->book_id);
        //return redirect()->route('home');
        //$comments = Book::find()->comments();  
        return view('readerTemp', compact('book'));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
                $comment = Comment::where('id', $id)->first();
        if(Auth::user()!=$comment->user){
            return redirect()->back();
        }
        $book = Book::findOrFail($comment->book_id);
        $comment->delete();
        
        //return redirect()->route('home');
        //$comments = App\Book::find()->comments();  
        return view('readerTemp', compact('book'));
    }
}
