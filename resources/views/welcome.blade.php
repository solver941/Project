@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center">

    <button onclick="window.location='{{ url("logout") }}'">Odhlásit se</button>
</div>
@endsection
