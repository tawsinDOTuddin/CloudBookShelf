<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Book;
use Auth;
use File;
use Illuminate\Support\Facades\Input;  
use Illuminate\Support\Facades\Storage;


class SearchController extends Controller
{
    
    public function index()
    {
        $results = Book::where('filepath', '!!!')->get();
        return view('searchpage', compact('results'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $naam = $request->searchname;
        $results = Book::where('filepath', 'LIKE', "%{$naam}%")->get();
        return view('searchpage', compact('results'));
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
        //
    }
}
