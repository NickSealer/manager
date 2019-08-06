<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ninja\Manager\Models\Category;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use Image;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('created_at', 'desc');
        //busqueda
        if($request->q && !empty($request->q)) {
            $categories->where(function($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->q.'%')->orWhere('description', 'LIKE', '%'.$request->q.'%');
            });
        }
        if(Auth::user()->role == 'Mod') {
            $categories = $categories->where('user_id', Auth::user()->id);
        }
        $categories = $categories->paginate(30);
        return view('manager::admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);
        $category = new Category;
        $category->user_id = Auth::user()->id;
        $category->name = $request->name;

        //slug
        $validateSlug = Category::where('slug', str_slug($request->name))->count();
        $category->slug = str_slug($request->name).($validateSlug > 0 ? $validateSlug : '');
        $category->save();

        app('Ninja\Manager\Admin\LogController')->store('Category store id '.$category->id, $category);
        flash('Se guardó el registro con éxito.')->success();
        return redirect()->route('admin.categories.edit', $category->id);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('manager::admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,'.$category->id.'|max:255',
            'icon' => 'mimes:jpeg,bmp,png,gif'
        ]);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->save();

        app('Ninja\Manager\Admin\LogController')->store('Category updated id '.$category->id, $category);
        flash('Se actualizó el registro con éxito.')->success();
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        app('Ninja\Manager\Admin\LogController')->store('Category destroy id '.$category->id, $category);
        $category->delete();
        flash('Se eliminó la categoría '.$category->name.' con éxito')->error();
        return redirect()->route('admin.categories.index');
    }
}
