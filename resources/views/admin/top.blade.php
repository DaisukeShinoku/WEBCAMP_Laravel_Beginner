@extends('admin.layout')

@section('contets')
  <menu label="リンク">
    <a href="./user_list.html">ユーザ一覧</a><br>
    管理画面機能1<br>
    管理画面機能2<br>
    管理画面機能3<br>
    管理画面機能4<br>
    <a href="/admin/logout">ログアウト</a>
  </menu>
  <h1>管理画面</h1>
  (アクセス傾向のグラフや警告などを表示する事が多い)<br>
@endsection