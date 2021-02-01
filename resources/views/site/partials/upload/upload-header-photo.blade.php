<!-- Window-popup Update Header Photo -->
<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo"
    aria-hidden="true">
    <div class="modal-dialog window-popup update-header-photo" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use>
                </svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Update Header Photo</h6>
            </div>

            <div class="modal-body">
                @if (Auth::check())
                    <form action="{{route('site.profile.upload.image', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="upload" type="file" name="image" onchange="readURL(this);" />
                        <a href="#" id="upload_link" class="upload-photo-item">
                            <svg class="olymp-computer-icon">
                                <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use>
                            </svg>
                    
                            <h6>Upload Photo</h6>
                            <span>Browse your computer.</span>
                            <span><img id="blah" src="#" alt="your image" /></span>
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">upload</button>
                    </form>
                @endif
                <form action="" method="post">
                    @csrf
                    <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">
                    
                        <svg class="olymp-photos-icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-photos-icon')}}"></use>
                        </svg>
                    
                        <h6>Choose from My Photos</h6>
                        <span>Choose from your uploaded photos</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ... end Window-popup Update Header Photo -->
@section('custom_js')
<script>
    $(function(){
        $("#upload_link").on('click', function(e){
            e.preventDefault();
            $("#upload:hidden").trigger('click');
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection