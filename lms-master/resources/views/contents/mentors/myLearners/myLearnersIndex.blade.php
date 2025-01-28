@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('Manage Learners') }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive d-flex justify-content-center">
                <div class="col-12">
                    <div class="card  mb-4 border-bottom-success">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold">{{ __('My Learners') }}</h6>
                            <div class="dropdown no-arrow">



                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="text-center">
                                <div class="table-responsive text-center">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('name') }}</th>
                                            <th scope="col">{{ __('email') }}</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($participants as $participant)
                                            @if ($participant->User->role_id == 4)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <a href="{{ route('learnerShowTerms', $participant->User->id) }}"
                                                            class="btn btn-sm btn-primary btn-block">
                                                            {{ $participant->User->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $participant->User->email }}</td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>

                                <hr />
                                <div class="text-center">
                                    {{ $participants->links() }}
                                </div>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
