<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders.create');
    }

    public function create(CreateFolder $request)
{
    // フォルダモデルのインスタンスを作成する
    $folder = new Folder();
    // タイトルに入力値を代入する
    $folder->title = $request->title;
    // インスタンスの状態をデータベースに書き込む
    $folder->user_id = Auth::user()->id;
    $folder->save();

    return redirect()->route('tasks.index', [
        'id' => $folder->id,
    ]);
}
}
