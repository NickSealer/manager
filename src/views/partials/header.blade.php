<div class="sticky-top">
  <div class="offers-holcim-container">
    @foreach(index_links() as $link)
    @if($link->id == 5)
    <div class="bg-offers">
        <a class="icon directa_bl" href="{{ $link->link }}" target="_blank" title="Directa"></a>
    </div>
    @endif
    @if($link->id == 6)
    <div class="bg-offers">
        <a class="icon disensa_bl" href="{{ $link->link }}" target="_blank" title="Disensa"></a>
    </div>
    @endif
    @if($link->id == 7)
    <div class="bg-offers">
        <a class="icon programa_bl" href="{{ $link->link }}" target="_blank" title="PrograMas"></a>
    </div>
    @endif
    @endforeach
    <div class="bg-offerscorte">
        <a class="icon corte_bl"></a>
    </div>
  </div>
  <header class="newtwork-social">
    <div class="container d-flex justify-content-center">
      <!-- Enlaces -->
      <div class="row social-icons">
        @foreach(index_links() as $link)
        @if($link->id == 1)
        <a href="{{ $link->link }}" target="_blank"><i class="fab fa-facebook-f social" title="Facebook"></i></a>
        @endif
        @if($link->id == 2)
        <a href="{{ $link->link }}" target="_blank"><i class="fab fa-twitter social" title="Twiter"></i></a>
        @endif
        @if($link->id == 3)
        <a href="{{ $link->link }}" target="_blank"><i class="fab fa-youtube social" title="YouTube"></i></a>
        @endif
        @if($link->id == 4)
        <a href="{{ $link->link }}" target="_blank"><i class="fab fa-instagram social" title="Instagram"></i></a>
        @endif
        @endforeach
        <h6 class="text-center social-network">Conéctate con nosotros</h6>
      </div>
    </div>
  </header>

<div class="totalHeader">
  <div class="container-fluid">
    <button class="tr_mainMenu d-block d-xl-none float-right btn btn-danger">
      <i class="fas fa-bars fa-2x"></i>
    </button>
    <a class="float-left" href="/">
      <img src="/assets/logos/main.jpg" class="logo" alt="Holcim Colombia">
    </a>
    <ul class="mainMenu">
      @foreach(index_links()->where('section', 'mainMenu')->where('parent_id', 0) as $link)
        <li>
          <a href="{{ $link->link }}" title="{{ $link->name }}">
            {{ $link->name }}
          </a>
          @if($link->children->count() > 0)
            <ul>
            @foreach($link->children as $linkChildren)
              <li class="dropdown">
                <a href="{{ $linkChildren->link }}" id="subMenu{{ $linkChildren->id }}" title="{{ $linkChildren->name }}">
                  {{ $linkChildren->name }}
                </a>
                @if($linkChildren->children->count() > 0)
                <ul>
                  @foreach($linkChildren->children as $linkChildrenChildren)
                    <li>
                      <a href="{{ $linkChildrenChildren->link }}" title="{{ $linkChildrenChildren->name }}">
                        {{ $linkChildrenChildren->name }}
                      </a>
                    </li>
                  @endforeach
                </ul>
                @endif
              </li>
            @endforeach
            </ul>
          @endif
        </li>
      @endforeach
        <li class="buscador">
          <a href="#" class="tr_buscador">
            <i class="fas fa-search icon-search"></i>
          </a>
          <form method="get" action="{{ route('articles.search') }}">
            <div class="input-group  ">
              <input type="search" class="form-control header-search" name="search" id="search" placeholder="Buscar">
              <button type="submit" class="btn btn-light"><i class="fas fa-search" title="Buscar"></i></button>
            </div>
          </form>
        </li>
    </ul>
  </div>
  <div class="clearfix"></div>
</div>
</div>
