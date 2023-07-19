@extends('site.template')
@section('template')

<!-- Slider -->
<section id="slider">
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="200">
                    <div class="row">
                        <div class="col-md-4 sm-hide">
                            <div class="slider-content">
                                <div class="slider-center">
                                    <div class="slider-image">
                                        <img src="{{ asset('site/images/slider1.png') }}" alt=""
                                            class="img-fluid sliders" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item">
              <div class="row">
                <div class="col-md-4 sm-hide">
                  <div class="slider-content">
                    <div class="slider-center">
                      <div class="slider-image">
                        <img
                          src="{{ asset('site/images/slider2.png') }}"
                          alt=""
                          class="img-fluid sliders"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-4 sm-hide">
                  <div class="slider-content">
                    <div class="slider-center">
                      <div class="slider-image">
                        <img
                          src="{{ asset('site/images/slider3.png') }}"
                          alt=""
                          class="img-fluid sliders3"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>

@endsection