@extends('layouts.admin')


@section('content')
    <div class="w-100 d-block">
        <div class="card-main-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="container" style="max-width: 100%;">
                <h4 class="font-weight-bold"><i
                        class="fa-solid fa-bars-progress"></i>{{ __(' Update:  ') }}<span style="color: #fa5d4e;">{{ $term->title ?? '' }}</span></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4 border-bottom-success">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Lesson Manager') }}</h6>
                        <div class="dropdown no-arrow">
                            <a id="backButtons" href="{{ route('term.index') }}" class="btn btn-warning btn-icon-split mr-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">{{ __("Back") }}</span>
                            </a>
                            
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                {{--<h6 class="m-0 font-weight text-capitalize">{{ __('Road Map') }}</h6>--}}
                                <hr>

                                <div id="myTabContent" class="tab-content">
                                    <div id="home" role="tabpanel" aria-labelledby="home-tab"
                                        class="tab-pane fade px-4 py-5 show active">
                                        <div class="tab-pane fade show active" id="RoadMap">
                                            @include('contents.admin.term.parts.roadmap')
                                        </div>
                                    </div>
                                </div>
                                <!-- End rounded tabs -->
                                <div class="form-group">

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
