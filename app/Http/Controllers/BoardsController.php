<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\BoardsFormRequest;




class BoardsController extends Controller
{
    public function index(Request $request)
    {

        $text_color = config('text_color');
        return view('boards/boards_index')
        ->with([
            'text_color' => $text_color,   
           
        ]);
       
    }

    public function preview(BoardsFormRequest $request)
    {
        // $tmp_name = $request -> file('image_path');

        // if($tmp_name) {

        //     $path = $tmp_name -> store('public/images');

        // } else {

        //     $path = null;
        // } ,'image_path'
        $boards = $request->all();
        return view('boards/boards_preview',compact('boards'));
    }

    public function complete(BoardsFormRequest $request)
    {
        $boards = $request->all();
        return view('boards/boards_complete',compact('boards'));
    }
}

