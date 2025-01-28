@extends('layouts.admin')


@section("content")

<div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="container" style="max-width: 100%;">
        <h3 class="font-weight-bold">{{ __('Manage Document') }}</h3>
    </div>
</div>
<div class="row">
<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-success">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">{{ __("Documents") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($document))
                    <form class="user" method="POST" action="{{ route('document.update' , $document->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('document.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $document->title ?? '' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control custom-textarea" id="description"
                            placeholder="Enter the Description">{{ $document->description ?? '' }}</textarea>
                        @error('description')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
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
</div>


@endsection