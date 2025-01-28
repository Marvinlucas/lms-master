@extends('layouts.admin')


@section("content")

<div class="custom-card ">
    <div class="card-main-header d-flex justify-content-between">
        <div class="container">
            <h3 class="moved-text">Manage Feedback</h3>
        </div>
        <div class="image-overlay">
            <img src="{{ asset('img/admin/menu/dashboard.png') }}" alt="{{ __('badges') }}"
                style="width: 75%; height: 75%;">
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-6">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">{{ $feedback->title }}</h6>
                <div class="dropdown no-arrow">
                    <div class="dropdown no-arrow">
                        <x-BackButton />
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <p>
                    {!! $feedback->description !!}
                </p>
                <div class="text-center">
                    
                    <hr/>

                    @forelse ($feedback->Questions as $question)
                    
                    <x-box.item
                    :title="$question->title">
                    @if(!$loop->first)
                        @slot('up')
                            {{ route('orderChangeQuestionFeedback' , ['from' => $question->pivot->id , 'move' => 'up' ]) }}
                        @endslot
                    @endif
                    @if(!$loop->last)
                        @slot('down')
                            {{ route('orderChangeQuestionFeedback' , ['from' => $question->pivot->id , 'move' => 'down' ]) }}
                        @endslot
                    @endif
                
                    @slot('delete')
                        {{ route('deleteQuestionAsFeedback' ,['feedbackQuestion' => $question->pivot->id ]) }}
                    @endslot
                
                    </x-box.item>
                    
                    @empty  
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">{{ __("Questions") }}</h6>
                <div class="dropdown no-arrow">
                    <div class="dropdown no-arrow">
                        <x-CreateButton path="{{ route('question.create'). '?feedback_id=' . $feedback->id }}" />
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    @livewire('container.show-questions', [
                        'route' => 'addQuestionToFeedback',
                        'parent' => $feedback->id
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
