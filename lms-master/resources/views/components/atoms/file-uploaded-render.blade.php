<div>

    @if($fileType == 'image')

    @if($preview)
    <img src="{{ asset('storage/'. $file) }}" class="img-fluid">
    @else
    
    @endif

    @endif


    @if($fileType == 'video')

    @if($preview)
    <video controls class="img-fluid">
        <source src="{{ asset('storage/'. $file) }}" type="video/mp4">
    </video>
    @else
   
    @endif

    @endif


    @if($fileType == 'audio')

    @if($preview)
    <audio controls class="audio">
        <source src="{{ asset('storage/'. $file) }}" type="audio/mpeg">
    </audio>
    @else
   
    @endif

    @endif


    @if($fileType == 'file')
    <div class="btn btn-circle btn-info btn-sm text-white">
    <i class="fa fa-file"></i>
    </div>

    @endif

</div>