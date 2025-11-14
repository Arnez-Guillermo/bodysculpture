@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1>Contacto</h1>
            <hr>

            <div class="row mb-5">
                <div class="col-md-6">
                    <h4>Información de Contacto</h4>
                    <p>
                        <strong>Email:</strong> info@bodysculpture.com<br>
                        <strong>Teléfono:</strong> +1 234 567 890<br>
                        <strong>Horario:</strong> Lunes a Viernes, 9:00 - 18:00
                    </p>
                </div>
                <div class="col-md-6">
                    <h4>Dirección</h4>
                    <p>
                        Calle Principal 123<br>
                        Ciudad, CP 12345<br>
                        País
                    </p>
                </div>
            </div>

            <h3>Envíanos un Mensaje</h3>
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nombre *</label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" 
                           class="form-control @error('phone') is-invalid @enderror" 
                           id="phone" 
                           name="phone" 
                           value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Asunto *</label>
                    <input type="text" 
                           class="form-control @error('subject') is-invalid @enderror" 
                           id="subject" 
                           name="subject" 
                           value="{{ old('subject') }}" 
                           required>
                    @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Mensaje *</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" 
                              id="message" 
                              name="message" 
                              rows="5" 
                              required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
            </form>
        </div>
    </div>
</div>
@endsection

