@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h3 class="font-weight-bold">{{ __('Manage Questions') }}</h3>
            </div>
        </div>
        <div class="row">

        <div class="table-responsive d-flex justify-content-center">

            <div class="col-12">
                <div class="card mb-4 border-bottom-success">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Questions List') }}</h6>

                        <div class=" dropdown no-arrow ">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink" style="">
                                <div class="dropdown-header">{{ __('Action') }}</div>
                                @can('question.create')
                                    <x-CreateButton path="{{ route('question.create') }}" />
                                @endcan
                                <a class="dropdown-item" href="{{ route('quiz.index') }}">
                                    <i class="fas fa-arrow-right pr-2"></i>
                                    {{ __('Quiz') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive text-center">


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Type') }}</th>
                                        <th scope="col">{{ __('Question') }}</th>
                                        @if (Auth::user()->hasRole('Super-Admin') ||
                                                Auth::user()->hasRole('Super-Admin') ||
                                                Auth::user()->hasAnyPermission(['question.edit', 'question.delete']))
                                            <th scope="col">{{ __('Action') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($questions as $question)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                {{ $question->title }}
                                            </td>
                                            <td> {{ $question->QuestionType->title ?? 'N/A' }} </td>
                                            <td> {{ $question->question_body ??'N/A' }} </td>



                                            @if (Auth::user()->hasRole('Super-Admin') ||
                                                    Auth::user()->hasRole('Super-Admin') ||
                                                    Auth::user()->hasAnyPermission(['question.edit', 'question.delete']))
                                                <td>
                                                    <div class="dropdown no-arrow">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                            id="dropdownMenuLink" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                            aria-labelledby="dropdownMenuLink" style="">
                                                            <div class="dropdown-header">{{ __('Actions') }}:</div>

                                                            @can('question.edit')
                                                                <x-EditButton itemId="{{ $question->id }}"
                                                                    path="question.edit" />
                                                            @endcan
                                                            @can('question.delete')
                                                                <x-DeleteButton itemId="{{ $question->id }}"
                                                                    path="question.destroy" />
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>

                            <hr />
                            <div class="text-center">
                                {!! $questions->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
