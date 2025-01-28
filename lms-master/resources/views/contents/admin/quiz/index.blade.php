@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('Manage Quiz') }}</h3>
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
                            <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Quiz List') }}</h6>

                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink" style="">
                                    <div class="dropdown-header">{{ __('Action') }}</div>
                                    @can('quiz.create')
                                        <x-CreateButton path="{{ route('quiz.create') }}" />
                                    @endcan
                                    <a class="dropdown-item" href="{{ route('session.index') }}">
                                        <i class="fas fa-arrow-right pr-2"></i>
                                        {{ __('Session') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('question.index') }}">
                                        <i class="fas fa-arrow-right pr-2"></i>
                                        {{ __('Questions') }}
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
                                            {{-- <th scope="col">{{ __("Mentor") }}</th>
                                <th scope="col">{{ __("attempt") }}</th>
                                <th scope="col">{{ __("duration") }}</th> --}}
                                            <th scope="col">{{ __('min_pass_score') }}</th>
                                            <th scope="col">{{ __('theme') }}</th>
                                            {{-- <th scope="col">{{ __("Shuffle") }}</th> --}}
                                            <th scope="col">{{ __('Lesson') }}</th>

                                            @if (Auth::user()->hasRole('Super-Admin') ||
                                                    Auth::user()->hasRole('Super-Admin') ||
                                                    Auth::user()->hasAnyPermission(['quiz.edit', 'quiz.delete']))
                                                <th scope="col">{{ __('Action') }}</th>
                                            @endif

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($quizes as $quiz)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <strong>{{ $quiz->title }}</strong>
                                                </td>



                                                <td>
                                                    <span class="badge badge-center rounded-pill bg-label-danger">
                                                        {{ $quiz->min_pass_score }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $quiz->show_question }}
                                                </td>




                                                <td>
                                                    {{ App\Models\Term::find($quiz->term_id)->title }}
                                                </td>



                                                @if (Auth::user()->hasRole('Super-Admin') ||
                                                        Auth::user()->hasRole('Super-Admin') ||
                                                        Auth::user()->hasAnyPermission(['quiz.edit', 'quiz.delete']))
                                                    <td>
                                                        <div class="dropdown no-arrow">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                                id="dropdownMenuLink" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                                aria-labelledby="dropdownMenuLink" style="">
                                                                <div class="dropdown-header">{{ __('Actions') }}:</div>
                                                                @can('quiz.edit')
                                                                    <x-EditButton itemId="{{ $quiz->id }}"
                                                                        path="quiz.edit" />
                                                                @endcan
                                                                @can('quiz.delete')
                                                                    <x-DeleteButton itemId="{{ $quiz->id }}"
                                                                        path="quiz.destroy" />
                                                                @endcan
                                                                @can('quiz.show')
                                                                    <x-buttons.show itemId="{{ $quiz->id }}"
                                                                        path="quiz.show" text="Show Questions" />
                                                                @endcan
                                                            </div>
                                                        </div>

                                                    </td>
                                                @endif
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>


                                <div class="text-center">
                                    {!! $quizes->links() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
