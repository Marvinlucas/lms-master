<div class="container text-center mt-5">
    <h3 class="mb-4">{{ __('Description: ') }} {{ $file->description }}</h3>
    <hr/>

    <div class="pdf-viewer-container shadow-lg p-3 mb-5 bg-white rounded">
        <object data="{{ asset('storage/' . $file->file) }}" type="application/pdf" width="100%" height="600">
            <p class="text-center mt-3">Your browser does not support viewing PDFs. You can download the PDF <a href="{{ asset('storage/' . $file->file) }}" class="btn btn-primary">here</a>.</p>
        </object>
    </div>
</div>
