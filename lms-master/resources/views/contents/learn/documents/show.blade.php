@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-success card-header-task">
            <!-- Card Header - Dropdown -->
            <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">{{ $activity->title }}</h6>
                <div class="no-arrow">
                    <x-complete-and-next :workout="$workout" />
                </div>
                <div>
                        <a id="backButtons" href="{{ route('learningCourse', ['participant' => $participant]) }}" class="btn btn-warning btn-icon-split mr-2">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">{{ __("Back") }}</span>
                        </a>    
                        
                </div>
            </div>
            
            @livewire('activity.document', [
            'activity' => $activity
            ])



        </div>
    </div>


    @endsection