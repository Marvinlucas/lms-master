@extends('layouts.admin')


@section("content")
<div class="w-100 d-block">
<div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="container" style="max-width: 100%;">
        <h3 class="font-weight-bold">{{ __('My Courses') }}</h3>
    </div>
</div>
<div class="row">

    <div class="col-12 mb-1">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">{{ __("My Course") }}</h6>
                <div class="dropdown no-arrow">
                    
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    
                    <ul class="nav nav-tabs">
                        <li class="nav-item active">
                            <a class="nav-link active" data-toggle="tab" href="#home">{{ __('Home') }}</a>
                        </li>
                      </ul>
                      
                    <div class="tab-content p-4">
                        
                        <div id="home" class="tab-pane active">
                            <x-modules.terms.all :terms="$terms" />
                       
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection