<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CompletedTask as CompletedTaskModel;

class CompletedTaskController extends Controller
{
  public function list()
  {
    // 1page辺りの表示アイテム数を設定
    $per_page = 20;

    // 一覧の取得
    $list = CompletedTaskModel::where('user_id', Auth::id())
            ->orderBy('priority', 'DESC')
            ->orderBy('period')
            ->orderBy('created_at')
            ->paginate($per_page);
            // ->get();

    // $sql = CompletedTaskModel::toSql();
    // echo "<pre>\n"; var_dump($sql, $list); exit;
    return view('completed_tasks.list', ['list' => $list]);
  }
}