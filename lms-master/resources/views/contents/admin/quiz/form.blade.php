@extends('layouts.admin')


@section("content")

<div class="w-100 d-block">
    <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
        <div class="container" style="max-width: 100%;">
            <h3 class="font-weight-bold">{{ __('Manage Quiz') }}</h3>
        </div>
    </div>


<!-- Create Form Card -->
<div class="row">
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-success">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-uppercase">{{ __("Quiz Form") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($quiz))
                    <form class="user" method="POST" action="{{ route('quiz.update' , $quiz->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('quiz.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $quiz->title ?? '' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input name="min_pass_score" type="number" class="form-control form-control-user" id="min_pass_score"
                            placeholder="Passing Score(%)" value="{{ $quiz->min_pass_score ?? '' }}">
                        @error('min_pass_score')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror    
                    </div>
                </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="show_question" class="form-control" id="show_question">
                                @foreach($show_question as $question)
                                    <option value="{{ $question }}"
                                    {{ isset($quiz->show_question) && $quiz->show_question == $question ? 'selected' : '' }}
                                    >{{ $question }} </option>
                                @endforeach
                            </select>
                          
                            @error('show_question')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="term_id" id="term_id" class="form-control" required>
                                <option value="">Assign Lesson</option>
                                @foreach($terms as $term)
                                <option value="{{ $term->id }}">{{ $term->title }}</option>
                                @endforeach
                            </select>
    
                            @error('term_id')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        
                    </div>


                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control mt-3" id="description"
                            placeholder="Description">{{ $quiz->description ?? '' }}</textarea>
                            
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
   
               
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block"
                            value="{{ __('Save') }}">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection