@extends('manager::layouts.admin')

@section('content')
    <div class="container p-3">
        <form class="card card-hover" action="{{ route('admin.configurations.update', $configuration->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="card-header header-title">
                Configuración: {{ $configuration->tag }}
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Nombre:</label>
                        <input type="text" name="tag" id="tag" class="form-control form-control-lg" placeholder="url amigable" value="{{ old('tag') ? old('tag') : $configuration->tag }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <input hidden type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{ old('slug') ? old('slug') : $configuration->slug }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pdf_link">Contenido:</label>
                        <input type="text" name="content" id="content" class="form-control" value="{{ old('content') ? old('content') : $configuration->content }}">
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

    <form id="destroy-form" action="{{ route('admin.configurations.destroy', $configuration->id) }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="_method" value="DELETE" />
    </form>
    {{--falta agregar los otros select y ya--}}
@endsection
