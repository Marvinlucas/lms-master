@extends('layouts.admin')


@section("content")
<div class="w-100 d-block">
<div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="container" style="max-width: 100%;">
        <h3 class="font-weight-bold">{{ __('Manage User') }}</h3>
    </div>
</div>

<!-- Create Form Card -->
<div class="row">
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-success">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">{{ __("User Form") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($user))
                    <form class="user" method="POST" action="{{ route('user.update' , $user->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('user.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="username" type="text" class="form-control form-control-user" id="exampleUsername"
                                placeholder="Username" value="{{ $user->username ?? '' }}">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="name" type="text" class="form-control form-control-user" id="name"
                                placeholder="First Name" value="{{ $user->name ?? '' }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="last_name" type="text" class="form-control form-control-user" id="exampleInputLName"
                                placeholder="Last Name" value="{{ $user->last_name ?? '' }}">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="middle_initial" type="text" class="form-control form-control-user" id="exampleInputMInitial"
                                placeholder="Middle Initial" value="{{ $user->middle_initial ?? '' }}">
                            @error('middle_initial')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="email" type="email" class="form-control form-control-user" id="email"
                                placeholder="Email" value="{{ $user->email ?? '' }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="password" type="text" class="form-control form-control-user" id="password"
                                placeholder="Password" value="">
                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                            <x-forms.roles user="{{ $user->id ?? 0 }}" />
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
</div>

@endsection