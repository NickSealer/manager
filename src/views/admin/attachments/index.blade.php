@extends('manager::layouts.blank')

@section('content')
<div class="container-fluid">
  <attachments :attachments="{{ $attachments }}" editor="{{ $isEditor }}"></attachments>
</div>
@endsection
