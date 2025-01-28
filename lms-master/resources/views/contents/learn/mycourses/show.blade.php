@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('Manage Department') }}</h3>
            </div>
        </div>
        <div class="dropdown no-arrow mb-4 text-right">
            <div>
                @if (auth()->user()->role_id == 4)
                    <a id="backButtons" href="{{ route('myCourse') }}" class="btn btn-warning btn-icon-split mr-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">{{ __('Back') }}</span>
                    </a>
                @else
                    <div class="dropdown no-arrow">
                        <x-BackButton />

                    </div>
                @endif
            </div>

        </div>
        <div class="row">

            <div class="col-12 mb-3">


                @forelse ($participant->Term->Sessions as $session)
                    <x-box.session-item-for-student :session="$session" :participant="$participant" />

                @empty
                @endforelse
            </div>

        </div>
    @endsection
