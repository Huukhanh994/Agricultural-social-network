@extends('site.app')

@section('title')
    {{$pageTitle}}
@endsection

@section('content')
    <!-- Main Header Account -->
    @include('admin.partials.flash')    
    @include('site.partials.profile.profile_header')
    
    <!-- Your Account Personal Information -->
    
    <div class="container">
        <div class="row">
            <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Personal Information</h6>
                    </div>
                    <div class="ui-block-content">
                        <!-- Personal Information Form  -->
                        <form method="POST" action="{{ route('site.accounts.update', Auth::user()->id ) }}">
                            @csrf
                            <div class="row">
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label"> Name</label>
                                        @if (Auth::check())
                                            <input class="form-control" placeholder="" name="name" type="text" value="{{ Auth::user()->name }}">
                                        @else
                                            <input class="form-control" placeholder="" name="name" type="text" value="">
                                        @endif
                                    </div>
    
                                    <div class="form-group label-floating">
                                        <label class="control-label">Your Email</label>
                                        @if (Auth::check())
                                            <input class="form-control" placeholder="" name="email" type="email" value="{{Auth::user()->email}}">
                                        @else
                                            <input class="form-control" placeholder="" name="email" type="email" value="">
                                        @endif
                                    </div>
    
                                    <div class="form-group date-time-picker label-floating">
                                        <label class="control-label">Your Birthday</label>
                                        @if (Auth::check())
                                            <input name="datetimepicker" value="{{Auth::user()->birth}}" />
                                        @else
                                            <input name="datetimepicker" value="01/02/2000" />
                                        @endif
                                        <span class="input-group-addon">
                                            <svg class="olymp-month-calendar-icon icon">
                                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-month-calendar-icon')}}">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Last Name</label>
                                        @if (Auth::check())
                                            <input class="form-control" placeholder="" name="last_name" type="text" value="{{Auth::user()->last_name}}">
                                        @else
                                        <input class="form-control" placeholder="" name="last_name" type="text" value="">
                                        @endif
                                    </div>
        
                                    <div class="form-group label-floating">
                                        <label class="control-label">Your Phone Number</label>
                                        @if (Auth::check())
                                            <input class="form-control" placeholder="" name="tel" type="text" value="{{Auth::user()->tel}}">
                                        @else
                                            <input class="form-control" placeholder="" name="tel" type="text">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="Male" @if(Auth::user()->gender == "Male") selected @endif>Male</option>
                                            <option value="Female" @if(Auth::user()->gender == "Female") selected @endif>Female</option>
                                            <option value="Other" @if(Auth::user()->gender == "Other") selected @endif>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="control-label">Your Ward</label>
                                        <select class="form-control" name="ward">
                                            @foreach ($wards as $item)
                                                @if ($item->ward_code == Auth::user()->ward_id)
                                                    <option value="{{$item['ward_code']}}" selected>{{Auth::user()->wards->ward_name}} - {{Auth::user()->wards->district->district_name}} - {{Auth::user()->wards->district->city->city_name}}</option>
                                                @else
                                                    <option value="{{$item['ward_code']}}">{{$item['ward_name']}} - {{$item->district->district_name}} - {{$item->district->city->city_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <button type="submit" class="btn btn-primary btn-lg full-width">Save all Changes</button>
                                </div>
    
                            </div>
                        </form>
    
                        <!-- ... end Personal Information Form  -->
                    </div>
                </div>
            </div>
    
            <div
                class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
                <div class="ui-block">
    
                    <!-- Your Profile  -->
    
                    <div class="your-profile">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Your PROFILE</h6>
                        </div>
    
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Profile Settings
                                            <svg class="olymp-dropdown-arrow-icon">
                                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}">
                                                </use>
                                            </svg>
                                        </a>
                                    </h6>
                                </div>
    
                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <ul class="your-profile-menu">
                                        <li>
                                            <a href="#">Personal Information</a>
                                        </li>
                                        <li>
                                            <a href="#">Account Settings</a>
                                        </li>
                                        <li>
                                            <a href="#">Change Password</a>
                                        </li>
                                        <li>
                                            <a href="#">Hobbies and Interests</a>
                                        </li>
                                        <li>
                                            <a href="#">Education and
                                                Employement</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
    
                        <div class="ui-block-title">
                            <a href="#" class="h6 title">Friend Requests</a>
                            <a href="#" class="items-round-little bg-blue">4</a>
                        </div>
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">FAVOURITE PAGE</h6>
                        </div>
                        <div class="ui-block-title">
                            <a href="#" class="h6 title">Create Fav Page</a>
                        </div>
                        <div class="ui-block-title">
                            <a href="#" class="h6 title">Fav Page Settings</a>
                        </div>
                    </div>
    
                    <!-- ... end Your Profile  -->
    
                </div>
            </div>
        </div>
    </div>
    
    <!-- ... end Your Account Personal Information -->

@endsection