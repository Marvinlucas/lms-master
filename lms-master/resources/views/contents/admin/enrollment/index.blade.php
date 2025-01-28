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
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Courses List') }}</h6>


                    </div>


                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive text-center">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Department') }}</th>
                                        <th scope="col">{{ __('Image') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->Department->title}}</td>
                                        <td> @if ($course->file)
                                            <img src="{{ asset('storage/' . $course->file) }}" alt="{{ $course->title }}" width="100">
                                        @else
                                            No Image
                                        @endif</td>
                                        <td>
                                            <a href="{{ route('enrollment.show', ['id' => $course->id]) }}" class="btn btn-primary">View</a>
                                        </td>
                                        
                                         
                                    @endforeach
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
    @endsection
