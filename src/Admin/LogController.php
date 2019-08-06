<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ninja\Manager\Models\Log;
use Auth;
use Carbon\Carbon;

class LogController extends Controller
{
  public function index()
  {
    $deleteFrom = new Carbon();
    $removeLogs = Log::where('created_at', '<', $deleteFrom->subMonths(1)->toDateTimeString())->delete();
    $logs = Log::orderBy('created_at', 'desc')->paginate(50);
    return view('manager::admin.logs.index', compact('logs'));
  }
  public function store($action, $content)
  {
    $log = new Log;
    $log->user_id = Auth::user()->id;
    $log->action = $action;
    $log->location = url()->full();
    $log->userdata = $content->toJson();
    $log->save();

    return true;
  }
}
