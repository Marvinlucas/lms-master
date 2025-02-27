@extends('layouts.admin')


@section("content")
<div class="row">
    
    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-success card-header-task">
            <!-- Card Header - Dropdown -->
            <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold">{{ $activity->title }}</h6>

                <div class="dropdown no-arrow">
                    <x-BackButton />
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                @livewire('activity.quiz', [
                'activity' => $activity,
                'participant' => $participant,
                'workout' => $workout
                ])
            </div>


            <div class="card-footer text-center p-3">
                <button class="btn btn-danger" id="saveAndClose">
                    <i class="fa fa-save"></i> {{ __("Submit") }}
                </button>
            </div>
        </div>
    </div>

    <div class="d-none ">
        <div id="dialog-confirm" title="Save And Close?">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                These items will be permanently close and cannot be recovered. Are you sure?</p>
        </div>
    </div>
    @endsection

    @section('js')
    <script>
        let mp3WorkerPathPHP = "{{ URL::to('js/record/src/mp3Worker.js') }}";
    </script>
    <script src="{{ URL::to('/js/quiz.js') }}"></script>
    <script src="{{ URL::to('/js/record/src/recorder.js') }}"></script>
    <script src="{{ URL::to('/js/record/src/mp3Worker.js') }}"></script>
    <script src="{{ URL::to('/js/record/js/app.js') }}"></script>
    @endsection