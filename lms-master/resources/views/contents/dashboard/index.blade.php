@extends('layouts.admin')


@section('content')
<div class="w-100 d-block">
    <div>
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h2 class="font-weight-bold">{{ __('Dashboard') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4 border-bottom-success">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 mt-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Analytics') }}</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">


                        @can('course.index')
                            <div class="row mt-0 mb-4 center-cols ">

                                <div class="col-md-3">
                                    <div class="card-counter info"
                                        style="background: linear-gradient(90deg, rgba(207,81,228,1) 0%, rgb(163, 45, 183) 100%);">
                                        <i class="fa-solid fa-building-user"></i>
                                        <span class="count-numbers">{{ $departmentCount }}</span>
                                        <span class="count-name">Total Department</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-counter info"
                                        style="background: linear-gradient(90deg, rgba(95,180,249,1) 0%, rgb(65, 164, 244) 100%);">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                        <span class="count-numbers">{{ $courseCount }}</span>
                                        <span class="count-name">Total Course</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-counter info"
                                        style="background: linear-gradient(90deg, rgba(131,233,136,1) 0%, rgb(102, 186, 105) 100%);">
                                        <i class="fa-solid fa-person-chalkboard"></i>
                                        <span class="count-numbers">{{ $termCount }}</span>
                                        <span class="count-name">Total Lessons</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-counter info"
                                        style="background: linear-gradient(90deg, rgba(255,198,116,1) 0%, rgb(255, 167, 38) 100%);">
                                        <i class="fa-solid fa-user-graduate"></i>
                                        <span class="count-numbers">{{ $userCount }}</span>
                                        <span class="count-name">Total Learners</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-counter success"
                                        style="background: linear-gradient(90deg, rgb(245, 16, 149) 0%, rgba(255, 10, 71, 0.726)100%);">
                                        <i class="fa-solid fa-user-secret"></i>
                                        <span class="count-numbers">{{ $supervisorCount }}</span>
                                        <span class="count-name">Total Supervisors</span>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="card-counter primary">
                                        <i class="fa-solid fa-question"></i>
                                        <span class="count-numbers">{{ $questionCount }}</span>
                                        <span class="count-name">Total Questions</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-counter primary"
                                        style="background: linear-gradient(90deg, rgb(255, 115, 0) 0%, rgba(252, 72, 1, 0.726)100%);">
                                        <i class="fa-solid fa-book"></i>
                                        <span class="count-numbers">{{ $quizCount }}</span>
                                        <span class="count-name">Total Quiz</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-counter danger">
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                        <span class="count-numbers">{{ $mentorCount }}</span>
                                        <span class="count-name">Total Mentors</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card shadow mb-4 border-bottom-success">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header-custom py-3 mt-4 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Top 10 Popular Courses') }}
                                            </h6>

                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="card-body">
                                                <dl class="top-courses-list">
                                                    @foreach ($topCourses as $index => $course)
                                                        <dt class="course-item">
                                                            <span class="rank">{{ $index + 1 }}.</span>
                                                            <span class="course-name">
                                                                <h6>{{ $course->name }}</h6>
                                                            </span>
                                                        </dt>
                                                    @endforeach
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="card shadow mb-4 border-bottom-success">
                                        <!-- Card Header - Dropdown -->
                                        <div
                                            class="card-header-custom py-3 mt-4 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-uppercase">
                                                {{ __('Monthly Enrollees Report') }}
                                            </h6>

                                        </div>
                                        <!-- Card Body -->

                                        <div class="card-body">
                                            <div class="card-body">
                                                <canvas id="enrollmentChart"></canvas>
                                            </div>
                                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                            <script>
                                                const enrollmentData = {
                                                    labels: {!! json_encode($labels) !!},
                                                    datasets: [{
                                                        label: 'Total Enrollments',
                                                        data: {!! json_encode($data) !!},
                                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                        borderColor: 'rgba(75, 192, 192, 1)',
                                                        borderWidth: 1,
                                                        fill: true, // Fill the area under the line
                                                        tension: 0.4, // Set the tension to control the curvature
                                                    }]
                                                };
                                            
                                                const enrollmentChartCanvas = document.getElementById('enrollmentChart').getContext('2d');
                                            
                                                const enrollmentChart = new Chart(enrollmentChartCanvas, {
                                                    type: 'line', // Use 'line' type to create a line chart with an area fill
                                                    data: enrollmentData,
                                                    options: {
                                                        scales: {
                                                            y: {
                                                                type: 'linear',
                                                                position: 'left',
                                                                beginAtZero: false,
                                                                ticks: {
                                                                    stepSize: 1,
                                                                    precision: 0,
                                                                },
                                                            },
                                                        }
                                                    }
                                                });
                                            </script>
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endcan


                        @if (auth()->user()->role_id == 4)
                            <div class="row mt-0 mb-4 center-cols ">

                                <div class="col-md-3">
                                    <div class="card-counter info"
                                        style="background: linear-gradient(90deg, rgba(207,81,228,1) 0%, rgb(163, 45, 183) 100%);">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                        <span class="count-numbers">{{ $termCount_enroll }}</span>
                                        <span class="count-name">Total Course Enrolled</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-counter info"
                                        style="background: linear-gradient(90deg, rgba(95,180,249,1) 0%, rgb(65, 164, 244) 100%);">
                                        <i class="fa-solid fa-spinner"></i>
                                        <span class="count-numbers">{{ $noFinishDateCount }}</span>
                                        <span class="count-name">Total Active Course</span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card-counter info"
                                        style="background: linear-gradient(90deg, rgba(255,198,116,1) 0%, rgb(255, 167, 38) 100%);">
                                        <i class="fa-solid fa-flag-checkered"></i>
                                        <span class="count-numbers">{{ $finishDateCount }}</span>
                                        <span class="count-name">Completed Courses</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    
                
            </div>
        </div>
    </div>
</div>
@endsection
