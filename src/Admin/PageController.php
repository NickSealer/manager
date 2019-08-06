<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ninja\Manager\Models\Page;
use Auth;
use File;
use Image;

class PageController extends Controller
{
  public function index(Request $request)
  {
    $pages = Page::orderBy('updated_at', 'desc');
    //busqueda
    if($request->q && !empty($request->q)) {
      $pages->where(function($query) use ($request) {
        $query->where('name', 'LIKE', '%'.$request->q.'%')->orWhere('content', 'LIKE', '%'.$request->q.'%');
      });
    }
    $pages = $pages->paginate(30);
    return view('manager::admin.pages.index', compact('pages'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255'
    ]);
    $page = new Page;
    $page->name = $request->name;
    //slug
    $validateSlug = Page::where('slug', str_slug($request->name))->count();
    $page->slug = str_slug($request->name).($validateSlug > 0 ? $validateSlug : '');
    $page->save();

    app('Ninja\Manager\Admin\LogController')->store('Page store id '.$page->id, $page);
    flash('Se guardó el registro con éxito.')->success();
    return redirect()->route('admin.pages.edit', $page->id);
  }

  public function edit($id)
  {
    $page = Page::findOrFail($id);
    return view('manager::admin.pages.edit', compact('page'));
  }

  public function update(Request $request, $id)
  {
    $page = Page::findOrFail($id);
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|unique:pages,slug,'.$page->id.'|max:255',
      'picture' => 'mimes:jpeg,bmp,png,gif|max:1000',
    ]);
    $page->name = $request->name;
    $page->slug = $request->slug;
    $page->description = $request->description;
    $page->content = $request->content;

    //upload Pictures
    if ($request->hasFile('picture')) {
      $fileName = $page->id.'-page-'.$page->slug.'.'.$request->picture->extension();
      $page->picture = $request->file('picture')->storeAs('public', $fileName);
    }

    $page->save();
    app('Ninja\Manager\Admin\LogController')->store('Page updated id '.$page->id, $page);
    flash('Se actualizó el registro con éxito.')->success();
    return redirect()->route('admin.pages.index');
  }

  public function destroy($id)
  {
    $page = Page::findOrFail($id);
    app('Ninja\Manager\Admin\LogController')->store('Page destroy id '.$page->id, $page);
    $page->forceDelete();
    flash('Se eliminó la pagina '.$page->name.' con éxito')->error();
    return redirect()->route('admin.pages.index');

  }

}
