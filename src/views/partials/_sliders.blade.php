<div id="carroHead" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($sliders as $slider)
    <div class="carousel-item <?php if(!isset($sliderIterator)) { echo 'active'; $sliderIterator = 1; } ?>">
      @if($slider->slider_type == "youtube")
      <div class="embed-responsive embed-responsive-21by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $slider->content }}"></iframe>
      </div>
      @else
        @if($slider->link)
        <a href="{{ $slider->link }}">
          <img class="d-block w-100" src="/t.php?src={{ Storage::url($slider->picture) }}&w=1920" alt="{{ $slider->name }}">
        </a>
        @else
          <img class="d-block w-100" src="/t.php?src={{ Storage::url($slider->picture) }}&w=1920" alt="{{ $slider->name }}">
        @endif
      @endif
    </div>
    @endforeach
  </div>
  @if($sliders->count() > 1)
  <a class="left carousel-control-prev" href="#carroHead" role="button" data-slide="prev">
    <i class="fas fa-angle-double-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control-next" href="#carroHead" role="button" data-slide="next">
    <i class="fas fa-angle-double-right"></i>
    <span class="sr-only">Next</span>
  </a>
  @endif
</div>
