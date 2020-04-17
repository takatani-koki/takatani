{{--layout/profile.blade.phpを読み込む--}}
@extends('layouts.profile')

{{--profile.blade.phpの@yield('title')に'Myプロフィール'を埋め込む--}}
@section('title','Myプロフィール')

{{--profile.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>Myプロフィール</h2>

{{--php laravel 14 課題　開始--}}
      <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                          @if (count($errors) > 0)
                              <ul>
                                  @foreach($errors->all() as $e)
                                      <li>{{ $e }}</li>
                                  @endforeach
                              </ul>
                          @endif
                          <div class="form-group row">
                              <label class="col-md-2" for="name">氏名</label>
                              <div class="col-md-10">
                                  <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                              </div>
                          </div>

                          <div class="form-group row">
                            <p class="control-label"><strong>性別：<strong></p>
                               <input type="radio" name="gender" id="man" value="男性">
                              <label class="radio-inline" for="man">
                               男性
                             </label>
                             <input type="radio" name="gender" id="woman" value="女性">
                             <label class="radio-inline" for="women">
                              女性
                            </label>
                          </div>

                          <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="20">{{ old('hobby') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                <label class="col-md-2" for="introduction">自己紹介</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                </div>
            </div>

                          {{ csrf_field() }}
                          <input type="submit" class="btn btn-primary" value="更新">
                      </form>
{{--php laravel 14 課題 終了--}}

    </div>
  </div>
</div>
@endsection
