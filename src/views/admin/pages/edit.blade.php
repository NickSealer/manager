@extends('manager::layouts.admin')

@section('content')
<div class="container p-3">
  <form class="card card-hover" action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="card-header header-title">
        Página: {{ $page->name }}
    </div>
    <div class="card-body">
      <div class="col-md-12">
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ old('name') ? old('name') : $page->name }}" required>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">{{ url('/') }}</span>
            </div>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{ old('slug') ? old('slug') : $page->slug }}" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" id="description" class="form-control" rows="8">{{ old('description') ? old('description') : $page->description }}</textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input">
              <div class="row">
                  <div class="col-sm-2">
                      <div class="card card-file">
                        @if($page->picture)
                          <img width="80" class="rounded" src="{{ Storage::url($page->picture) }}" alt="img_demo">
                        @endif
                      </div>
                  </div>
                  <div class="col-sm-10 p-5">
                      <input type="file" name="picture" id="picture" class="inputfile d-none">
                      <label for="picture" class="text-center label-file p-2"><i class="fas fa-upload"></i> Choose a file...</label>
                      @if($page->picture)
                        <a data-fancybox href="{{ Storage::url($page->picture) }}" class="btn btn-sm btn-light">
                          <i class="far fa-image"></i> /{{ $page->picture }}
                        </a>
                      @endif
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="content">Contenido:</label>
        <textarea name="content" id="content" class="ckeditor"> {{ old('content') ? old('content') : $page->content }}</textarea>
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

<form id="destroy-form" action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" style="display: none;">
  @csrf
  <input type="hidden" name="_method" value="DELETE" />
</form>
@endsection
