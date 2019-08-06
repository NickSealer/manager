@extends('manager::layouts.admin')

@section('content')
  <div class="container p-3">
    <form class="card card-hover" action="{{ route('admin.links.update', $link->id) }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <div class="card-header header-title">
          Enlace: {{ $link->name }}
      </div>
      <div class="card-body">
        <div class="col-md-12">
            <div class="form-group">
              <label for="name">Nombre:</label>
              <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ old('name') ? old('name') : $link->name }}" disabled>
            </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" rows="4" name="description" id="description" class="form-control" value="{{ $link->description }}">
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="parent_id">Desplegable principal:</label>
                  <select name="parent_id" id="parent_id" class="form-control">
                      @foreach($links as $lk)
                      <option value="0"></option>
                      <option value="{{ $lk->id }} " {{ $lk->id == $link->parent_id ? 'selected' : '' }}> {{ $lk->name }} </option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="section">Sección:</label>
                  <select name="section" id="section" class="form-control">
                      <option></option>
                      <option value="">Listado de secciones..</option>
                      <option {{ $link->section == 'socialLink' ? 'selected' : '' }}>socialLink</option>
                      <option {{ $link->section == 'mainMenu' ? 'selected' : '' }}>mainMenu</option>
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="link">Enlace:</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ old('link') ? old('link') : $link->link }}">
              </div>
              <div class="form-group">
                  <label for="position">Posición:</label>
                  <input type="number" rows="4" name="position" id="position" class="form-control" value="{{ $link->position }}">
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
  <form id="destroy-form" action="{{ route('admin.links.destroy', $link->id) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="_method" value="DELETE" />
  </form>
@endsection
