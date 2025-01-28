@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h2 class="font-weight-bold">{{ __('Education Center') }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4 border-bottom-success">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 mt-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Manage Course') }}</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="row mt-0 mb-4 center-cols">
                            <div class="col-2 mr-4">
                                <div class="card border-left-primary shadow">
                                    <div class="card-body">
                                        <a href="{{ route('department.index') }}">
                                            <img class="card-img-top" src="{{ asset('img/admin/menu/department.jpg') }}"
                                                alt="{{ __('Department') }}">
                                        </a>
                                    </div>
                                    <div class="card-footer text-center custom-bg-color">
                                        <a href="{{ route('department.index') }}"
                                            class="font-weight-bold text-white text-uppercase">
                                            {{ __('Department') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 mr-4">
                                <div class="card border-left-primary shadow">
                                    <div class="card-body">
                                        <a href="{{ route('course.index') }}">
                                            <img class="card-img-top" src="{{ asset('img/admin/menu/course.jpg') }}"
                                                alt="{{ __('Course') }}">
                                        </a>
                                    </div>
                                    <div class="card-footer text-center custom-bg-color">
                                        <a href="{{ route('course.index') }}"
                                            class="font-weight-bold text-white text-uppercase">
                                            {{ __('Course') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 mr-4">
                                <div class="card border-left-primary shadow">
                                    <div class="card-body">
                                        <a href="{{ route('term.index') }}">
                                            <img class="card-img-top" src="{{ asset('img/admin/menu/term.jpg') }}"
                                                alt="{{ __('terms') }}">
                                        </a>
                                    </div>
                                    <div class="card-footer text-center custom-bg-color">
                                        <a href="{{ route('term.index') }}"
                                            class="font-weight-bold text-white text-uppercase">
                                            {{ __('Lessons') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 mr-4">
                                <div class="card border-left-primary shadow">
                                    <div class="card-body">
                                        <a href="{{ route('session.index') }}">
                                            <img class="card-img-top" src="{{ asset('img/admin/menu/session.jpg') }}"
                                                alt="{{ __('Sessions') }}">
                                        </a>
                                    </div>
                                    <div class="card-footer text-center custom-bg-color">
                                        <a href="{{ route('session.index') }}"
                                            class="font-weight-bold text-white text-uppercase">
                                            {{ __('Sessions') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <hr style="width: 97%;">
                    </div>
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Manage Assesment') }}</h6>
                    </div>

                    <div class="card-body">

                        <div class="row mt-0 mb-4 center-cols">
                            <div class="col-2 mr-4">
                                <div class="card border-left-primary shadow">
                                    <div class="card-body">
                                        <a href="{{ route('quiz.index') }}">
                                            <img class="card-img-top" src="{{ asset('img/admin/menu/quiz.png') }}"
                                                alt="{{ __('Quiz') }}">
                                        </a>
                                    </div>
                                    <div class="card-footer text-center custom-bg-color">
                                        <a href="{{ route('quiz.index') }}" class="font-weight-bold text-white text-uppercase">
                                            {{ __('Quiz') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 mr-4">
                                <div class="card border-left-primary shadow">
                                    <div class="card-body">
                                        <a href="{{ route('question.index') }}">
                                            <img class="card-img-top" src="{{ asset('img/admin/menu/question.png') }}"
                                                alt="{{ __('Question') }}">
                                        </a>
                                    </div>
                                    <div class="card-footer text-center custom-bg-color">
                                        <a href="{{ route('question.index') }}" class="font-weight-bold text-white text-uppercase">
                                            {{ __('Question') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <hr style="width: 97%;">
                    </div>
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Manage Plugins') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="row mt-0 mb-4 center-cols">
                        @can('file.index')
                        <div class="col-2 mr-4">
        
                            <div class="card border-left-primary shadow">
                                <div class="card-body">
                                    <a href="{{ route('file.index') }}">
                                        <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/file.png') }}"
                                            alt="{{ __('file') }}">
                                    </a>
                                </div>
                                <div class="card-footer text-center custom-bg-color">
                                    <a href="{{ route('file.index') }}" class="font-weight-bold text-white text-uppercase">
                                        {{ __('Files') }}
                                    </a>
                                </div>
                            </div>
        
                        </div>
                    @endcan
        
                    @can('document.index')
                        <div class="col-2 mr-4">
        
                            <div class="card border-left-primary shadow">
                                <div class="card-body">
                                    <a href="{{ route('document.index') }}">
                                        <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/document.png') }}"
                                            alt="{{ __('Document') }}">
                                    </a>
                                </div>
                                <div class="card-footer text-center custom-bg-color">
                                    <a href="{{ route('document.index') }}" class="font-weight-bold text-white text-uppercase">
                                        {{ __('document') }}
                                    </a>
                                </div>
                            </div>
        
                        </div>
                    @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--<div class="custom-card" style="max-width: 65%;">
            <div class="card-header">
                <h4>@lang('Manage Course')</h4>
            </div>
        </div>
        <div class="row mt-4 mb-4 center-cols">

            <div class="col-2 mr-4">
                <div class="card border-left-primary shadow">
                    <div class="card-body">
                        <a href="{{ route('department.index') }}">
                            <img class="card-img-top" src="{{ asset('img/admin/menu/department.jpg') }}"
                                alt="{{ __('Department') }}">
                        </a>
                    </div>
                    <div class="card-footer text-center custom-bg-color">
                        <a href="{{ route('department.index') }}" class="font-weight-bold text-white text-uppercase">
                            {{ __('Department') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-2 mr-4">
                <div class="card border-left-primary shadow">
                    <div class="card-body">
                        <a href="{{ route('course.index') }}">
                            <img class="card-img-top" src="{{ asset('img/admin/menu/course.jpg') }}"
                                alt="{{ __('Course') }}">
                        </a>
                    </div>
                    <div class="card-footer text-center custom-bg-color">
                        <a href="{{ route('course.index') }}" class="font-weight-bold text-white text-uppercase">
                            {{ __('Course') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-2 mr-4">
                <div class="card border-left-primary shadow">
                    <div class="card-body">
                        <a href="{{ route('term.index') }}">
                            <img class="card-img-top" src="{{ asset('img/admin/menu/term.jpg') }}"
                                alt="{{ __('terms') }}">
                        </a>
                    </div>
                    <div class="card-footer text-center custom-bg-color">
                        <a href="{{ route('term.index') }}" class="font-weight-bold text-white text-uppercase">
                            {{ __('Lessons') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-2 mr-4">
                <div class="card border-left-primary shadow">
                    <div class="card-body">
                        <a href="{{ route('session.index') }}">
                            <img class="card-img-top" src="{{ asset('img/admin/menu/session.jpg') }}"
                                alt="{{ __('Sessions') }}">
                        </a>
                    </div>
                    <div class="card-footer text-center custom-bg-color">
                        <a href="{{ route('session.index') }}" class="font-weight-bold text-white text-uppercase">
                            {{ __('Sessions') }}
                        </a>
                    </div>
                </div>
            </div>




        </div>


        <div class="custom-card" style="max-width: 80%;">
            <div class="card-header">
                <h4>@lang('Manage Assessment')</h4>
            </div>
        </div>

        <div class="row mt-4 mb-4 center-cols">
            <div class="col-2 mr-4">
                <div class="card border-left-primary shadow">
                    <div class="card-body">
                        <a href="{{ route('quiz.index') }}">
                            <img class="card-img-top" src="{{ asset('img/admin/menu/quiz.png') }}"
                                alt="{{ __('Quiz') }}">
                        </a>
                    </div>
                    <div class="card-footer text-center custom-bg-color">
                        <a href="{{ route('quiz.index') }}" class="font-weight-bold text-white text-uppercase">
                            {{ __('Quiz') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-2 mr-4">
                <div class="card border-left-primary shadow">
                    <div class="card-body">
                        <a href="{{ route('question.index') }}">
                            <img class="card-img-top" src="{{ asset('img/admin/menu/question.png') }}"
                                alt="{{ __('Question') }}">
                        </a>
                    </div>
                    <div class="card-footer text-center custom-bg-color">
                        <a href="{{ route('question.index') }}" class="font-weight-bold text-white text-uppercase">
                            {{ __('Question') }}
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="custom-card" style="max-width: 65%;">
            <div class="card-header">
                <h4>@lang('Manage Plugins')</h4>
            </div>
        </div>
        <div class="row  mt-4 mb-4 center-cols">
            {{--               
    @can('rubric.index')
                    <div class="col-2 mr-4">

                        <div class="card border-left-primary shadow">
                            <div class="card-body">
                                <a href="{{ route('rubric.index') }}">
                                    <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/rubric.png') }}"
                                        alt="{{ __('rubric') }}">
                                </a>
                            </div>
                            <div class="card-footer text-center custom-bg-color">
                                <a href="{{ route('rubric.index') }}" class="font-weight-bold text-white text-uppercase">
                                    {{ __('rubric') }}
                                </a>
                            </div>

                        </div>

                    </div>
                @endcan

                @can('feedback.index')
                    <div class="col-2 mr-4">

                        <div class="card border-left-primary shadow">
                            <div class="card-body">
                                <a href="{{ route('feedback.index') }}">
                                    <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/feedback.png') }}"
                                        alt="{{ __('feedback') }}">
                                </a>
                            </div>
                            <div class="card-footer text-center custom-bg-color">
                                <a href="{{ route('feedback.index') }}" class="font-weight-bold text-white text-uppercase">
                                    {{ __('feedback') }}
                                </a>
                            </div>

                        </div>
                    </div>
                @endcan
--}}
 {{--          @can('file.index')
                <div class="col-2 mr-4">

                    <div class="card border-left-primary shadow">
                        <div class="card-body">
                            <a href="{{ route('file.index') }}">
                                <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/file.png') }}"
                                    alt="{{ __('file') }}">
                            </a>
                        </div>
                        <div class="card-footer text-center custom-bg-color">
                            <a href="{{ route('file.index') }}" class="font-weight-bold text-white text-uppercase">
                                {{ __('Files') }}
                            </a>
                        </div>
                    </div>

                </div>
            @endcan

            @can('document.index')
                <div class="col-2 mr-4">

                    <div class="card border-left-primary shadow">
                        <div class="card-body">
                            <a href="{{ route('document.index') }}">
                                <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/document.png') }}"
                                    alt="{{ __('Document') }}">
                            </a>
                        </div>
                        <div class="card-footer text-center custom-bg-color">
                            <a href="{{ route('document.index') }}" class="font-weight-bold text-white text-uppercase">
                                {{ __('document') }}
                            </a>
                        </div>
                    </div>

                </div>
            @endcan

            {{--
                @can('badges.index')
                    <div class="col-2 mr-4">

                        <div class="card border-left-primary shadow">
                            <div class="card-body">

                                <a href="{{ route('badges.index') }}">
                                    <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/badge.png') }}"
                                        alt="{{ __('badges') }}">
                                </a>

                            </div>
                            <div class="card-footer text-center custom-bg-color">
                                <a href="{{ route('badges.index') }}" class="font-weight-bold text-white text-uppercase">
                                    {{ __('Certificates') }}
                                </a>
                            </div>
                        </div>

                    </div>
                @endcan
                --}}
        </div>
    </div>
    </div>
    </div>
@endsection
