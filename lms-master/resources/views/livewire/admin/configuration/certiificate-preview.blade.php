<style>
    .container-cert {
        background-image: url('{{ $background }}');
    }
</style>
<div class="card shadow mb-4 border-bottom-success">
    <!-- Card Header - Dropdown -->
    <div class="card-header-custom py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Certificate Preview') }}</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="">
            <div class="container-cert">

                <div class="content-cert">
                    <div class="image-cert">
                        <img src="{{ $logo }}" alt="Sample Image" style="height: 50px;">
                    </div>

                    <div class="text-head">
                        <p><span class="black-text">CERTIFICATE</span><br><span class="red-text">OF COMPLETION</span></p>
                    </div>

                    <div class="text-body">
                        <div class="text-body-title">
                            <p>THIS CERTIFICATE IS PRESENTED TO:</p>
                        </div>

                        <div class="text-body-name">
                            <p><span class="red-text">{{ __('Juan Dela Cruz') }}</span></p>
                        </div>

                        <div class="text-body-course">
                            <p>For completing the <span class="bold-text">{{ __('Web Development') }}</span><br>course in <span class="bold-text">{{ __('HTML') }}</span></p>
                        </div>

                        <!-- Add the following code inside the "text-body-sign" div -->
                        <div class="text-body-sign">

                            <div class="person">
                                <div class="signature1">
                                    <img src="{{ $signature_1 }}" alt="Sample Image"
                                        style="width: 80px; height: auto;">
                                </div>
                                <p wire:refresh="refresh-me" style="margin-bottom: -12px;"><span
                                        class="signature red-text">{{ $position_1 }}</span> </p>
                                <p>{{ $name_1 }}</p>
                            </div>

                            <div class="person">
                                <div class="signature2">
                                    <img src="{{ $signature_2 }}" alt="Sample Image"
                                        style="width: 80px; height: auto;">
                                </div>
                                <p><span class="signature red-text">{{ $position_2 }}</span></p>
                                <p style="margin-top: -12px;">{{ $name_2 }}</p>
                            </div>

                        </div>

                        <div class="text-body-date">
                            <p style="margin-bottom: 25px;"><span class="bold-text">On
                                    {{ __('December 25, 2023') }}</span></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
