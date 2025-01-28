
<div class="row">
    <div class="col">
        
        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['participant.edit' , 'participant.delete']))
        
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">{{ __("Supervisors") }}</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
               @livewire('container.enroll-supervisor', ['term' => $term]) 

            </div>
        </div>

        @endcan

    </div>
</div>
