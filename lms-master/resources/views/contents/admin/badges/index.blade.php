@extends('layouts.admin')
@section('content')
    
<div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="container" style="max-width: 100%;">
        <h3 class="font-weight-bold">{{ __('Manage Certificate') }}</h3>
    </div>
</div>

    <div class="row">
        <div class="col-6">
            @livewire('admin.configuration.certificate-content')
        </div>
        <div class="col-6">
            @livewire('admin.configuration.certiificate-preview')
        </div>
    </div>
@endsection
