<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profiles;

use App\Profiles_History;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //追記
    public function index(Request $request)
    {
        // それ以外はすべてのニュースを取得する
        $posts = Profiles::all();
        return view('admin.profile.index', ['posts' => $posts]);
    }


    public function add()
    {
      return view("admin.profile.create");
    }




    public function create(Request $request)
    {

        #php laravel 15 課題追記　開始

       $this->validate($request, Profiles::$rules);

       $news = new Profiles;
       $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $news->fill($form);
      $news->save();
      #php laravel 15 課題　終了
      return redirect("admin/profile/create");
    }

    public function edit(Request $request)
    {
      //php laravel課題17 追記
      //News Modelからデータを取得する
      $news=Profiles::find($request->id);
        if (empty($news)) {
          abort(404);
        }
        return view('admin.profile.edit', ['news_form' => $news]);
    }

    public function update(Request $request)
    {  //php laravel課題17 追記
      $this->validate($request, Profiles::$rules);
      // News Modelからデータを取得する
      $news = Profiles::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      unset($news_form['_token']);
      unset($news_form['remove']);
      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      $history = new ProfilesHistory;
      $history->profiles_id = $profiles->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect("admin/profile");
    }

    public function delete(Request $request)
     {
         // 該当するNews Modelを取得
         $news = Profiles::find($request->id);
         // 削除する
         $news->delete();
         return redirect('admin/profile/');
}
}
?>
