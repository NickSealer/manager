<!-- Footer -->
<footer class="footer-main font-small indigo">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-6 col-xl-2 mx-auto footer-item text-center">
        <div class="container-fluid logo-footer">
          <div class="col-md-12">
            <img src="/assets/logos/footer-logo.png" alt="Vive Holcim" class="img-fluid">
          </div>
          <div class="col-md-12">
            <a href="https://www.holcim.com.co/" target="_blank" class="text-white1 wrap" title="Holcim">
              https://www.holcim.com.co/
            </a>
          </div>
        </div>
      </div>

      <hr class="clearfix w-80 d-md-none">
      <div class="col-sm-12 col-md-6 col-xl-2 mx-auto footer-item text-center hidden_on_mobile">
        <div class="container-fluid d-block social_network">
          <h5>Conéctate con nosotros</h5>
          <div class="row justify-content-center">

          @foreach(index_links()->where('section', 'socialLink')->where('parent_id', 0) as $link)
            @if( $link->name == "Facebook")
            <a href="{{ $link->link }}" target="_blank"><i class="fab fa-facebook-f social" title="Facebook"></i></a>
            @endif
            @if($link->name == "Twitter")
            <a href="{{ $link->link }}" target="_blank"><i class="fab fa-twitter social" title="Twiter"></i></a>
            @endif
            @if($link->name == "YouTube")
            <a href="{{ $link->link }}" target="_blank"><i class="fab fa-youtube social" title="YouTube"></i></a>
            @endif
            @if($link->name == "Instagram")
            <a href="{{ $link->link }}" target="_blank"><i class="fab fa-instagram social" title="Instagram"></i></a>
            @endif
            @endforeach
          </div>
        </div>
      </div>

      <hr class="clearfix w-80 d-md-none">
      <div class="col-sm-12 col-md-6 col-xl-3 mx-auto footer-item">
        <ul class="list-unstyled">
          <li>
            <h5>Línea de atención
              <br><small>018000423333</small>
            </h5>
          </li>
          <li class="mt-5">
            <h5 class="wrap">Correo electrónico
              <br><small>info.colombia@lafargeholcim.com</small>
            </h5>
          </li>
        </ul>
      </div>
      <hr class="clearfix w-80 d-md-none">
      <div class="col-sm-12 col-md-6 col-xl-4 mx-auto footer-item">
        <p>Suscribete a nuestro BOLETíN</p>
        <ul class="list-unstyled">
          <li>
            <div class="row">
              <div class="col-sm-12 col-xl-8">
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Digita tu email">
              </div>
              <div class="col-sm-12 col-xl-4 btn-footer">
                <button type="submit" class="btn btn-light btn-block">Suscribirse</button>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Al suscribirte aceptas nuestras	<a href="/holcim/politicas" class="privacity">politicas de tratamiento de datos</a>
                </label>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="col-md-12 legals">
    <span class="text-copyright">
      Copyright 2019 Sitio web Vive Holcim. Todos los derechos reservados
    </span>
    <a href="/holcim/politicas" class="privacity">Políticas de privacidad</a>
  </div>
</footer>
<!-- Footer -->
<div class="comunication">
  <div class="col-md-12 load-more d-none">
    <a class="btn btn-primary" href="#">
      Holcim, te escucha <i class="fas fa-comment"></i>
    </a>
  </div>
  <nav class="fixedBottom mt-3">
    <a href="https://www.holcim.com.co/" target="_blank"><img src="/assets/logos/logo_directa_blanco.png" alt="logo_directa"></a>
    <a href="https://www.holcim.com.co/" target="_blank"><img src="/assets/logos/logo_disensa_blanco.png" alt="logo_disensa"></a>
    <a href="https://www.holcim.com.co/" target="_blank"><img src="/assets/logos/logo_programas_blanco.png" alt="logo_products"></a>
  </nav>
</div>
