@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('View Enrolled') }}: <span style="color: #fa5d4e;">{{ $term->title }}</span></h3>
            </div>
        </div>
        <div class="row">
        <div class="table-responsive d-flex justify-content-center">
           
            <div class="col-12">
                <div class="card  mb-4 border-bottom-success">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Enrolled List') }}</h6>
                        <div class="dropdown no-arrow">
                            <a id="backButtons" href="{{ route('enrollment.show', ['id' => $term]) }}" class="btn btn-warning btn-icon-split mr-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">{{ __("Back") }}</span>
                            </a>
                        </div>
                        
                        <script>
                            document.getElementById("backButtons").addEventListener("click", function(event) {
                                event.preventDefault(); // Prevent the default link behavior
                                window.history.back(); // Navigate to the previous page
                            });
                        </script>
                        
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Profile Picture') }}</th>
                                        <th scope="col">{{ __('UserName') }}</th>
                                        <th scope="col">{{ __('Full Name') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filteredUsers as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                @if ($user->profile_picture)
                                                    <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                        alt="{{-- $term->title --}}" height="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }} {{ $user->middle_initial }}. {{ $user->last_name }}
                                            </td>
                                            <td>
                                                @if ($user->pivot->finish_date)
                                                    <span class="badge badge-center rounded-pill bg-success text-white">
                                                        {{ __('Completed') }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-center rounded-pill bg-danger text-white">
                                                        {{ __('On progress') }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('learnerShowTerms', $user->id) }}" class="btn btn-primary">View</a>
                                            </td>                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>




                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
