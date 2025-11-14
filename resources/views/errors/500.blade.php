@extends('layouts.app')

@section('title', 'Error del servidor')

@section('content')
<div class="container my-5 text-center">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="display-1">500</h1>
            <h2>Error del servidor</h2>
            <p class="lead">Ha ocurrido un error. Por favor, intenta más tarde.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Volver al Inicio</a>
        </div>
    </div>
</div>
@endsection

