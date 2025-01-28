@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h4 class="font-weight-bold"><i
                        class="fa-solid fa-bars-progress"></i>{{ __(' Update:  ') }}<span style="color: #fa5d4e;">{{ $session->title ?? '' }}</span></h4></h4>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="card shadow mb-4 border-bottom-success">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Session Details') }}</h6>
                        <div class="dropdown no-arrow">
                            <div class="dropdown no-arrow">
                                <x-BackButton />
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="text-center">

                            <hr />

                            @forelse ($session->related as $activity)
                                <x-box.item :title="$loop->iteration . '- ' . $activity->model->title" :color="$activity->model->color">

                                    @if (!$loop->first)
                                        @slot('up')
                                            {{ route('changeOrderSessionable', ['from' => $activity->id, 'move' => 'up']) }}
                                        @endslot
                                    @endif

                                    @if (!$loop->last)
                                        @slot('down')
                                            {{ route('changeOrderSessionable', ['from' => $activity->id, 'move' => 'down']) }}
                                        @endslot
                                    @endif

                                    @slot('delete')
                                        {{ route('deleteActivityAsSession', $activity->id) }}
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
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Activity') }}</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 mb-4">
                                    @livewire('box.file-activity', ['session' => $session->id])
                                </div>
                                <div class="col-xl-6 col-sm-12 mb-4">
                                    @livewire('box.quiz-activity', ['session' => $session->id, 'termId' => $session->term_id])

                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-xl-6 col-sm-12 mb-4">
                                    @livewire('box.document-activity', ['session' => $session->id])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('showModal'))
        <script>
            $(document).ready(function() {
                // Show the first modal
                $('#quiz').modal('show');
            });
        </script>
    @endif
    @if (session('showModal1'))
        <script>
            $(document).ready(function() {
                // Show the first modal
                $('#document').modal('show');
            });
        </script>
    @endif
@endsection
