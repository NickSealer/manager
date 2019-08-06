@extends('manager::layouts.admin')

@section('content')
    <div class="container p-3">
        <form class="card card-hover" action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="card-header header-title">
                Categoría: {{ $category->name }}
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="url amigable" value="{{ old('name') ? old('name') : $category->name }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ url('/categoria/') }}</span>
                            </div>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{ old('slug') ? old('slug') : $category->slug }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Descripción:</label>
                        <textarea rows="4" name="description" id="description" class="form-control" required>{{ old('description') ? old('description') : $category->description }}</textarea>
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
    <form id="destroy-form" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="_method" value="DELETE" />
    </form>
@endsection
