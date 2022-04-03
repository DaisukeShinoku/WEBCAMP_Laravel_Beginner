<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;

class TaskController extends Controller
{
  /**
   * タスク一覧ページ を表示する
   * 
   * @return \Illuminate\View\View
   */
  public function list()
  {
    // 一覧の取得
    $list = TaskModel::where('user_id', Auth::id())
                        ->orderBy('priority', 'DESC')
                        ->orderBy('period')
                        ->orderBy('created_at')
                        ->get();
    return view('task.list', ['list' => $list]);
  }
  /**
   * タスクの新規登録
   */
  public function register(TaskRegisterPostRequest $request)
  {
    // validate済のデータの取得
    $datum = $request->validated();

    // user_idの追加
    $datum['user_id'] = Auth::id();

    // テーブルへのINSERT
    try {
      $r = TaskModel::create($datum);
    } catch(\Throwable $e) {
      echo $e->getMessage();
      exit;
    }

    // タスク登録成功
    $request->session()->flash('front.task_register_success', true);
    return redirect('/task/list');
  }
}