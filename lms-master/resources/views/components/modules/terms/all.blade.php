<div>
    @foreach($terms as $term)
    <div class="row">
        <div class="col-12 mb-2">
            <div class="card border-left-primary bg-light shadow">
                <div class="card-body p-4 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            <div class="row">
                                @if(!$terms->is_mentor)
                                <div class="col-2">
                                    <img src="{{ asset('storage/' . $term->Term->file) }}" class="img-fluid" alt="">
                                </div>
                                @endif
                                <div class="col ml-3 align-middle">
                                    <h6 class="text-secondary fs-5">
                                        {{ $term->Term->Department->title }} | {{ $term->Term->Course->title }}
                                    </h6>
                                    <div class="text-lg pt-2 font-weight-bold mb-1 text-primary">
                                        <a class="text-secondary" href="{{ route($terms->is_mentor ? 'learnerParticipantWorkout' : 'learningCourse', $term->id) }}">
                                            {{ $term->Term->title }}
                                        </a>
                                    </div>
                                    {{ $slot }}
                                    <x-atoms.progress :color="'progress-bar-striped bg-success'" :fill="$term->Term->task_done ?? 0" :count="$term->Term->total_task ?? 0">
                                    </x-atoms.progress>
                                </div>
                                
                                @if(!$terms->is_mentor)
                                <div class="col-4">
                                    <h6 class="font-weight-bold text-dark">{{ __('Download Your Course Certificate') }}</h6>
                                    @if ($term->Term->task_done == $term->Term->total_task)
                                        <p class="text-dark">
                                            <i class="fa fa-check-circle text-success"></i>
                                            <a href="{{ route('generate.certificate', ['id' => $term->id]) }}" target="_blank">Download Certificate</a>
                                        </p>
                                        <small class="text-success">Complete</small>
                                    @else
                                        <p class="text-dark">
                                            <i class="fa fa-ban text-muted"></i>
                                            <span class="text-muted">Download Certificate</span>
                                        </p>
                                        <small class="text-danger">Incomplete</small>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
