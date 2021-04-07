{{-- Main Sidebar Content --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    {{-- Brand Logo --}}
    <a href="#" class="brand-link">
        <img src="{{asset('assets/Admin/AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-nowrap">{{__('sidebar.title')}}</span>
    </a>

    {{-- Sidebar Section --}}
    <div class="sidebar">

        {{-- Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('sidebar.dashboard')}}
                        </p>
                    </a>
                </li>

                {{-- Module --}}
                <li class="nav-header">{{__('sidebar.module')}}</li>

                {{-- Privacy Policy --}}
                <li class="nav-header">{{__('sidebar.privacy_policy')}}</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-balance-scale nav-icon"></i>
                        <p>
                            {{__('sidebar.legal')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../legal/privacy-policy.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('sidebar.privacy_policy')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../legal/terms-conditions.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('sidebar.terms_conditions')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../legal/disclaimer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('sidebar.disclaimer')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Administration System --}}
                <li class="nav-header">{{__('sidebar.administration_system')}}</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>
                            {{__('sidebar.settings_user')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../settings/index.html" class="nav-link">
                                <i class="fas fa-cogs nav-icon"></i>
                                <p>{{__('sidebar.setting')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            </a>
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-shield nav-icon"></i>
                                <p>
                                    {{__('sidebar.user_role')}}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('user.index')}}" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>{{__('sidebar.user')}}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('role.index')}}" class="nav-link">
                                        <i class="fas fa-shield-alt nav-icon"></i>
                                        <p>{{__('sidebar.role')}}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                </li>

            </ul>
        </nav>
    </div>

</aside>
