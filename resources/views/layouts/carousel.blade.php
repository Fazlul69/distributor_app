<div class="container">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($sliders as $item)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
              <img src="{{ asset('banner/'. $item->image) }}" class="d-block w-100" alt="" height="350px">
          </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="up_level">
      <h1>{{$detail->company_name}}</h1>
      <p></p>
      <p></p>
      <h5></h5>
  </div>
</div>
