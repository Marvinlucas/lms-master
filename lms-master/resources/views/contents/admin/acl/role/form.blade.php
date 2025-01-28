@extends('layouts.admin')


@section("content")
<div class="w-100 d-block">
<div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="container" style="max-width: 100%;">
        <h3 class="font-weight-bold">{{ __('Manage Role') }}</h3>
    </div>
</div>

<div class="row">
<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-success">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">{{ __("Role Form") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($role))
                    <form class="role" method="POST" action="{{ route('role.update' , $role->id) }}">                    
                     @method('patch')
                @else
                    <form class="role" method="POST" action="{{ route('role.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="name" type="text" class="form-control form-control-user" id="name"
                                placeholder="name" value="{{ $role->name ?? '' }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6">
                            <input name="guard_name" type="text" class="form-control form-control-user" id="guard_name"
                                placeholder="web, api, ..." value="{{ $role->guard_name ?? '' }}">
                            @error('guard_name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
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