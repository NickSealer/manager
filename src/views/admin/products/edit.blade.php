@extends('manager::layouts.admin')

  @section('content')
  <div class="container p-3">
    <form class="card card-hover" action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      @csrf
      <div class="card-header header-title">
        Producto: {{ $product->name }}
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="url amigable" value="{{ old('name') ? old('name') : $product->name }}" required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">{{ url('/productos/') }}</span>
              </div>
              <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{ old('slug') ? old('slug') : $product->slug }}" required>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea rows="10" name="description" id="description" class="form-control" required>{{ old('description') ? old('description') : $product->description }}</textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="product_type">Tipo:</label>
                <select name="product_type" id="product_type" class="form-control" required>
                  <option></option>
                  <option value="">Listado de tipos...</option>
                  <option {{ $product->product_type == 'Cemento' ? 'selected' : '' }}>Cemento</option>
                  <option {{ $product->product_type == 'Concreto' ? 'selected' : '' }}>Concreto</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pdf_link">PDF:</label>
                <input type="file" name="pdf_link" id="pdf_link" class="form-control" value="{{ old('pdf_link') ? old('pdf_link') : $product->pdf_link }}">
                @if($product->pdf_link)
                <a data-fancybox href="{{ Storage::url($product->pdf_link) }}" class="btn btn-sm btn-light">
                  File: /{{ $product->pdf_link }}
                </a>
                @endif

              </div>
              <div class="form-group">
                <input type="checkbox" name="highlight" value="1" id="highlight" {{ $product->highlight ? 'checked' : '' }} >
                <label for="highlight">Destacado</label>
              </div>

              <div class="input">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="card card-file">
                      @if($product->picture)
                        <img width="80" class="rounded" src="{{ Storage::url($product->picture) }}" alt="img_demo">
                      @endif
                    </div>
                  </div>
                  <div class="col-sm-10 p-5">
                    <input type="file" name="picture" id="picture" class="inputfile d-none">
                    <label for="picture" class="text-center label-file p-2"><i class="fas fa-upload"></i> Choose a file...</label>
                    @if($product->picture)
                    <a data-fancybox href="{{ Storage::url($product->picture) }}" class="btn btn-sm btn-light">
                      <i class="far fa-image"></i> /{{ $product->picture }}
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

  <form id="destroy-form" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="_method" value="DELETE" />
  </form>
  @endsection
