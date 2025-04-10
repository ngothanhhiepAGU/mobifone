<section id="billboard" class="position-relative py-5" style="
  background: url('images/banner-image-bg.jpg') center center / cover no-repeat;
  height: 800px;
  display: flex;
  align-items: center;
">
  <!-- Swiper navigation -->
  <div class="position-absolute top-50 start-0 translate-middle-y ps-3 z-3 swiper-prev main-slider-button-prev">
    <svg class="chevron-back-circle" width="60" height="60">
      <use xlink:href="#alt-arrow-left-outline"></use>
    </svg>
  </div>
  <div class="position-absolute top-50 end-0 translate-middle-y pe-3 z-3 swiper-next main-slider-button-next">
    <svg class="chevron-forward-circle" width="60" height="60">
      <use xlink:href="#alt-arrow-right-outline"></use>
    </svg>
  </div>

  <!-- Swiper main -->
  <div class="swiper main-swiper w-100">
    <div class="swiper-wrapper">

      <!-- Slide 1 -->
      <div class="swiper-slide d-flex justify-content-center align-items-center">
        <img src="images/banner-image2.png" class="img-fluid" style="max-height: 770px; width: auto; object-fit: cover;" alt="Banner Image 1">
      </div>

      <!-- Slide 2 -->
      <div class="swiper-slide d-flex justify-content-center align-items-center">
        <img src="images/banner-image1.png" class="img-fluid" style="max-height: 770px; width: auto; object-fit: cover;" alt="Banner Image 2">
      </div>

      <!-- Slide 3 -->
      <div class="swiper-slide d-flex justify-content-center align-items-center">
        <img src="images/banner-image.png" class="img-fluid" style="max-height: 770px; width: auto; object-fit: cover;" alt="Banner Image 3">
      </div>

    </div>
  </div>
</section>
