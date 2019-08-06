@extends('manager::layouts.admin')

@section('content')
  <div class="container p-3">
    <form class="card card-hover" action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <div class="card-header header-title">
        Elemento: {{ $slider->name }}
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="url amigable" value="{{ old('name') ? old('name') : $slider->name }}" required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="text">Texto:</label>
                <textarea maxlength="200" rows="4" name="content" id="content" class="form-control" required>{{ old('content') ? old('content') : $slider->content }}</textarea>
              </div>
              <label for="position">Posición:</label>
              <input name="position" id="position" class="form-control" value="{{ old('position') ? old('position') : $slider->position }}" required>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="slider_type">Formato:</label>
                <select name="slider_type" id="slider_type" class="form-control" require>
                  <option {{ $slider->slider_type == 'imagen' ? 'selected' : '' }}>imagen</option>
                  <option {{ $slider->slider_type == 'youtube' ? 'selected' : '' }}>youtube</option>
                </select>
              </div>
              <div class="form-group">
                <label for="article_id">Artículo:</label>
                <select name="article_id" id="article_id" class="form-control" >
                  <option></option>
                  @foreach($articles as $article)
                  <option value="{{ $article->id }}" {{ $article->id == $slider->article_id ? 'selected' : '' }}> {{ $article->name }} </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="miniature">Sección:</label>
                <select name="miniature" id="miniature" class="form-control" require>
                  <option value="">LIstado de secciones..</option>
                  <option value="home" {{ $slider->miniature == 'home' ? 'selected' : '' }}>Home</option>
                  <option value="noticias" {{ $slider->miniature == 'noticias' ? 'selected' : '' }}>Noticias</option>
                  <option value="experiencias" {{ $slider->miniature == 'experiencias' ? 'selected' : '' }}>Experiencias</option>
                  <option value="Soluciones" {{ $slider->miniature == 'Soluciones' ? 'selected' : '' }}>Soluciones</option>
                </select>
              </div>
              <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" name="link" class="form-control" id="link" value="{{ $slider->link }}" placeholder="https://">
              </div>
              <div class="input">
                <div class="row">
                  <div class="col-sm-2">
                    <label for="picture" class="text-center"><small>(200x200)</small></label>
                    <div class="card card-file">
                      <img width="80" class="rounded" src="{{ Storage::url($slider->picture) }}" alt="img_demo">
                    </div>
                  </div>
                  <div class="col-sm-10 p-5">
                    <input type="file" name="picture" id="picture" class="inputfile d-none">
                    <label for="picture" class="text-center label-file p-2"><i class="fas fa-upload"></i> Choose a file...</label>
                    @if($slider->picture)
                    <a data-fancybox href="{{ Storage::url($slider->picture) }}" class="btn btn-sm btn-light">
                      <i class="far fa-image"></i> /{{ $slider->picture }}
                    </a>
                    @endif
                  </div>
                </div>
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

  <form id="destroy-form" action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="_method" value="DELETE" />
  </form>
  @endsection
