@extends('layouts.admin')


@section("content")
<div class="w-100 d-block">
    <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
        <div class="container" style="max-width: 100%;">
            <h3 class="font-weight-bold">{{ __('User Profile') }}</h3>
        </div>
    </div>

<div class="row">
    <div class="col-12 ">
        <ul class="nav nav-tabs mb-3" data-tabs="tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#RoadMap">Profile</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Particpants">Password</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="RoadMap">
                @livewire('user.profile', ['user' => $user])
            </div>
            <div class="tab-pane" id="Particpants">
                @livewire('user.change-password', ['user' => $user])
            </div>

        </div>
    </div>
</div>
@endsection