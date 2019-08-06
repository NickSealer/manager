@extends('manager::layouts.admin')

@section('content')
<div class="container-fluid p-3">
  <div class="card mb-2">
    <div class="card-body d-sm-flex justify-content-between">
      <h2 class="mb-2 mb-sm-0 pt-1">Dashboard / <small>Usuarios</small></h2>
      <form class="d-flex justify-content-center" method="GET">
        @include('manager::partials.admin.search')
      </form>
    </div>
  </div>
  <div class="card card-hover">
    <div class="card-body">
      <div id="table" class="table-editable">
        <table class="table table-bordered table-responsive-xl table-striped text-center">
          <tr class="header-title">
            <th width="30">Id</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Email</th>
            <th>Estado</th>
          </tr>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>
              <strong><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></strong><br>
              <small><i class="far fa-user"></i> {{ $user->name }}</small>
            </td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if($user->active == 1)
              activo
              @else
              inactivo
              @endif
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    {{ $users->links() }}
  </div>
</div>
@endsection
