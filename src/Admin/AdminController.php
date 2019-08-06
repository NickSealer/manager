<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  public function docs() {
    return view('manager::admin.admin.docs');
  }
}
