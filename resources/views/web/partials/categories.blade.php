<div class="row">
    @foreach ($categories as $category)
        <div class="col-12 col-md-6 col-lg-4 mb-4 wow fadeInUp" data-wow-duration=".4s" data-wow-delay="0.4s" data-wow-offset="100">
            <a href="{{route('web.category.show', $category->id)}}" class="services-template">
                <img src="{{$category->cover}}" class="fit-img" />
                <div class="overlay">
                    <div class="talk">
                        <p class="titlter fw-bold mb-1 fs-3">
                            {{$category->title}}
                        </p>
                        <p class="lead mb-0">
                            {{$category->description}}
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>