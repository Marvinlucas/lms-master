<div class="col-lg-4 col-md-6 portfolio-item department-{{ $course->Department->id }} wow fadeInUp" data-wow-delay="0.1s">
    <div class="rounded overflow-hidden">
        <div class="position-relative overflow-hidden">
            <img class="img-fluid fixed-size-image" src="{{ asset('storage/' . $course->file) }}" alt="{{ $course->title }}">
            <div class="portfolio-overlay">
                <a class="btn btn-square btn-outline-light mx-1" href="{{ route('front.course' , $course->id) }}">
                    <i class="fa fa-link"></i>
                </a>
            </div>
        </div>
        <div class="bg-light p-4">
            <div class="d-flex justify-content-between">
                <h5 class=" fw-medium mb-2">{{ $course->title }}</h5>
                <a href="{{ route('front.course', $course->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-book"></i> 
                    <span class="badge badge-light">{{ $course->Terms->count() }}</span>
                </a>
            </div>
       {{--     <h6 class="text-secondary fw-medium mb-2">{{ $course->Department->title }}</h6> --}}
       <p class="text-justify" style="text-align: justify;">{{ Str::words($course->description, 15, ' ...') }}</p>
            <a href="{{ route('front.course', $course->id) }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block mt-3">
                {{ __('View') }}
            </a>
        </div>
    </div>
</div>