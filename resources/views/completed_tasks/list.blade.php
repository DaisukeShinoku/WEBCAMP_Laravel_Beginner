@extends('layout')

{{-- タイトル --}}
@section('title')(完了一覧画面)@endsection

{{-- メインコンテンツ --}}
@section('contets')
  @if ($errors->any())
    <div>
    @foreach ($errors->all() as $error)
      {{ $error }}<br>
    @endforeach
    </div>
  @endif

  <h1>完了タスクの一覧</h1>
  <a href="/task/list">タスク一覧に戻る</a><br>
  <table border="1">
    <tr>
      <th>タスク名</th>
      <th>期限</th>
      <th>重要度</th>
      <th>タスク終了日</th>
    </tr>
    @foreach ($list as $completed_task)
    <tr>
      <td>{{ $completed_task->name }}</td>
      <td>{{ $completed_task->period }}</td>
      <td>{{ $completed_task->getPriorityString() }}</td>
      <td>{{ $completed_task->created_at }}</td>
    </tr>
    @endforeach
  </table>
  <!-- ページネーション -->
  現在 {{ $list->currentPage() }} ページ目<br>
  @if ($list->onFirstPage() === false)
    <a href="/completed_tasks/list">最初のページ</a>
  @else
    最初のページ
  @endif
  /
  @if ($list->previousPageUrl() !== null)
    <a href="{{ $list->previousPageUrl() }}">前に戻る</a>
  @else
    前に戻る
  @endif
  /
  @if ($list->nextPageUrl() !== null)
    <a href="{{ $list->nextPageUrl() }}">次に進む</a>
  @else
    次に進む
  @endif
  <br>
  <!-- ページネーション -->
  <hr>
  <menu label="リンク">
    <a href="/logout">ログアウト</a><br>
  </menu>
@endsection
