<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ninja\Manager\Models\Slider;
use Ninja\Manager\Models\Article;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use Image;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::orderBy('created_at', 'desc');
        //busqueda
        if($request->q && !empty($request->q)) {
            $sliders->where(function($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->q.'%')->orWhere('content', 'LIKE', '%'.$request->q.'%')->orWhere('slider_type', 'LIKE', '%'.$request->q.'%');
            });
        }

        $sliders = $sliders->paginate(30);
        return view('manager::admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);
        $slider = new Slider;
        $slider->name = $request->name;
        $slider->save();

        app('Ninja\Manager\Admin\LogController')->store('slider store id '.$slider->id, $slider);
        flash('Se guardó el registro con éxito.')->success();
        return redirect()->route('admin.slider.edit', $slider->id);
    }

    public function edit($id)
    {
        $articles = Article::all();
        $slider = Slider::findOrFail($id);
        return view('manager::admin.sliders.edit', compact('slider', 'articles'));
    }

    public function update(Request $request, $id)
    {
      $slider = Slider::findOrFail($id);
      $validatedData = $request->validate([
          'name' => 'required|max:255',
          'picture' => 'mimes:jpeg,bmp,png,gif|max:1000'
      ]);
      $slider->name = $request->name;
      $slider->article_id = $request->article_id;
      $slider->position = $request->position;
      $slider->slider_type = $request->slider_type;
      $slider->content = $request->content;
      $slider->position = $request->position;
      $slider->miniature = $request->miniature;
      $slider->link = $request->link;

      //upload Pictures
      if ($request->hasFile('picture')) {
          $fileName = $slider->id.'-slider-'.$slider->id.'.'.$request->picture->extension();
          $slider->picture = $request->file('picture')->storeAs('public', $fileName);
        }
      $slider->save();

      app('Ninja\Manager\Admin\LogController')->store('slider updated id '.$slider->id, $slider);
      flash('Se Actualizó el registro con éxito.')->success();
      return redirect()->route('admin.slider.index');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        app('Ninja\Manager\Admin\LogController')->store('slider destroy id '.$slider->id, $slider);
        $slider->forceDelete();
        flash('Se eliminó el slider o banner '.$slider->name.' con éxito')->error();
        return redirect()->route('admin.slider.index');
    }
}
