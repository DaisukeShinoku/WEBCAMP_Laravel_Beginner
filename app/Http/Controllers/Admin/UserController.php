<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User as UserModel;

class UserController extends Controller
{
  /**
   * トップページ を表示する
   * 
   * @return \Illuminate\View\View
   */
  public function list()
  {
    // データの取得
    $group_by_column = ['users.id', 'users.name'];
    $list = UserModel::select($group_by_column)
                      ->selectRaw('count(tasks.id) AS task_num')
                      ->leftjoin('tasks', 'users.id', '=', 'tasks.user_id')
                      ->groupBy($group_by_column)
                      ->orderBy('users.id')
                      ->get();
    return view('admin.user.list', ['users' => $list]);
  }
}