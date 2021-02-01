<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user-img"
                            class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PERSONAL</li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="fas fa-cogs"></i><span class="hide-menu">Settings
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.settings')}}">Setting </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-th"></i><span
                            class="hide-menu">Brands
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.brands.index')}}">Index </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-tags"></i><span
                            class="hide-menu">Attributes
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.attributes.index')}}">Index </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-align-left"></i><span
                            class="hide-menu">Categories
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.categories.index')}}">Category </a></li>
                        <li><a href="{{route('admin.foods.index')}}">Foods </a></li>
                        <li><a href="{{route('admin.insecticides.index')}}">Insecticides </a></li>
                        <li><a href="{{route('admin.cities.index')}}">Cities </a></li>
                        <li><a href="{{route('admin.attributes.index')}}">Attributes </a></li>
                        <li><a href="{{route('admin.districts.index')}}">Districts </a></li>
                        <li><a href="{{route('admin.wards.index')}}">Wards </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-users"></i><span
                            class="hide-menu">Users Manager
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.manager_users.index')}}">Index </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-archive"></i><span
                            class="hide-menu">Products Manager
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.products.index')}}">Index </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-newspaper"></i><span
                            class="hide-menu">Posts Manager
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.posts.index')}}">Index </a></li>
                        <li><a href="{{route('admin.posts.map')}}">Map </a></li>
                        <li><a href="{{route('admin.posts.indexBlockUsers')}}">Block user </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="far fa-calendar-alt"></i><span
                            class="hide-menu">Season Manager
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.seasonals.index')}}">Index </a></li>
                    </ul>
                </li>
                {{-- <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="far fa-money-bill-alt"></i><span class="hide-menu">Price Manager
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.managementPrice.index')}}">Index </a></li>
                    </ul>
                </li> --}}
                {{-- <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="fas fa-briefcase"></i><span class="hide-menu">Cpa Manager
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('admin.manager_crop_plant_animals.index')}}">Index </a></li>
                    </ul>
                </li> --}}
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fas fa-briefcase"></i><span
                            class="hide-menu">Groups Manager
                            <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.groups.index')}}">Index </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                    <span class="hide-menu">Polls Manager
                            <i class="fas fa-file-alt"></i></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.polls.home')}}">Home </a></li>
                        <li><a href="{{route('admin.polls.index')}}">Index </a></li>
                        <li><a href="{{route('admin.polls.create')}}">Create </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <span class="hide-menu">Orders Manager
                            <i class="fas fa-chart-bar"></i></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.orders.index')}}">Index </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>