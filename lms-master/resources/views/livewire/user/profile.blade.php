<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0" style="border-radius:30px;">
                <div class="card-header-custom text-white">Profile Picture</div>
                <div class="card-body text-center d-flex justify-content-center
                align-items-center">
                    <form wire:submit.prevent="updateProfilePicture" id="profile-picture-upload">
                        <!-- Add this code in your Blade view -->
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" wire:click="clearSuccessMessage"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </div>
                        @endif
    
                        @if (session()->has('danger'))
                            <div class="alert alert-danger">
                                {{ session('danger') }}
                            </div>
                        @endif
                        <!-- Profile picture container -->
                        <div class="profile-picture-container">
                            <!-- Profile picture image or stock image if no profile picture -->
                            <img class="img-account-profile rounded-circle" id="profile-picture"
                                src="{{ $profile_picture ? $profile_picture->temporaryUrl() : $profilePictureUrl }}"
                                alt="Profile Picture">
                                <div id="loader" class="loader"></div>
                            <!-- Camera icon -->
                            <label for="profile_picture" class="camera-icon-label">
                                <i class="fas fa-camera"></i>
                            </label>
                        </div>
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mt-2">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button -->
                        <input type="file" id="profile_picture" wire:model="profile_picture" style="display: none;">

                        @error('profile_picture')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <button type="submit" class="btn btn-primary mt-2">{{ __('Save Changes') }}</button>
                    </form>
                    @livewireScripts
                    <script>
                        window.livewire.on('profilePictureUpdated', () => {
                            location.reload();
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <!-- Account details card-->
            <div id="profileContent">
                <div class="card mb-4" style="border-radius:30px;">
                    <div class="card-header-custom text-white">{{ __('Account Details') }}</div>
                    <div class="card-body">
                        <form wire:submit.prevent="updateProfile">
                            @if ($successMessage)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ $successMessage }}
                                    <button type="button" class="close" wire:click="clearSuccessMessage"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($errors->has('updateProfile'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{ $errors->first('updateProfile') }}
                                </div>
                            @endif

                            
                             <!-- Form Group (username)-->
                             <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                <label class="small mb-1" for="username">Username (your visible name on the site)</label>
                                <input class="form-control" id="username" type="text" name="username" placeholder="Enter your username" wire:model="username" readonly>
                                </div>

                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="name">First Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        wire:model="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                             
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="last_name">Last name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="" placeholder="Enter your last name" wire:model="last_name">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="middle_initial">Middle Initial</label>
                                    <input type="text" class="form-control" id="middle_initial" name="middle_initial" placeholder="Enter your middle initial"
                                        wire:model="middle_initial">
                                    @error('middle_initial')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                        
                            </div>
                            <!-- Form Row -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (email address) -->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $user->email }}" readonly>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Form Group (location) -->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="address">Address</label>
                                    <input class="form-control" id="address" wire:model="address" type="text"
                                        placeholder="Enter your location">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Form Row -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number) -->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="phone_number">Phone number</label>
                                    <input class="form-control" id="phone_number" type="tel"
                                        placeholder="Enter your phone number" value="" wire:model="phone_number"
                                        required>
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Form Group (birthday) -->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="birthday">Birthday</label>
                                    <input class="form-control" id="birthday" type="date" name="birthday"
                                        placeholder="Enter your birthday" wire:model="birthday" required>
                                    @error('birthday')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Save changes button -->

                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>