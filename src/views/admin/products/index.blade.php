@extends('manager::layouts.admin')

@section('content')
<div class="container-fluid p-3">
  <div class="card mb-2">
    <div class="card-body d-sm-flex justify-content-between">
      <h2 class="mb-2 mb-sm-0 pt-1">Dashboard/ <small>Productos</small></h2>
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
            <th>Titulo</th>
            <th>Tipo de producto</th>
            <th colspan="2">Timestamps</th>
          </tr>
          @foreach($products as $product)
          <tr>
            <td class="text-center">{{ $product->id }}</td>
            <td class="text-left">
              <a href="{{ route('admin.products.edit', $product->id) }}">{{ $product->name }}</a><br>
              <small>/{{ $product->slug }}</small>
            </td>
            <td>{{$product->product_type}}</td>
            <td><small>Create: {{ $product->created_at->format('d/m/y') }}</small></td>
            <td><small>Update: {{ $product->updated_at->format('d/m/y') }}</small></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    {{ $products->links() }}
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('admin.products.store') }}" class="modal-content" enctype="multipart/form-data">
      @csrf
      <div class="modal-header header-title">
        <h5 class="modal-name" id="addNewLabel">Agregar producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Producto:</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del producto" value="{{ old('name') }}" required>
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
