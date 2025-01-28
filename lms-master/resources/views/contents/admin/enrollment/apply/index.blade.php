@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="custom-card ">
            <div class="card-main-header d-flex justify-content-between">
                <div class="container">
                    <h3 class="moved-text-sm">Enrollment</h3>
                </div>
                <div class="image-overlay">
                    {{--<img src="{{ asset('img/admin/menu/dashboard.png') }}" alt="{{ __('badges') }}"
                        style="width: 160px; height: 160px;">--}}
                </div>
            </div>
        </div>

        <div class="table-responsive d-flex justify-content-center">

            <div class="col-12">
                <div class="card shadow mb-4 border-bottom-primary">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase"> {{ __('Applicant List') }} </h6>
                        <div class="dropdown no-arrow">
                            <x-BackButton />
                        </div>
                    </div>



                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive text-center">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Username') }}</th>
                                        <th scope="col">{{ __('Image') }}</th>
                                        <th scope="col">{{ __('First Name') }}</th>
                                        <th scope="col">{{ __('Last Name') }}</th>
                                        <th scope="col">{{ __('Email') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1{{-- $loop->iteration --}}</th>
                                        <td>{{ __('ImJuan') }}</td>
                                        <td>{{ __('no image') }}</td>
                                        <td>{{ __('Juan') }}</td>
                                        <td>{{ __('Dela Cruz') }}</td>
                                        <td>{{ __('Juan@gmail.com') }}</td>
                                        <td>
                                            <button class="btn btn-success" onclick="approveUser()">Approve</button>
                                            <button class="btn btn-danger" onclick="denyUser()">Deny</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr />
                            <div class="text-center">
                                {{--  {!! $courses->links() !!} --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
