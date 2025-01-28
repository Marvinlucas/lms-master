@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('Manage Session') }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive d-flex justify-content-center">

                <div class="col-12">
                    @if (session('danger'))
                        <div class="alert alert-danger alert-dismissible auto-close-alert">
                            {{ session('danger') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
      
                    <div class="card mb-4 border-bottom-success">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Sessions List') }}</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink" style="">
                                    <div class="dropdown-header">{{ __('Action') }}</div>
                                    @can('session.create')
                                        <x-CreateButton path="{{ route('session.create') }}" />
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('term.index') }}">
                                        <i class="fas fa-arrow-right pr-2"></i>
                                        {{ __('Lessons') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('quiz.index') }}">
                                        <i class="fas fa-arrow-right pr-2"></i>
                                        {{ __('Quiz') }}
                                    </a>
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
                                            <th scope="col">{{ __('Title') }}</th>
                                            <th scope="col">{{ __('Lessons') }}</th>
                                            @if (Auth::user()->hasRole('Super-Admin') ||
                                                    Auth::user()->hasRole('Super-Admin') ||
                                                    Auth::user()->hasAnyPermission(['session.edit', 'session.delete']))
                                            @endif
                                            <th scope="col">{{ __('Action') }}</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sessions as $session)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $session->title }}</td>
                                                <td>{{ App\Models\Term::find($session->term_id)->title }}</td>

                                                <td>
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>

                                                        @if (Auth::user()->hasRole('Super-Admin') ||
                                                                Auth::user()->hasRole('Super-Admin') ||
                                                                Auth::user()->hasAnyPermission(['rubric.edit', 'rubric.delete']))
                                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                                aria-labelledby="dropdownMenuLink" style="">

                                                                <div class="dropdown-header">{{ __('Actions') }}:</div>

                                                                @can('session.edit')
                                                                    <x-EditButton itemId="{{ $session->id }}"
                                                                        path="session.edit" />
                                                                @endcan
                                                                @can('session.delete')
                                                                    <x-DeleteButton itemId="{{ $session->id }}"
                                                                        path="session.destroy" />
                                                                @endcan
                                                                @can('session.show')
                                                                    <x-buttons.show itemId="{{ $session->id }}"
                                                                        path="session.show" />
                                                                @endcan
                                                        @endif
                                                    </div>
                            </div>
                            </td>
                            </tr>
                        @empty
                            @endforelse
                            </tbody>
                            </table>

                            <hr />
                            <div class="text-center">
                                {!! $sessions->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection
