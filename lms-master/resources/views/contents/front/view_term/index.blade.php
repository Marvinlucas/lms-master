<!-- resources/views/front/view_term/index.blade.php -->
@extends('layouts.front.theme')

@section('content')
    <!-- Enroll Form -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="row g-5  justify-content-center mt-5">

                <div class="col-lg-6">
                    <div class=" mr-1">
                        <img src="{{ asset('storage/' . $term->file) }}" alt="{{ $term->title }}" class="img-fluid wow "
                            data-wow-delay="0.5s">
                    </div>
                    <div class="col-md-9 mt-5">
                        <h1>{{ $term->title }}</h1>
                    </div>
                    <hr>
                    <h5>{{ __('Description') }}</h5>
                    <p>{{ $term->description }}</p>
                </div>



                <div class="col-lg-4 wow  " data-wow-delay="0.1s">
                    <div class="form-enroll">
                        <div class="col-md-9">
                            <h4>{{ $term->title }}</h4>
                        </div>

                        <div class="skill mt-4">
                            <div class="d-flex justify-content-between">
                                <p><i class="fas fa-book" style="padding-right: 15px;"></i>{{ __('Session') }}</p>
                                <p class="mb-1">{{ $totalSessionCount }}</p>
                            </div>
                            <hr>
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p><i class="fa-solid fa-users" style="padding-right: 15px;"></i>{{ __('Enrolled') }}
                                    </p>
                                    <p class="mb-1">{{ $connectedUserCount }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p><i class="fa-solid fa-chalkboard-user"
                                            style="padding-right: 15px;"></i>{{ __('Mentor') }}</p>
                                    @foreach ($connectedUsersWithRole3 as $user)
                                        <p class="mb-1">{{ $user->name }}</p>
                                    @endforeach
                                </div>
                            </div>

                            <hr>

                            <div class="text-center">
                                @auth
                                    @if(auth()->user()->role_id == 4)
                                        @if($isEnrolled) <!-- You need to replace $userIsEnrolled with your actual logic -->
                                            <button class="btn py-sm-2 px-sm-5 mt-3" disabled>
                                                You are already enrolled
                                            </button>
                                        @else
                                            <form id="enrollForm" method="POST" action="{{ route('enroll.store', ['id' => $term->id]) }}">
                                                @csrf
                                                <button type="submit" id="enrollButton" class="btn py-sm-2 px-sm-5 mt-3">
                                                    <i id="loader" class="fas fa-spinner fa-spin" style="display: none;"></i>
                                                    Enroll Now
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                @else
                                    <!-- Form for guests -->
                                    <form id="enrollForm" method="POST" action="{{ route('enroll.store', ['id' => $term->id]) }}">
                                        @csrf
                                        <button type="submit" id="enrollButton" class="btn py-sm-2 px-sm-5 mt-3">
                                            <i id="loader" class="fas fa-spinner fa-spin" style="display: none;"></i>
                                            Enroll Now
                                        </button>
                                    </form>
                                @endauth
                            </div>
                            
                            
                        


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- enroll form End -->
    @endsection
