<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
     public function show(Post $post)
     {
         return view('posts.show')->with(['post' => $post]);
         //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
     }
     
     public function create()
     {
         return view('posts.create');
     }
     
     public function store(PostRequest $request, Post $post)
     {
         //postをキーに持つリクエストパラメータを取得。$requestのキーはHTMLもFormタグ内で定義した各入力項目のname属性と一致する
         //$input - ['title' => 'タイトル', 'body' => '本文']という配列形式となる
         $input = $request['post'];
         //保存処理
         //Postインスタンスのプロパティを受け取ったキーごとに上書きする。
         //$post->titleはタイトル、$post->bodyは本文
         $post->fill($input)->save();
         return redirect('/posts/' . $post->id);
     }
}
