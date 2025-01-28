@extends('layouts.admin')


@section("content")

<div class="custom-card ">
    <div class="card-main-header d-flex justify-content-between">
        <div class="container">
            <h3 class="moved-text">Manage Certificate</h3>
        </div>
        <div class="image-overlay">
            <img src="{{ asset('img/admin/menu/dashboard.png') }}" alt="{{ __('badges') }}"
                style="width: 75%; height: 75%;">
        </div>
    </div>
</div>

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-success">
        <!-- Card Header - Dropdown -->
        <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-white">{{ __("Create New Badge") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">


            @if(isset($badge))
            <form class="user" method="POST" action="{{ route('badges.update' , $badge->id) }}">
                @method('patch')
                @else
                <form class="user" method="POST" action="{{ route('badges.store') }}">
                    @endif

                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="title">{{ __("Title") }}</label>
                                <input name="position_1" type="text" class="form-control form-control-user" id="title" placeholder="Title" value="{{ $badge->title ?? '' }}">
                            </div>

                        </div>


                        <div class="col-md-6">
                            <label>File: </label>
                            @livewire('services.media.uploadable',[
                                    'file' => $background->file ?? '',
                                    'path' => 'background',
                                    'target' => 'background'
                                ])
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="{{ __('Save') }}">
                    </div>
                </form>


        </div>
    </div>
</div>


@endsection