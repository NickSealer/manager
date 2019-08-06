@extends('manager::layouts.admin')

@section('content')
  <div class="container-fluid p-3">
    <form class="card card-hover" action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <div class="card-header header-title">
        Articulo: {{ $article->name }}
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="url amigable" value="{{ old('name') ? old('name') : $article->name }}" required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">{{ url('/articulos/') }}</span>
              </div>
              <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{ old('slug') ? old('slug') : $article->slug }}" required>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="content">Contenido:</label>
                <textarea rows="10" name="content" id="content" class="ckeditor" required>{{ old('content') ? old('content') : $article->content }}</textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea rows="3" name="description" id="description" class="form-control" required>{{ old('description') ? old('description') : $article->description }}</textarea>
              </div>
              <div class="form-group">
                <label for="category">Tipo:</label>
                <select name="category" id="category" class="form-control" required>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}> {{ $category->name }} </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <input type="checkbox" name="highlight" value="1" id="highlight" {{ $article->highlight ? 'checked' : '' }}>
                <label for="highlight">Destacado</label>
              </div>
              <div class="input">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="card card-file">
                      @if($article->picture)
                        <img width="80" class="rounded" src="{{ Storage::url($article->picture) }}" alt="img_demo">
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-10 p-5">
                    <input type="file" name="picture" id="picture" class="inputfile d-none">
                    <label for="picture" class="text-center label-file p-2"><i class="fas fa-upload"></i> Choose a file...</label>
                    @if($article->picture)
                    <a data-fancybox href="{{ Storage::url($article->picture) }}" class="btn btn-sm btn-light">
                      <i class="far fa-image"></i> /{{ $article->picture }}
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


  <form id="destroy-form" action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="_method" value="DELETE" />
  </form>

  @endsection
