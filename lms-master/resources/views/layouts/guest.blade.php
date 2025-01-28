<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
@include('layouts.front.header')
@include('layouts.header')

<body>
    <div class="container-xxl bg-white p-0">
   
        <!-- Spinner Start -->
       
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            @include('layouts.front.top')
            @yield('content')
            
        </div>
        <!-- Navbar & Hero End -->

        
    
        @include('layouts.front.footer_login')
    </div>
</body>
</html>
