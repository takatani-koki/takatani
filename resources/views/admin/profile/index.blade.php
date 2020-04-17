@extends('layouts.profile')
@section('title', '登録済みプロファイルの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロファイル一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
        </div>


        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">氏名</th>
                                <th width="10%">性別</th>
                                <th width="30%">趣味</th>
                                <th width="30%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $news->id }}</th>
                                    <td>{{ str_limit($news->name, 100) }}</td>
                                    <td>{{ str_limit($news->gender, 100) }}</td>
                                    <td>{{ str_limit($news->hobby, 250) }}</td>
                                    <td>{{ str_limit($news->introduction, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ProfileController@edit', ['id' => $news->id]) }}">編集</a>
                                        </div>
                                        <div>
                                          <div>
                                              <a href="{{ action('Admin\ProfileController@delete', ['id' => $news->id]) }}">削除</a>
                                          </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
