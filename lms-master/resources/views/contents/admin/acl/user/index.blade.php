@extends('layouts.admin')


@section("content")
<div class="w-100 d-block">
<div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="container" style="max-width: 100%;">
        <h3 class="font-weight-bold">{{ __('Manage User') }}</h3>
    </div>
</div>
<div class="row">

    <div class="col-12">
        
        <div class="card mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __('User List') }}</h6>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                        <div class="dropdown-header">{{ __('Action') }}</div>
                        <x-CreateButton path="{{ route('user.create') }}" />
                    </div>
                </div>
            </div>


            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive text-center">


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __("name") }}</th>
                                <th scope="col">{{ __("email") }}</th>
                                <th scope="col">{{ __("Roles") }}</th>
                                <th scope="col">{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    @forelse ($user->Roles as $role)
                                    <x-buttons.pill name="role" count="{{ $role->name }}" theme="secondary" />
                                    @empty

                                    @endforelse
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            <x-EditButton itemId="{{ $user->id }}" path="user.edit" />
                                            <x-DeleteButton itemId="{{ $user->id }}" path="user.destroy" />
                                        </div>
                                    </div>

                                </td>
                              
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>

                    
                    <div class="text-center">
                        {!! $users->links() !!}
                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>
    </div>


    @endsection