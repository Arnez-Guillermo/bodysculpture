<footer class="bg-dark text-light mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>BodySculpture</h5>
                <p>Tu tienda de confianza para artículos fitness de calidad.</p>
            </div>
            <div class="col-md-4">
                <h5>Enlaces</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('pages.about') }}" class="text-light">Quiénes Somos</a></li>
                    <li><a href="{{ route('pages.contact') }}" class="text-light">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contacto</h5>
                <p>Email: info@bodysculpture.com</p>
                <p>Teléfono: +1 234 567 890</p>
            </div>
        </div>
        <hr class="bg-light">
        <div class="text-center">
            <p>&copy; {{ date('Y') }} BodySculpture. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

