@extends('layouts.app')

@section('title', 'Página no encontrada')

@section('content')
<div class="container my-5 text-center">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="display-1">404</h1>
            <h2>Página no encontrada</h2>
            <p class="lead">Lo sentimos, la página que buscas no existe.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Volver al Inicio</a>
        </div>
    </div>
</div>
@endsection

