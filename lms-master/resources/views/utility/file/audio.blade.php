<div class="container text-center mt-5">
    <h3 class="mb-4">{{ __('Description: ') }} {{ $file->description }}</h3>
    <hr/>

    <audio controls>
        <source src="{{ asset('storage/' . $file->file) }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    
</div>