<footer class="bg-dark text-white mt-auto py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h4 class="fw-bold mb-3" style="font-size: 1.5rem; letter-spacing: 0.5px;">
                    <span class="text-primary">Body</span><span class="text-white">Sculpture</span>
                </h4>
                <p class="text-white-50 mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                    Tu tienda de confianza para artículos fitness de calidad profesional y para el hogar.
                </p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="text-white text-decoration-none" style="font-size: 1.5rem; transition: all 0.3s ease;" onmouseover="this.style.color='var(--primary-color)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.color='white'; this.style.transform='translateY(0)'">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none" style="font-size: 1.5rem; transition: all 0.3s ease;" onmouseover="this.style.color='var(--primary-color)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.color='white'; this.style.transform='translateY(0)'">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none" style="font-size: 1.5rem; transition: all 0.3s ease;" onmouseover="this.style.color='var(--primary-color)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.color='white'; this.style.transform='translateY(0)'">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="text-white text-decoration-none" style="font-size: 1.5rem; transition: all 0.3s ease;" onmouseover="this.style.color='var(--primary-color)'; this.style.transform='translateY(-3px)'" onmouseout="this.style.color='white'; this.style.transform='translateY(0)'">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-4" style="font-size: 1.2rem; color: white; letter-spacing: 0.5px;">Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="{{ route('pages.about') }}" class="text-white-50 text-decoration-none d-inline-flex align-items-center" style="font-size: 0.95rem; transition: all 0.3s ease;" onmouseover="this.style.color='var(--primary-color)'; this.style.paddingLeft='5px'" onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.paddingLeft='0'">
                            <i class="bi bi-chevron-right me-2" style="font-size: 0.8rem;"></i>Quiénes Somos
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('pages.contact') }}" class="text-white-50 text-decoration-none d-inline-flex align-items-center" style="font-size: 0.95rem; transition: all 0.3s ease;" onmouseover="this.style.color='var(--primary-color)'; this.style.paddingLeft='5px'" onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.paddingLeft='0'">
                            <i class="bi bi-chevron-right me-2" style="font-size: 0.8rem;"></i>Contacto
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('catalog.index') }}" class="text-white-50 text-decoration-none d-inline-flex align-items-center" style="font-size: 0.95rem; transition: all 0.3s ease;" onmouseover="this.style.color='var(--primary-color)'; this.style.paddingLeft='5px'" onmouseout="this.style.color='rgba(255,255,255,0.5)'; this.style.paddingLeft='0'">
                            <i class="bi bi-chevron-right me-2" style="font-size: 0.8rem;"></i>Catálogo
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-4" style="font-size: 1.2rem; color: white; letter-spacing: 0.5px;">Contacto</h5>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-envelope me-3 text-primary" style="font-size: 1.1rem;"></i>
                        <span class="text-white-50" style="font-size: 0.95rem;">info@bodysculpture.com</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-telephone me-3 text-primary" style="font-size: 1.1rem;"></i>
                        <span class="text-white-50" style="font-size: 0.95rem;">+1 234 567 890</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-geo-alt me-3 text-primary" style="font-size: 1.1rem;"></i>
                        <span class="text-white-50" style="font-size: 0.95rem;">Buenos Aires, Argentina</span>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
        <div class="text-center">
            <p class="mb-0 text-white-50" style="font-size: 0.9rem; letter-spacing: 0.5px;">
                &copy; {{ date('Y') }} <span class="text-primary fw-bold">Body</span><span class="text-white fw-bold">Sculpture</span>. Todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>

