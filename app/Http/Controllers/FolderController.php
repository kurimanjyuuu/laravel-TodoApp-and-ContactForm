<?php

namespace App\Http\Controllers;

use App\Folder; // ★ この行を追記
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder; // ★ 追加
use Illuminate\Support\Facades\Auth;// ★ Authクラスをインポートする


class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }


    public function create(CreateFolder $request) // ★ 引数の型を変更
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();

        // タイトルに入力値を代入する
        $folder->title = $request->title;

        // ★ ユーザーに紐づけて保存
        Auth::user()->folders()->save($folder);

        // $user = Auth::user();
        // $folder = new Folder();
        // $folder->title = $request->title;
        // $folder->user_id = $user->id;
        // $folder->save($folder);
        
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
