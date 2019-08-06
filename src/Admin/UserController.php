<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Ninja\Manager\Models\User;
use Auth;
use SoftDeletes;

class UserController extends Controller
{
  public function index(Request $request)
  {
    $users = User::orderBy('created_at', 'desc');
    //busqueda
    if($request->q && !empty($request->q)) {
      $users->where(function($query) use ($request) {
        if ($request->q == 'activo' || $request->q == 'activos') {
          $request->q = 1;
        } elseif ($request->q == 'inactivo' || $request->q == 'inactivos') {
          $request->q = 0;
        }
        $query->where('active', 'LIKE', '%'.$request->q.'%')
        ->orWhere('id', 'LIKE', '%'.$request->q.'%')
        ->orWhere('email', 'LIKE', '%'.$request->q.'%')
        ->orWhere('role', 'LIKE', '%'.$request->q.'%')
        ->orWhere('name', 'LIKE', '%'.$request->q.'%');
      });
    }
    if($request->wt) { $users->withTrashed(); }
    $users = $users->paginate(30);
    return view('manager::admin.users.index', compact('users'));
  }

  public function store($action, $content)
  {
    $user = new user;
    $user->user_id = Auth::user()->id;
    $user->name = $name;
    $user->email = $email;
    $user->role = $role;
    $user->active = $active;
    $user->save();
    return true;
  }

  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('manager::admin.users.edit', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);
    $validatedData = $request->validate([
      'name' => 'required|max:255',
    ]);

    $user->name = $request->name;

    if(!empty($request->password)) {
      $user->password = Hash::make($request->password);
    }

    $user->email = $request->email;
    $user->role = $request->role;
    $user->active = ($request->active ? true : false);
    $user->save();

    app('Ninja\Manager\Admin\LogController')->store('user updated id '.$user->id, $user);
    flash('Se actualizó el registro con éxito.')->success();
    return redirect()->route('admin.users.index');
  }

  public function destroy($id)
  {
    $user = User::findOrFail($id);
    app('Ninja\Manager\Admin\LogController')->store('user destroy id '.$user->id, $user);
    if($user->trashed() && Auth::user()->role == 'Admin') {
      $user->forceDelete();
    } else {
      $user->delete();
    }
    flash('Se eliminó el usuario '.$user->name.' con éxito')->error();
    return redirect()->route('admin.users.index');
  }

}
