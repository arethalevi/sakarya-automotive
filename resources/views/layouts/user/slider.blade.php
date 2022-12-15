<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" carousel-indicator-hit-area-height="10px">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('assets/image/silder1.jpeg')}}" width="1600px" height="850px">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{ asset('assets/image/slider2.jpg')}}" width="1600px" height="850px">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/image/slider3.jpg')}}" width="1600px" height="850px">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
