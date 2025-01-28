@extends('layouts.admin')


@section("content")
<div class="custom-card ">
    <div class="card-main-header d-flex justify-content-between">
        <div class="container">
            <h3 class="moved-text">Settings</h3>
        </div>
        <div class="image-overlay">
            <img src="{{ asset('img/admin/menu/dashboard.png') }}" alt="{{ __('badges') }}"
                style="width: 75%; height: 75%;">
        </div>
    </div>
</div>
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __("Settings") }}</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                    <form class="user" method="POST" action="{{ route('setting.update' , $user->id) }}">                    
                    @method('patch')
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="theme">{{ __("theme") }}</label>
                            <select name="theme" id="theme" class="form-control">
                                <option value="default">default</option>
                                <option value="dark">dark</option>
                            </select>
                          
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


@endsection
