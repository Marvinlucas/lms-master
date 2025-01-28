<div class="card shadow mb-4 border-bottom-success">
    <!-- Card Header - Dropdown -->
    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-uppercase ">{{ __('Certificate Details') }}</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">

        <!-- Position Fields -->
        <div class="form-group row">
            <div class="col-md-6">
                <label for="siteName">{{ __('Position 1') }}</label>
                <input wire:model="position_1" wire:change="updatePositions()" type="text" class="form-control">
            </div>
            @error('position_1')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror

            <div class="col-md-6">
                <label for="configValue2">{{ __('Position 2') }}</label>
                <input wire:model="position_2" wire:change="updatePositions()" type="text" class="form-control">
            </div>
            @error('position_2')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="siteName">{{ __('Name 1') }}</label>
                <input wire:model="name_1" wire:change="updateName()" type="text" class="form-control">
            </div>
            @error('name_1')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror

            <div class="col-md-6">
                <label for="configValue2">{{ __('Name 2') }}</label>
                <input wire:model="name_2" wire:change="updateName()" type="text" class="form-control">
            </div>
            @error('name_2')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group row">
            <!-- Signature 1-->
            <div class="col-md-6">
                <label for="siteName">{{ __('Signature 1') }}</label>
                <div class="card text-center align-items-center">
                    <div class="card-body text-center">
                        <div class="form-group row">
                            <div class="col">
                                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false; setTimeout(()=> { location.reload(); }, 1000);" 
                                x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" wire:model="signature_1" style="display: none;"
                                        id="signature_1" accept="image/*">
                                    <label for="signature_1">
                                        <i class="fas fa-cloud-arrow-up fa-beat fa-xl" style="color: #fb6455;"></i>
                                    </label>

                                    <!-- Progress Bar -->
                                    <div x-show="isUploading" style="width:100px;">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                x-bind:style="`width: ${progress}%`" aria-valuenow="10"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($signature_1)
                            <div class="form-group row">
                                <div class="col-4">
                                    @if ($signature_1)
                                        <img src="{{ $signature_1->temporaryUrl() }}" alt="Preview"
                                            style="max-width: 100px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($signature_1 && !$isUploading1)
                        <button wire:click="updatedSignature1" class="btn btn-primary mt-2"
                            style="max-width: 50%; margin-bottom:20px;">Upload</button>
                    @endif
                </div>
            </div>

            <!-- End Signature 1-->

            <!-- Signature 2-->
            <div class="col-md-6">
                <label for="siteName">{{ __('Signature 2') }}</label>
                <div class="card text-center align-items-center">
                    <div class="card-body text-center">
                        <div class="form-group row">
                            <div class="col">
                                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false; setTimeout(()=> { location.reload(); }, 1000);" 
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" wire:model="signature_2" style="display: none;"
                                        id="signature_2" accept="image/*">
                                    <label for="signature_2">
                                        <i class="fas fa-cloud-arrow-up fa-beat fa-xl" style="color: #fb6455;"></i>
                                    </label>

                                    <!-- Progress Bar -->
                                    <div x-show="isUploading" style="width:100px;">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                x-bind:style="`width: ${progress}%`" aria-valuenow="10"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($signature_2)
                            <div class="form-group row">
                                <div class="col-4">
                                    @if ($signature_2)
                                        <img src="{{ $signature_2->temporaryUrl() }}" alt="Preview"
                                            style="max-width: 100px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($signature_2 && !$isUploading2)
                        <!-- Check if not uploading -->
                        <button wire:click="updatedSignature2" class="btn btn-primary mt-2"
                            style="max-width: 50%; margin-bottom:20px;">Upload</button>
                    @endif
                </div>
            </div>
            <!-- End Signature 2-->
        </div>
        <div class="form-group row">
            <!-- Background-->
            <div class="col-md-6">
                <label for="siteName">{{ __('Background') }}</label>
                <div class="card text-center align-items-center">
                    <div class="card-body text-center">
                        <div class="form-group row">
                            <div class="col">
                                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false; setTimeout(()=> { location.reload(); }, 1000);" 
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" wire:model="background" style="display: none;"
                                        id="background" accept="image/*">
                                    <label for="background">
                                        <i class="fas fa-cloud-arrow-up fa-beat fa-xl" style="color: #fb6455;"></i>
                                    </label>

                                    <!-- Progress Bar -->
                                    <div x-show="isUploading" style="width:100px;">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                x-bind:style="`width: ${progress}%`" aria-valuenow="10"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($background)
                            <div class="form-group row">
                                <div class="col-4">
                                    @if ($background)
                                        <img src="{{ $background->temporaryUrl() }}" alt="Preview"
                                            style="max-width: 100px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($background && !$isUploading3)
                        <!-- Check if not uploading -->
                        <button wire:click="updatedBackground" class="btn btn-primary mt-2"
                            style="max-width: 50%; margin-bottom:20px;">Upload</button>
                    @endif
                </div>
            </div>
            <!-- End Background -->

            <!-- Logo -->
            <div class="col-md-6">
                <label for="siteName">{{ __('Logo') }}</label>
                <div class="card text-center align-items-center">
                    <div class="card-body text-center">
                        <div class="form-group row">
                            <div class="col">
                                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false; setTimeout(()=> { location.reload(); }, 1000);" 
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <input type="file" wire:model="logo" style="display: none;" id="logo"
                                        accept="image/*">
                                    <label for="logo">
                                        <i class="fas fa-cloud-arrow-up fa-beat fa-xl" style="color: #fb6455;"></i>
                                    </label>

                                    <!-- Progress Bar -->
                                    <div x-show="isUploading" style="width:100px;">
                                        <div class="progress mt-2">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                x-bind:style="`width: ${progress}%`" aria-valuenow="10"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($logo)
                            <div class="form-group row">
                                <div class="col-4">
                                    @if ($logo)
                                        <img src="{{ $logo->temporaryUrl() }}" alt="Preview"
                                            style="max-width: 100px; max-height: 100px;">
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($logo && !$isUploading4)
                        <!-- Check if not uploading -->
                        <button wire:click="updatedLogo" class="btn btn-primary mt-2"
                            style="max-width: 50%; margin-bottom:20px;">Upload</button>
                    @endif
                </div>
            </div>
            <!-- End Logo -->
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <script>
                setTimeout(function() {
                    location.reload();
                }, 500);
            </script>
        @endif

        @if ($errors->has('signature_1'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first('signature_1') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>