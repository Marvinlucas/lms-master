<div class="container-xl px-4 mt-4">
    <div id="passwordContent">
        <!-- Change password card content -->
        <div class="card mb-4" style="border-radius:30px;">
            <div class="card-header-custom">Change Password</div>
            <div class="card-body">

                @if ($errors->has('current_password'))
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle" style="color: red; font-size: 14px;"></i>
                        <span style="color: red; font-size: 14px;">{{ $errors->first('current_password') }}</span>
                    </div>
                @endif
                @if ($errors->has('new_password'))
                    <div class="error-message" style="margin-bottom: -20px;">
                        <i class="fas fa-exclamation-circle" style="color: red; font-size: 14px;"></i>
                        <span style="color: red; font-size: 14px;">{{ $errors->first('new_password') }}</span>
                    </div>
                @endif

                @if ($errors->has('new_password_confirmation'))
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle" style="color: red; font-size: 14px;"></i>
                        <span style="color: red; font-size: 14px;">{{ $errors->first('new_password_confirmation') }}</span>
                    </div>
                @endif

                @if ($errors->has('changePassword'))
                    <div class="error-message" style="margin-bottom: -20px;">
                        <i class="fas fa-exclamation-circle" style="color: red; font-size: 14px;"></i>
                        <span style="color: red; font-size: 14px;">{{ $errors->first('changePassword') }}</span>
                    </div>
                @endif

                <form wire:submit.prevent="changePassword">
                    @if ($successMessage)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $successMessage }}
                            <button type="button" class="close" wire:click="clearSuccessMessage" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <!-- Form Group (current password) -->
                    <div class="mb-2">
                        <label class="small mb-1" for="new_password">{{ __('Current Password') }}</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="current_password" name="current_password"
                            wire:model="current_password" placeholder="Enter current password" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i toggle="#current_password" class="fa fa-fw fa-eye field-icon toggle-password "></i>
                                </span>
                            </div>
                    </div>
                    </div>


                    <!-- Form Group (new password) -->
                    <div class="mb-2">
                        <label class="small mb-1" for="new_password">{{ __('New Password') }}</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="new_password" name="new_password"
                            wire:model="new_password" placeholder="Enter new password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i toggle="#new_password" class="fa fa-fw fa-eye field-icon toggle-password "></i>
                                </span>
                            </div>
                    </div>
                    </div>

                    <!-- Form Group (confirm password) -->
                    <div class="mb-2">
                        <label class="small mb-1"
                            for="new_password_confirmation">{{ __('Confirm New Password') }}</label>
                            <div class="input-group">
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation" wire:model="new_password_confirmation"
                            placeholder="Confirm new password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i toggle="#new_password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password "></i>
                                </span>
                            </div>
                    </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">{{ __('Change Password') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
