@extends('site.app')

@section('title')
    {{$pageTitle}}
@endsection
@section('content')
    @include('site.partials.profile.profile_header')
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Experience Farm for {{$ef->experience_farm_id}}</h6>
        </div>
        <div class="ui-block-content">
            <form class="needs-validation" action="{{route('site.experience_farms.update',$ef->experience_farm_id)}}" method="POST" novalidate>
                @csrf
                <div class="crumina-module crumina-heading with-title-decoration">
                    <h5 class="heading-title">Form Experience Farm for {{$ef->experience_farm_id}}</h5>
                </div>
    
                <div class="row">
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating is-select">
                            <label class="control-label">Select Category_id</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $item)
                                    @if ($item->category_id == $ef->category_id)
                                        <option value="{{$item->category_id}}" selected>{{$ef->categories['category_name']}}</option>
                                    @else
                                        <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating is-select">
                            <label class="control-label">Select Season</label>
                            <select class="form-control" name="season_id">
                                @foreach ($seasons as $item)
                                    @if ($ef->season_id == $item->season_id)
                                        <option value="{{$item->season_id}}" selected>{{$ef->season['season_name']}}
                                        </option>
                                    @else
                                        <option value="{{$item->season_id}}">{{$item->season_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Experience Name</label>
                            <input class="form-control" type="text" name="experience_farm_name" placeholder=""
                                value="{{$ef->experience_farm_name}}" required>
                            <span class="invalid-feedback">
                                <span class="error-box">
                                    Experience Name is required
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Time farm</label>
                        <input class="form-control" type="text" name="experience_farm_time_farm" placeholder="" value="{{$ef->experience_farm_time_farm}}" required>
                            <span class="invalid-feedback">
                                <span class="error-box">
                                    Last Name is required
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Water</label>
                            <input class="form-control" type="text" name="experience_farm_water" placeholder="" value="{{$ef->experience_farm_water}}" required>
                            <span class="invalid-feedback">
                                <span class="error-box">
                                    Email is required
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Soil properties</label>
                            <input class="form-control" type="text" name="experience_farm_soil_properties" placeholder="" value="{{$ef->experience_farm_soil_properties}}" required>
                            <span class="invalid-feedback">
                                <span class="error-box">
                                    Email is required
                                </span>
                            </span>
                        </div>
                    </div>
    
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Start to do</label>
                            <input class="form-control" placeholder="" name="experience_farm_start_to_do" value="{{$ef->experience_farm_start_to_do}}" type="text" required>
                            <span class="invalid-feedback">
                                <span class="error-box">
                                    Zip Code is required
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">End to do</label>
                            <input class="form-control" placeholder="" name="experience_farm_end_to_do" value="{{$ef->experience_farm_end_to_do}}" type="text"
                                required>
                            <span class="invalid-feedback">
                                <span class="error-box">
                                    Zip Code is required
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Notes</label>
                            <input class="form-control" placeholder="" name="experience_farm_notes" value="{{$ef->experience_farm_notes}}" type="text"
                                required>
                            <span class="invalid-feedback">
                                <span class="error-box">
                                    Zip Code is required
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                            @if ($ef->experience_farm_published == "1")
                                <input type="checkbox" class="custom-control-input" name="experience_farm_published" id="published" value="1" checked>
                                <label class="custom-control-label" for="published">Published</label>
                            @else
                                <input type="checkbox" class="custom-control-input" name="experience_farm_published" id="published" value="0">
                                <label class="custom-control-label" for="published">Published</label>
                            @endif
                            
                        </div>
                    </div>
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn btn-md btn-primary" type="submit">Submit form</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection