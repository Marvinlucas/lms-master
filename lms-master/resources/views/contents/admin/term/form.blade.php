@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('Manage Lessons') }}</h3>
            </div>
        </div>

        <!-- Create Form Card -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4 border-bottom-success">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Lesson Form') }}</h6>
                        <div class="dropdown no-arrow">
                            <x-BackButton />

                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">

                            @if (isset($term))
                                <form class="user" method="POST" action="{{ route('term.update', $term->id) }}">
                                    @method('patch')
                                @else
                                    <form class="user" method="POST" action="{{ route('term.store') }}">
                            @endif

                            @csrf
                            <div class="row mb-2">
                                <div class="col-sm-6 mb-sm-0">
                                    <div class="form-group">
                                        <label>Lesson Name: </label>
                                        <input name="title" type="text" class="form-control form-control-user"
                                            id="title" placeholder="Lesson Name" value="{{ $term->title ?? '' }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    @livewire('forms.department-course-drop-down', [
                                        'department_id' => $term->department_id ?? null,
                                        'course_id' => $term->course_id ?? null,
                                    ])

                                    <div class="form-group">
                                        <textarea name="description" type="text" class="form-control mt-3" id="description" placeholder="Description">{{ $term->description ?? '' }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>


                                </div>

                                <div class="col-md-6">
                                    <label>Image: </label>
                                    @livewire('services.media.uploadable', [
                                        'file' => $term->file ?? '',
                                        'path' => 'term',
                                        'target' => 'term',
                                    ])
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
    </div>
@endsection
