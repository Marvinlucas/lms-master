@extends('layouts.admin')


@section("content")
<div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
    <div class="container" style="max-width: 100%;">
        <h3 class="font-weight-bold">{{ __('Manage Questions') }}</h3>
    </div>
</div>
<!-- Create Form Card -->
<div class="row">
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-success">
        <!-- Card Header - Dropdown -->
        <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">{{ __("Question Form") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">
                
                @livewire('factory.render', [
                    'question' => $question ?? null,
                    'quiz' => $quiz ?? null
                    ])

            </div>
        </div>
    </div>
</div>
</div>


@endsection