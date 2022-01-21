<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin-dashboard')}}" class="brand-link">
        <span class="brand-text font-weight-light">Shuttle Partner</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Partners
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('partners.list')}}" class="nav-link">
                                <i class="nav-icon fa fa-bars"></i>
                                <p>List</p>
                            </a>
                        </li>

                    </ul>
                </li>


{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="fas fa-user"></i>--}}
{{--                        <p>Role Permission--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('role-permissions.index')}}" class="nav-link">--}}
{{--                                <i class="nav-icon fa fa-bars"></i>--}}
{{--                                <p>List</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas  fa-cogs"></i>
                        <p>Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-globe-asia"></i>
                                <p>Location
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('locations.create')}}" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Create City</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('locations.index')}}" class="nav-link">
                                        <i class="nav-icon fa fa-bars"></i>
                                        <p>City List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('areas.create')}}" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Create Area</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('areas.index')}}" class="nav-link">
                                        <i class="nav-icon fa fa-bars"></i>
                                        <p>Area List</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-car"></i>
                                <p>Car Type
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('car-types.create')}}" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('car-types.index')}}" class="nav-link">
                                        <i class="nav-icon fa fa-bars"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-font-awesome-flag"></i>
                                <p>Car Brand
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('car-brands.create')}}" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('car-brands.index')}}" class="nav-link">
                                        <i class="nav-icon fa fa-bars"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fas fa-text-width"></i>
                                <p>Trip Type 
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('trip-types.create')}}" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('trip-types.index')}}" class="nav-link">
                                        <i class="nav-icon fa fa-bars"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-comment"></i>
                                <p>Remark Status
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('preset-remarks.create')}}" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('preset-remarks.index')}}" class="nav-link">
                                        <i class="nav-icon fa fa-bars"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-sticky-note"></i>
                                <p>Call Notes
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('call-notes.create')}}" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('call-notes.index')}}" class="nav-link">
                                        <i class="nav-icon fa fa-bars"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
    </div>

    <style>
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #c9f7f5;
            color: #212529;
        }
    </style>

</aside>
