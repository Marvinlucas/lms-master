@extends('layouts.admin')
@section('content')
@can('mentor.list')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('Enrollment') }}</h3>
            </div>
        </div>
 
    </div>

    <div class="row">
        <div class="col-12 ">
            <ul class="nav nav-tabs mb-3" data-tabs="tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Mentors">Mentors</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Supervisor">Supervisor</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Particpants">Particpants</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Mentors">
                    @include('contents.admin.enrollment.enroll.parts.mentors')
                </div> 
               <div class="tab-pane" id="Particpants"> 
                    @include('contents.admin.enrollment.enroll.parts.participants')
                </div>
                <div class="tab-pane" id="Supervisor"> 
                    @include('contents.admin.enrollment.enroll.parts.supervisor')
                </div>


            </div>
        </div>
    </div>
    </div>
    @endcan
@endsection
