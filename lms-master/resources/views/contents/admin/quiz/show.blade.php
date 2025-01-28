@extends('layouts.admin')


@section("content")
<div class="w-100 d-block">
    <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
        <div class="container" style="max-width: 100%;">
            <h4 class="font-weight-bold"><i
                    class="fa-solid fa-bars-progress"></i>{{ __(' Update:  ') }}<span style="color: #fa5d4e;">{{ $quiz->title ?? '' }}</span></h4></h4>
        </div>
    </div>
<div class="row">
   
    <div class="col-lg-6">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ $quiz->title }}</h6>
                <div class="dropdown no-arrow">
                    <div class="dropdown no-arrow">
                        <x-BackButton />
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <p>
                    {!! $quiz->description !!}
                </p>
                <div class="text-center">
                    
                    <hr/>

                    @forelse ($quiz->Questions as $question)
                    
                    <x-box.item
                    :title="$question->title">
                    @if(!$loop->first)
                        @slot('up')
                            {{ route('orderChangeQuestion' , ['from' => $question->pivot->id , 'move' => 'up' ]) }}
                        @endslot
                    @endif
                    @if(!$loop->last)
                        @slot('down')
                            {{ route('orderChangeQuestion' , ['from' => $question->pivot->id , 'move' => 'down' ]) }}
                        @endslot
                    @endif
                
                    @slot('delete')
                        {{ route('deleteQuestionAsQuiz' ,['quizQuestion' => $question->pivot->id ]) }}
                    @endslot
                
                    </x-box.item>
                    
                    @empty  
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between" style="height: 74px;">
                <h6 class="m-0 font-weight-bold text-uppercase ">{{ __("Questions") }}</h6>
                <div class="dropdown no-arrow">
                    {{--<div class="dropdown no-arrow">
                        <x-CreateButton path="{{ route('question.create'). '?quiz_id=' . $quiz->id }}" />
                           {{-- <x-CreateButton path="{{ route('question.create') }}" />--
                    </div>--}}
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    @livewire('container.show-questions', [
                        'route' => 'addQuestionToQuiz',
                        'parent' => $quiz->id
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
