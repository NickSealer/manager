<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ninja\Manager\Models\Link;
use Auth;

class LinkController extends Controller
{
  public function index(Request $request)
  {
    $links = Link::orderBy('id', 'asc');
    if ($request->q && !empty($request->q)) {
      $links->where(function($query) use ($request){
        $query->where('name', 'LIKE', '%'.$request->q.'%')->orWhere('description', 'LIKE', '%'.$request->q.'%');
      });
    }

    $links = $links->paginate(30);
    return view('manager::admin.links.index', compact('links'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255'
    ]);
    $link = new Link;
    $link->name = $request->name;
    $link->save();

    app('Ninja\Manager\Admin\LogController')->store('Link store id '.$link->id, $link);
    flash('Se guardó el registro con éxito.')->success();
    return redirect()->route('admin.links.edit', $link->id);
  }

  public function edit($id){
    $links = Link::all();
    $link = Link::findOrFail($id);
    return view('manager::admin.links.edit', compact('link', 'links'));
  }

  public function update(Request $request, $id)
  {
    $links = Link::all();
    $link = Link::findOrFail($id);
    $validatedData = $request->validate([
      'description' => 'required|max:255',
      'link' => 'required',
    ]);

    $link->parent_id = $request->parent_id;
    $link->description = $request->description;
    $link->link = $request->link;
    $link->section = $request->section;
    $link->position = $request->position;
    $link->save();

    app('Ninja\Manager\Admin\LogController')->store('Link updated id '.$link->id, $link);
    flash('Se actualizó el registro con éxito.')->success();
    return redirect()->route('admin.links.index');
  }

  public function destroy($id){
    $link = Link::findOrFail($id);
    app('Ninja\Manager\Admin\LogController')->store('link destroy id '.$link->id, $link);
    $link->forceDelete();
    flash('Se eliminó el enlace '.$link->name.' con éxito')->error();
    return redirect()->route('admin.links.index');
  }

}
