<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;




class ContactController extends Controller
{
    public function index(Request $request)
    {
        $prefs = config('pref');
        $cates = config('category');
        $sex = config('sex');
        return view('contact/mailform_index')
        ->with([
            'prefs' => $prefs,
            'category' => $cates, 
            'sex' => $sex
        ]);
    }
        // var_dump($cates);
        // exit;


    public function confirm(ContactFormRequest $request)
    {
        $tmp_name = $request -> file('path');

        if($tmp_name) {

            $path = $tmp_name -> store('public/images');

        } else {

            $path = null;
        }
       
        // $prefs = $request ->config('pref');
        // ヘルパー関数かコマンド
        $contact = $request->all();
        return view('contact/mailform_confirm', compact('contact','path'));
    }


    public function send(ContactFormRequest $request)
    {
       
        $path = $request ->input('path');
        $contact = $request->all();
        return view('contact/mailform_send',compact('contact','path'));
    }

}
// publicの中にストレージフォルダーの中にimage_after
