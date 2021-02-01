@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('/assets/node_modules/summernote/dist/summernote-bs4.css')}}">
{{-- <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet"> --}}
@endpush
@if (Auth::check())
    @if (Auth::user()->is_block == 'blocked')
        <div class="ui-block">    
            <h5 style="color: red;">You has been blocked post article. Please send request to unblock for admin.
            <br>
            <a href="mailto:admin@gmail.com" style="color: blue;">Send request for Admin</a>
            </h5>
        </div>
    @else
        <div class="ui-block">
            <!-- News Feed Form  -->
            <div class="news-feed-form">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab"
                            aria-expanded="true">
        
                            <svg class="olymp-status-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-status-icon')}}"></use>
                            </svg>
        
                            <span>Status</span>
                        </a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
                            <svg class="olymp-blog-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-blog-icon')}}"></use>
                            </svg>
        
                            <span>Blog Post</span>
                        </a>
                    </li>
                </ul>
        
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                        <form method="POST" action="{{route('site.posts.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="author-thumb">
                                @if (isset(Auth::user()->avatar))
                                <img src="{{asset('storage/users-avatar/'.Auth::user()->avatar)}}" alt="author"
                                    style="width: 36px;height:36px">
                                @else
                                <img src="{{asset('site/img/avatar55-sm.jpg')}}" alt="author">
                                @endif
                            </div>
                            <div class="form-group with-icon label-floating is-empty">
                                <label class="control-label">Status</label>
                                <textarea class="form-control" name="post_content" placeholder=""></textarea>
                            </div>
                            <div class="add-options-message">
                                <input id="upload" type="file" name="image" />
                                <a href="#" id="upload_link" class="options-message" data-placement="top"
                                    data-original-title="ADD PHOTOS">
                                    <svg class="olymp-camera-icon" data-target="#update-header-photo">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                    </svg>
                                </a>
        
                                <a href="#" class="options-message" data-toggle="modal" data-original-title="ADD LOCATION"
                                    data-toggle="modal" data-target="#add-location">
                                    <svg class="olymp-small-pin-icon">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-small-pin-icon')}}">
                                        </use>
                                    </svg>
                                </a>
                                <input type="hidden" id="lat" name="lat" value="">
                                <input type="hidden" id="lng" name="lng" value="">
                                <input type="hidden" name="requestIp" value="{{request()->ip()}}">
                                <button type="submit" class="btn btn-primary btn-md-2">Post Status</button>
                                @can('poll-create')
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#create-poll-form-popup">Create
                                    poll</button>
                                @endcan
                                {{-- <button type="button" class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button> --}}
                            </div>
                        </form>
                    </div>
        
                    <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
                        <form method="POST" action="{{route('site.posts.store')}}" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf
                            <input type="file" name="image[]" id="image" multiple>
                            <div class="ui-block">
                                <div class="ui-block-content">
                                    <div class="row">
                                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">What's your sell?</label>
                                                <input class="form-control" type="text" placeholder="" name="post_title"
                                                    value="" required>
                                                <span class="invalid-feedback">
                                                    <span class="error-box">
                                                        What's your sell is required
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Description for the product</label>
                                                <textarea class="form-control summernote" type="text" placeholder="" name="post_content"
                                                    value="Spiegel" required></textarea>
                                                <span class="invalid-feedback">
                                                    <span class="error-box">
                                                        Description is required
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="range-slider range-slider--red">
                                                <label class="control-label">Post price</label>
                                                <input type="number" name="post_price" value="" />
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group label-floating is-select">
                                                <label class="control-label">Select a category</label>
                                                <select class="form-control" name="category_id">
                                                    @foreach ($categories as $item)
                                                    <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group label-floating is-select">
                                                <label class="control-label">Add to the private group</label>
                                                <select class="form-control" name="group_id">
                                                    <option value="">Choose add private group</option>
                                                    @foreach ($groups as $group)
                                                    <option value="{{$group->group_id}}">{{$group->group_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"
                                    data-original-title="ADD PHOTOS">
                                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                    </svg>
                                </a>
                                <a href="#" class="options-message" data-toggle="modal" data-target="#add-location"
                                    data-original-title="ADD LOCATION">
                                    <svg class="olymp-small-pin-icon">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-small-pin-icon')}}">
                                        </use>
                                    </svg>
                                </a>
                                <input type="hidden" id="lat" name="lat" value="">
                                <input type="hidden" id="lng" name="lng" value="">
                                <input type="hidden" name="requestIp" value="{{request()->ip()}}">
                                <input type="hidden" name="requestIp" value="{{request()->ip()}}">
                                <button type="submit" class="btn btn-primary btn-md-2">Post Status</button>
                                <button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ... end News Feed Form  -->
        </div>
    @endif
@endif
@push('scripts')
<!--Custom JavaScript -->
{{-- <script src="{{asset('/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script> --}}
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('/assets/node_modules/popper/popper.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
{{-- <script src="{{asset('dist/js/perfect-scrollbar.jquery.min.js')}}"></script> --}}
<!--Wave Effects -->
<script src="{{asset('dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('/assets/node_modules/summernote/dist/summernote-bs4.min.js')}}"></script>
<script>
    $(function() {
            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });
    
            $('.inline-editor').summernote({
                airMode: true
            });
    
        });
    
        window.edit = function() {
                $(".click2edit").summernote()
            },
            window.save = function() {
                $(".click2edit").summernote('destroy');
            }
</script>
@endpush