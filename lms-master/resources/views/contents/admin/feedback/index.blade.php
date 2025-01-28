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

<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __("feedback") }}</h6>
                <div class="dropdown no-arrow">
                    @can('feedback.create')
                    <x-CreateButton path="{{ route('feedback.create') }}" />
                    @endcan
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
    
                    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __("Title") }}</th>
                        <th scope="col">{{ __("require") }}</th>
                        @can('feedback.show')
                        <th scope="col">{{ __("questions") }}</th>  
                        @endcan                     
                        
                        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['feedback.edit' , 'feedback.delete']))
                        <th scope="col">{{ __("Action") }}</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($feedbacks as $feedback)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $feedback->title }} 
                                </td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $feedback->require }}" />
                                </td>
                                @can('feedback.show')
                                <td>
                                    <x-buttons.show itemId="{{ $feedback->id }}" path="feedback.show" />
                                </td>
                                @endcan
                                @if(Auth::user()->hasRole('Super-Admin') 
                                || Auth::user()->hasRole('Super-Admin') 
                                || Auth::user()->hasAnyPermission(['feedback.edit' , 'feedback.delete']))
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        @can('feedback.edit')
                                            <x-EditButton itemId="{{ $feedback->id }}" path="feedback.edit" />
                                        @endcan
                                        @can('feedback.delete')
                                            <x-DeleteButton itemId="{{ $feedback->id }}" path="feedback.destroy" />                                    
                                        @endcan
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @empty
                            
                        @endforelse                        
                    </tbody>
                </table>
                
                <hr/>
                <div class="text-center">
                    {!! $feedbacks->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection