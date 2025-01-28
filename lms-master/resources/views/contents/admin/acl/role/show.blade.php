@extends('layouts.admin')


@section("content")
<div class="w-100 d-block">
<div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="container" style="max-width: 100%;">
        <h4 class="font-weight-bold"><i
                class="fa-solid fa-bars-progress"></i>{{ __(' Update:  ') }}<span style="color: #fa5d4e;">{{ $role->name ?? '' }}</span></h4></h4>
    </div>
</div>
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">{{ __("Role") }}</h6>
                <div class="dropdown no-arrow">

                    <x-BackButton />
                    
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                
                <form method="post" class="role" action="{{ route("role_permissions" ,  $role->id) }}">
                    @csrf
                    
                    @forelse ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" name="permissions[]" 
                            {{ is_array($role_permission) && in_array($permission->id , $role_permission) ? "checked" : "" }}
                            type="checkbox" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                            {{ $permission->name }}
                            </label>
                        </div>
                    @empty
                        
                    @endforelse   
                    <hr/>
                    
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