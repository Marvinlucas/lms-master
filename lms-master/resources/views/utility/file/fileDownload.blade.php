<div class="container text-center mt-5">
    <h3 class="mb-4">{{ __('Description: ') }} {{ $file->description }}</h3>
    <hr/>

    @if(pathinfo($file->file, PATHINFO_EXTENSION) === 'pdf')
        <div class="pdf-viewer-container shadow-lg p-3 mb-5 bg-white rounded">
            <iframe src="{{ asset('storage/' . $file->file) }}" width="100%" height="600"></iframe>
        </div>
    @elseif(pathinfo($file->file, PATHINFO_EXTENSION) === 'docx')
        <div class="docx-viewer-container shadow-lg p-3 mb-5 bg-white rounded">
            <?php
            // Convert PDF to DOCX using PHPWord
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $section = $phpWord->addSection();
            $section->addText('Your DOCX content here...');

            $tempDocxPath = storage_path('app/temp_docx.docx');
            $phpWord->save($tempDocxPath);
            ?>

            <iframe src="{{ asset('storage/temp_docx.docx') }}" width="100%" height="600"></iframe>

            <?php
            // Remove the temporary DOCX file after viewing
            unlink($tempDocxPath);
            ?>
        </div>
    @else
        <p>This file format is not supported for viewing.</p>
    @endif
</div>
