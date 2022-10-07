<section class="banner">
    <div class="container custom-container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="text-center banner__img text-xxl-end">
                    <img src="{{ !empty($sliders) ? asset('upload/slider/'.$sliders->image) : asset('upload/no_image.png') }}" alt="">
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="banner__content">
                    <h2 class="title wow fadeInUp" data-wow-delay=".2s">{{ $sliders->title }}</h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">{{ $sliders->description }}</p>
                    <a href="about.html" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">more about me</a>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll__down">
        <a href="#aboutSection" class="scroll__link">Scroll down</a>
    </div>
    <div class="banner__video">
        <a href="{{ $sliders->video }}" class="popup-video"><i class="fas fa-play"></i></a>

</section>
