@extends('manager::layouts.admin')

@section('content')
<div class="container-fluid p-3">
  <div class="card mb-2">
    <div class="card-body d-sm-flex justify-content-between">
      <h2 class="mb-2 mb-sm-0 pt-1">Dashboard / <small>Categorías</small></h2>
      <form class="d-flex justify-content-center" method="GET">
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
            <th>Nombre</th>
            <th>Descripción</th>
            <th colspan="2">Timestamps</th>
          </tr>
          @foreach($categories as $category)
          <tr>
            <td class="text-center">{{ $category->id }}</td>
            <td class="text-left">
              @if($category->icon)
              <img src="/uploads/{{ $category->icon }}" class="float-left mr-2" alt="img-demo">
              @endif
              <strong><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></strong><br>
              <small>{{ $category->slug }}</small>
            </td>
            <td>{{$category->description}}</td>
            <td><small>Create: {{ $category->created_at->format('d/m/y') }}</small></td>
            <td><small>Update: {{ $category->updated_at->format('d/m/y') }}</small></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    {{ $categories->links() }}
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{ route('admin.categories.store') }}" class="modal-content">
      @csrf
      <div class="modal-header header-title">
        <h5 class="modal-name" id="addNewLabel">Agregar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Categoría:</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la categoría" value="{{ old('name') }}" required>
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
