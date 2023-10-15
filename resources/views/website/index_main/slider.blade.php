
<div class="desktop">
    <div id="carouselExampleIndicators" class="carousel slide carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/imgs/banner/slider2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('assets/imgs/banner/slider1.jpg')}}" class="d-block w-100" alt="...">
            </div>
    
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="mobile">
    <div class="owl-carousel trend_product owl-theme my-4">
        <a href="#">
            <div class="product-cart-wrap">
                <div class="product-img-action-wrap">
                    <div class="product-img product-img-zoom">
                        <img class="default-img" src="{{asset('images/mobile/1.jpeg')}}" alt="">
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="product-cart-wrap">
                <div class="product-img-action-wrap">
                    <div class="product-img product-img-zoom">
                        <img class="default-img" src="{{asset('images/mobile/2.jpeg')}}" alt="">
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="product-cart-wrap">
                <div class="product-img-action-wrap">
                    <div class="product-img product-img-zoom">
                        <img class="default-img" src="{{asset('images/mobile/3.jpeg')}}" alt="">
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>