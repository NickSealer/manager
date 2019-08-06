<?php

namespace Ninja\Manager\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ninja\Manager\Models\Location;
use Illuminate\Support\Facades\Storage;
use Auth;
use File;
use Image;

class LocationController extends Controller
{
  public function index(Request $request)
  {
    $locations = Location::orderBy('created_at', 'desc');
    //busqueda
    if($request->q && !empty($request->q)) {
      $locations->where(function($query) use ($request) {
        $query->where('name', 'LIKE', '%'.$request->q.'%')->orWhere('address', 'LIKE', '%'.$request->q.'%');
      });
    }
    if(Auth::user()->role == 'Mod') {
      $locations = $locations->where('user_id', Auth::user()->id);
    }
    $locations = $locations->paginate(30);
    return view('manager::admin.locations.index', compact('locations'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255'
    ]);
    $location = new Location;
    $location->name = $request->name;
    $location->save();

    app('Ninja\Manager\Admin\LogController')->store('Location store id '.$location->id, $location);
    flash('Se guardó el registro con éxito.')->success();
    return redirect()->route('admin.locations.edit', $location->id);
  }

  public function edit($id)
  {
    $location = Location::findOrFail($id);
    return view('manager::admin.locations.edit', compact('location'));
  }

  public function update(Request $request, $id)
  {
    $location = Location::findOrFail($id);
    $validatedData = $request->validate([
      'name' => 'required|max:255'
    ]);
    $location->name = $request->name;
    $location->latitude = $request->latitude;
    $location->longitude = $request->longitude;
    $location->address = $request->address;
    $location->phone = $request->phone;
    $location->location_type = $request->location_type;
    $location->save();

    app('Ninja\Manager\Admin\LogController')->store('Location updated id '.$location->id, $location);
    flash('Se actualizó el registro con éxito.')->success();
    return redirect()->route('admin.locations.index');
  }

  public function destroy($id)
  {
    $location = Location::findOrFail($id);
    app('Ninja\Manager\Admin\LogController')->store('Location destroy id '.$location->id, $location);
    $location->forceDelete();
    flash('Se eliminó la localización '.$location->name.' con éxito')->error();
    return redirect()->route('admin.locations.index');
  }

}
