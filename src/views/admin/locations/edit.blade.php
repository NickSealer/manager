@extends('manager::layouts.admin')

@section('content')
    <div class="container p-3">
        <form class="card card-hover" action="{{ route('admin.locations.update', $location->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="card-header header-title">
                Localización: {{ $location->name }}
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="url amigable" value="{{ old('name') ? old('name') : $location->name }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="location_type">Tipo:</label>
                        <select name="location_type" id="location_type" class="form-control" required>
                            <option value="plantas de concreto" {{ $location->location_type == 'concreto' ? 'selected' : '' }}>plantas de concreto</option>
                            <option value="oficinas administrativas" {{ $location->location_type == 'oficinas administrativas' ? 'selected' : '' }}>oficinas administrativas</option>
                            <option value="plantas de cemento" {{ $location->location_type == 'plantas de cemento' ? 'selected' : '' }}>plantas de cemento</option>
                            <option value="disensa" {{ $location->location_type == 'disensa' ? 'selected' : '' }}>Disensa</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="longitude">Longitud:</label>
                                <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') ? old('longitude') : $location->longitude }}" required>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitud:</label>
                                <input  type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') ? old('latitude') : $location->latitude }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Dirección:</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') ? old('address') : $location->address }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Teléfono:</label>
                                <input type="text" name="phone" id="phone" class="form-control" maxlength="12" value="{{ old('phone') ? old('phone') : $location->phone }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="modal-footer">
                        <a class="btn btn-primary mr-auto" href="{{ URL::previous() }}"><i class="fas fa-arrow-left"></i> Atrás</a>
                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash-alt"></i> Eliminar</button>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header header-title">
                                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash-alt"></i> Borrar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Está seguro de eliminar el registro?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();"><i class="fas fa-check"></i> Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <form id="destroy-form" action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="_method" value="DELETE" />
    </form>
@endsection
