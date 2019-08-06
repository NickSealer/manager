@extends('manager::layouts.admin')

@section('content')
<div class="container-fluid p-3">
  <div class="card mb-2">
    <div class="card-body d-sm-flex justify-content-between">
        <h2 class="mb-2 mb-sm-0 pt-1">Dashboard / <small>Logs</small></h2>
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
              <th>Acción</th>
              <th>Detalles</th>
              <th colspan="2">Timestamps</th>
            </tr>
            @foreach($logs as $log)
              <tr>
                <td>{{ $log->id }}</td>
                <td>{!! $log->user ? $log->user->name.'<br>'.$log->user->email : 'No existe' !!}</td>
                <td>{{ $log->action }}<br><small>{{ $log->location }}</small></td>
                <td><small>{{ $log->userdata }}</small></td>
                <td><small>Create: {{ $log->created_at->toDayDateTimeString() }}</small></td>
                <td><small>Update: {{ $log->updated_at->toDayDateTimeString() }}</small></td>
              </tr>
            @endforeach
        </table>
      </div>
    </div>
    {{ $logs->links() }}
  </div>
</div>
@endsection
