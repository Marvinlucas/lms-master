<div class="col-lg-4 col-md-6 portfolio-item department-{{ $term->Course->id }} wow fadeInUp" data-wow-delay="0.1s">
    <div class="rounded overflow-hidden">
        <div class="position-relative overflow-hidden">
            <img class="img-fluid fixed-size-image" src="{{ asset('storage/' .$term->file) }}" alt="{{ $term->title }}">
            <div class="portfolio-overlay">
                <a class="btn btn-square btn-outline-light mx-1" href="{{ route('front.view_term.index', ['id' => $term->id]) }}">
                    <i class="fa fa-link"></i>
                </a>
            </div>
        </div>
        <div class="bg-light p-4">
            <div class="text-center">
                <h5 class=" fw-medium mb-2">{{  $term->title }}</h5>
                
            </div>
       {{--     <h6 class="text-secondary fw-medium mb-2">{{ $course->Department->title }}</h6> --}}
       <p class="text-justify" style="text-align: justify;">{{ Str::words($term->description, 25, ' ...') }}</p>
                <a href="{{ route('front.view_term.index', ['id' => $term->id]) }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block mt-3">
                    {{ __('View') }}
                </a>
            </a>
        </div>
    </div>
</div>