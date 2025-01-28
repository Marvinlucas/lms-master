<div class="sidebar-container d-flex align-items-center">
    <div class="sidebar-scroll" id="sidebarScroll">
        <ul class="navbar-nav sidebar sidebar-light accordion custom-position" id="accordionSidebar">

            <li class="nav-item rounded-span unique-nav-item">
                <a class="nav-link nav-link-custom" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            @if (
                !auth()->user()->hasRole('Super-Admin') && !auth()->user()->hasRole('mentor') && !auth()->user()->hasRole('supervisor')) 
                <li class="nav-item rounded-span unique-nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('myCourse') }}">
                        <i class="fas fa-fw fa-book-reader"></i>
                        <span>{{ __('My Course') }}</span>
                    </a>
                </li>
            @endif

            @can('menu.education')

                @can('course.index')
                    <li class="nav-item rounded-span unique-nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('adminMenuCourse') }}">
                            <i class="fas fa-fw fa-chalkboard-teacher"></i>
                            <span>{{ __('Education Center') }}</span>
                        </a>
                    </li>
                @endcan
                @can('mentor.list')
                    <li class="nav-item rounded-span unique-nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('adminEnrollment') }}">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <span>{{ __('Enrollment') }}</span>
                        </a>
                    </li>
                @endcan
                @can('mentor.list')
                    <li class="nav-item rounded-span unique-nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('myLearners') }}">
                            <i class="fas fa-fw fa-clipboard"></i>
                            <span>{{ __('Learners') }}</span>
                        </a>
                    </li>
                @endcan

            @endcan

            @can('menu.education')
                @role('Super-Admin')
                    <li class="nav-item rounded-span unique-nav-item" id="aclNavItem">
                        <a class="nav-link collapsed nav-link-custom" href="#" data-toggle="collapse"
                            data-target="#ACLCollapse" aria-expanded="true" aria-controls="ACLCollapse"
                            onclick="toggleCollapse()">
                            <i class="fas fa-fw fa-users-cog" id="aclIcon"></i>
                            <span id="aclSpan">ACL</span>
                        </a>
                        <div id="ACLCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="py-2 collapse-inner rounded">
                                <a class="collapse-item" href="{{ route('user.index') }}">{{ __('User') }}</a>
                                <a class="collapse-item" href="{{ route('role.index') }}">{{ __('Role') }}</a>
                                <a class="collapse-item" href="{{ route('permission.index') }}">{{ __('Permission') }}</a>
                            </div>
                        </div>
                    </li>
                @endrole
            @endcan

            @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['certificate.index']))
                <li class="nav-item rounded-span unique-nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('certificate') }}">
                        <i class="fa-solid fa-certificate"></i>
                        <span>{{ __('Certificate') }}</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
<!-- End of Sidebar -->
