@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('Enrollment') }}</h3>
            </div>
        </div>
        <div class="row">

        <div class="table-responsive d-flex justify-content-center">

            <div class="col-12">
                <div class="card mb-4 border-bottom-success">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase"> {{ __('Terms') }} </h6>
                        <div class="dropdown no-arrow">
                            <x-BackButton />
                        </div>
                    </div>



                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-bordered">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('Title') }}</th>
                                            <th scope="col">{{ __('Department') }}</th>
                                            <th scope="col">{{ __('Image') }}</th>
                                            <th scope="col">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    @if (auth()->user()->role_id == 3)
                                        @foreach (auth()->user()->terms as $term)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $term->title }}</td>
                                                <td>{{ $term->department->title }}</td>
                                                <td>
                                                    @if ($term->file)
                                                        <img src="{{ asset('storage/' . $term->file) }}"
                                                            alt="{{ $term->title }}" width="100">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                            aria-labelledby="dropdownMenuLink" style="">
                                                            <div class="dropdown-header">{{ __('Action:') }}</div>

                                                            {{-- Add your actions here --}}
                                                            <a class="dropdown-item"
                                                                href="{{ route('enrollment.enroll.index', ['id' => $term->id]) }}">
                                                                <i class="fa fa-plus-circle pr-2"
                                                                    style="color: #41a4f4;"></i>
                                                                {{ __('Enroll') }}
                                                            </a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('enrollment.viewEnroll.index', ['id' => $term->id]) }}">
                                                                <i class="fa fa-th-list pr-2" style="color: #7de082;"></i>
                                                                {{ __('View Enrolled') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach ($termsWithCourse as $term)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $term->title }}</td>
                                                <td>{{ $term->department->title }}</td>
                                                <td>
                                                    @if ($term->file)
                                                        <img src="{{ asset('storage/' . $term->file) }}"
                                                            alt="{{ $term->title }}" width="100">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                            aria-labelledby="dropdownMenuLink" style="">
                                                            <div class="dropdown-header">{{ __('Action:') }}</div>

                                                            {{-- Add your actions here --}}
                                                            <a class="dropdown-item"
                                                                href="{{ route('enrollment.enroll.index', ['id' => $term->id]) }}">
                                                                <i class="fa fa-plus-circle pr-2"
                                                                    style="color: #41a4f4;"></i>
                                                                {{ __('Enroll') }}
                                                            </a>

                                                            <a class="dropdown-item"
                                                                href="{{ route('enrollment.viewEnroll.index', ['id' => $term->id]) }}">
                                                                <i class="fa fa-th-list pr-2" style="color: #7de082;"></i>
                                                                {{ __('View Enrolled') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

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
        </div>
    </div>
@endsection
