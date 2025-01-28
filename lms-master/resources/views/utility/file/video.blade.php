<div class="container text-center mt-5">
    <h3 class="mb-4">{{ __('Description: ') }} {{ $file->description }}</h3>
    <hr/>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item p-4" src="{{ asset('storage/' . $file->file) }}" allowfullscreen frameborder="0" title="Video"></iframe>
    </div>
</div>
