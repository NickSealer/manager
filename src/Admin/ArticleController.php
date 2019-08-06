<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ninja\Manager\Models\Article;
use Ninja\Manager\Models\Category;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use Image;

class ArticleController extends Controller
{
  public function index(Request $request)
  {
    $articles = Article::orderBy('created_at', 'desc');
    //busqueda
    if($request->q && !empty($request->q)) {
      $articles->where(function($query) use ($request) {
        if ($request->q == 'obras' || $request->q == 'obra') {
          $request->q = 1;
        } elseif ($request->q == 'noticias' || $request->q == 'noticia') {
          $request->q = 2;
        } elseif ($request->q == 'tips' || $request->q == 'tip') {
          $request->q = 5;
        } elseif ($request->q == 'lealtad') {
          $request->q = 6;
        }elseif ($request->q == 'eventos' || $request->q == 'evento') {
          $request->q = 7;
        }elseif ($request->q == 'academia' || $request->q == 'academias') {
          $request->q = 8;
        }
        $query->where('name', 'LIKE', '%'.$request->q.'%')
        ->orWhere('category_id', 'LIKE', '%'.$request->q.'%')
        ->orWhere('description', 'LIKE', '%'.$request->q.'%');
      });
    }
    $articles = $articles->paginate(30);
    return view('manager::admin.articles.index', compact('articles'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255'
    ]);
    $article = new Article;
    $article->name = $request->name;
    //slug
    $validateSlug = Article::where('slug', str_slug($request->name))->count();
    $article->slug = str_slug($request->name).($validateSlug > 0 ? $validateSlug : '');
    $article->save();

    app('Ninja\Manager\Admin\LogController')->store('Article store id '.$article->id, $article);
    flash('Se guardó el registro con éxito.')->success();
    return redirect()->route('admin.articles.edit', $article->id);
  }

  public function edit($id)
  {
    $categories = Category::all();
    $article = Article::findOrFail($id);
    return view('manager::admin.articles.edit', compact('article', 'categories'));
  }

  public function update(Request $request, $id)
  {
    $article = Article::findOrFail($id);
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'picture' => 'image|max:1000',
      'description' => 'max:250',
      'slug' => 'required|unique:articles,slug,'.$article->id.'|max:255',
      'icon' => 'mimes:jpeg,bmp,png,gif'
    ]);
    $article->name = $request->name;
    $article->category_id = $request->category;
    $article->date = $request->date;
    $article->description = $request->description;
    $article->content = $request->content;
    $article->slug = $request->slug;
    $article->highlight =  $request->highlight;

    // upload image to storage and  delete the old image in apdatating

    if ($request->hasFile('picture')) {
      $fileName = $article->id.'-article-'.$article->slug.'.'.$request->picture->extension();
      $article->picture = $request->file('picture')->storeAs('public', $fileName);
    }

    $article->save();

    app('Ninja\Manager\Admin\LogController')->store('Article updated id '.$article->id, $article);
    flash('Se actualizó el registro con éxito.')->success();
    return redirect()->route('admin.articles.index');
  }

  public function destroy($id)
  {
    $article = Article::findOrFail($id);
    app('Ninja\Manager\Admin\LogController')->store('Article destroy id '.$article->id, $article);
    $article->delete();
    flash('Se eliminó el artículo '.$article->name.' con éxito')->error();
    return redirect()->route('admin.articles.index');
  }
}
