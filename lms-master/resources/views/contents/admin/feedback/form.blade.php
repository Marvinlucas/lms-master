@extends('layouts.admin')


@section("content")
<div class="custom-card ">
    <div class="card-main-header d-flex justify-content-between">
        <div class="container">
            <h3 class="moved-text">Manage Feedback</h3>
        </div>
        <div class="image-overlay">
            <img src="{{ asset('img/admin/menu/dashboard.png') }}" alt="{{ __('badges') }}"
                style="width: 75%; height: 75%;">
        </div>
    </div>
</div>


<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-white">{{ __("Create New Feedback") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($feedback))
                    <form class="user" method="POST" action="{{ route('feedback.update' , $feedback->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('feedback.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $feedback->title ?? '' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="require" class="form-control">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control editor" id="description"
                            placeholder="Description">{{ $feedback->description ?? '' }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
   
               
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block"
                            value="{{ __('Save') }}">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


@endsection