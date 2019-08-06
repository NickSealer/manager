@extends('manager::layouts.admin')

@section('content')
    <div class="container-fluid p-3">
        <div class="card mb-2">
            <div class="card-body d-sm-flex justify-content-between">
                <h2 class="mb-2 mb-sm-0 pt-1">Dashboard / <small>Configuraciones</small></h2>
                <form class="d-flex justify-content-center" method="POST">
                    @include('manager::partials.admin.search')
                </form>
            </div>
        </div>
        <div class="card card-hover">
            <div class="card-body">
                <div id="table" class="table-editable">
                    <span class="table-add float-right mb-3 mr-2">
                        <a data-toggle="modal" data-target="#addNew" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a>
                    </span>
                    <table class="table table-bordered table-responsive-xl table-striped text-center">
                        <tr class="header-title">
                            <th width="30">Id</th>
                            <th>Título</th>
                            <th>Tag</th>
                            <th>Contenido</th>
                            <th colspan="2">Timestamps</th>
                        </tr>

                        @foreach($configurations as $configuration)
                        <tr>
                            <td class="text-center">
                                {{ $configuration->id }}<br>
                                {!! $configuration->active ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>' !!}
                            </td>
                            <td>
                                @if($configuration->icon)
                                    <img src="/uploads/{{ $configuration->icon }}" class="float-left mr-2" alt="img_demo">
                                @endif
                                <strong><a href="{{ route('admin.configurations.edit', $configuration->id) }}">{{ $configuration->tag }}</a></strong><br>
                                <small>
                                    <i class="far fa-user"></i> {{ $configuration->user->name }}
                                </small>

                            </td>
                            <td>{{ $configuration->tag }}</td>

                            <td>{{$configuration->content}}</td>
                            <td>
                                <small>
                                    @if($configuration->trashed())
                                        <br>
                                        <span class="text-danger">
                                            <i class="far fa-trash-alt"></i>
                                            {{ $configuration->deleted_at->toDayDateTimeString() }}
                                        </span>
                                    @endif
                                </small>
                            </td>
                            <td><small>Create: {{ $configuration->created_at->toDayDateTimeString() }}
                                    @if($configuration->trashed())
                                        <span class="text-danger">
                                            <i class="far fa-trash-alt"></i>
                                            {{ $configuration->deleted_at->toDayDateTimeString() }}
                                        </span>
                                    @endif
                                </small>
                            </td>
                            <td><small>Update: {{ $configuration->updated_at->toDayDateTimeString() }}
                                    @if($configuration->trashed())
                                        <span class="text-danger">
                                            <i class="far fa-trash-alt"></i>
                                            {{ $configuration->deleted_at->toDayDateTimeString() }}
                                        </span>
                                    @endif
                                </small>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            {{ $configurations->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('admin.configurations.store') }}" class="modal-content">
                @csrf
                <div class="modal-header header-title">
                   <h5 class="modal-title" id="addNewLabel">Agregar configuración</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="tag" id="tag" class="form-control" placeholder="Nombre de la configuración" value="{{ old('tag') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
