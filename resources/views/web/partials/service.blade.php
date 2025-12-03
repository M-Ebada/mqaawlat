<div class="col-12 col-md-6 col-lg-4 mb-4 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
    <a href="{{route('web.service.show', ['slug' => $product->slug])}}" class="services-template">
        <img src="{{$product->image}}" class="fit-img" />
        <div class="overlay">
            <div class="talk">
                <p class="titlter fw-bold mb-1 fs-3">
                    {{$product->title}}
                </p>
                <p class="lead mb-0">
                    {{$product->short_description}}
                </p>
            </div>
        </div>
    </a>
</div>