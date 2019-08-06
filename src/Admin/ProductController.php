<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ninja\Manager\Models\Product;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use Image;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $products = Product::orderBy('created_at', 'desc');
    //busqueda
    if($request->q && !empty($request->q)) {
      $products->where(function($query) use ($request) {
        $query->where('name', 'LIKE', '%'.$request->q.'%')->orWhere('description', 'LIKE', '%'.$request->q.'%');
      });
    }
    $products = $products->paginate(30);
    return view('manager::admin.products.index', compact('products'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
    ]);
    $product = new Product;
    $product->name = $request->name;

    //slug
    $validateSlug = Product::where('slug', str_slug($request->name))->count();
    $product->slug = str_slug($request->name).($validateSlug > 0 ? $validateSlug : '');
    $product->save();

    app('Ninja\Manager\Admin\LogController')->store('Product store id '.$product->id, $product);
    flash('Se guardó el registro con éxito.')->success();
    return redirect()->route('admin.products.edit', $product->id);
  }

  public function edit($id)
  {
    $product = Product::findOrFail($id);
    return view('manager::admin.products.edit', compact('product'));
  }

  public function update(Request $request, $id)
  {
    $product = Product::findOrFail($id);
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|unique:products,slug,'.$product->id.'|max:255',
      'picture' => 'mimes:jpeg,bmp,png,gif|max:1000',
      'pdf' => 'mimes:pdf|max:1000'
    ]);
    $product->name = $request->name;
    $product->description = $request->description;
    $product->product_type = $request->product_type;
    $product->slug = $request->slug;
    $product->highlight = $request->highlight;

    // upload pdf to storage
    if ($request->hasFile('pdf_link')) {
      $fileName = $product->id.'-product-'.$product->slug.'.'.$request->pdf_link->extension();
      $product->pdf_link = $request->file('pdf_link')->storeAs('public', $fileName);
    }
    // upload image to storage
    if ($request->hasFile('picture')) {
      $fileName = $product->id.'-product-'.$product->slug.'.'.$request->picture->extension();
      $product->picture = $request->file('picture')->storeAs('public', $fileName);
    }
    $product->save();

    app('Ninja\Manager\Admin\LogController')->store('Product updated id '.$product->id, $product);
    flash('Se actualizó el registro con éxito.')->success();
    return redirect()->route('admin.products.index');
  }

  public function destroy($id)
  {
    $product = Product::findOrFail($id);
    app('Ninja\Manager\Admin\LogController')->store('Product destroy id '.$product->id, $product);
    $product->forceDelete();
    flash('Se eliminó el producto '.$product->name.' con éxito')->error();
    return redirect()->route('admin.products.index');
  }

}
