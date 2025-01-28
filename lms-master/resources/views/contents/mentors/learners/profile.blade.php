@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('View Learner') }}: <span style="color: #fa5d4e;">{{ $user->name }}
                        {{ $user->middle_initial }}. {{ $user->last_name }}</span></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-7">
                <x-modules.terms.all :terms="$terms" />
            </div>
            <div class="col-5">
                <div class="card shadow mb-4 border-bottom-success ">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase"><i class="fa fa-comment"></i>
                            {{ __('Last Activity') }}
                        </h6>
                        <div class="dropdown no-arrow">
                            <a href="#" onclick="history.go(-3); return false;" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">Back</span>
                            </a>                            

                        </div>
                    </div>
                    <!-- Card Header - Dropdown -->
                    <!-- Card Body -->
                    <div class="card-body">
                        @forelse($lastActivities as $workout)
                            <x-box.workout-item :workout="$workout" />
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
