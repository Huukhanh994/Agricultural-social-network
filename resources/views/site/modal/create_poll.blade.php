<div class="modal fade" id="create-poll-form-popup" tabindex="-1" role="dialog" aria-labelledby="create-poll-form-popup"
    aria-hidden="true">
    <div class="modal-dialog window-popup edit-my-poll-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use>
                </svg>
            </a>
            <div class="modal-body">
                <div class="control-block-button post-control-button">
                    <a href="#" class="btn btn-control has-i bg-facebook">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="btn btn-control has-i bg-twitter">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="edit-my-poll-head bg-primary">
                    <div class="head-content">
                        <h2 class="title">Create Your Poll Survey</h2>
                    </div>

                    <img class="poll-img" src="{{asset('site/img/poll.png')}}" alt="screen">
                </div>

                <div class="edit-my-poll-content">
                    <form class="resume-form" method="POST" action="{{route('site.polls.store')}}">
                        @csrf
                        <h3>Create Poll</h3>
                        <div class="row">
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Question:</label>
                                    <input class="form-control" placeholder="Ex: Do you want to the rice price?" id="question" name="question" value="" type="text">
                                </div>
                            </div>
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Options</label>
                                    <ul id="options">
                                        <li>
                                            <input id="option_1" type="text" name="options[0]" class="form-control add-input"
                                                value="{{ old('options.0') }}" placeholder="Ex: Cristiano Ronaldo" />
                                        </li>
                                        <li>
                                            <input id="option_2" type="text" name="options[1]" class="form-control add-input"
                                                value="{{ old('options.1') }}" placeholder="Ex: Lionel Messi" />
                                        </li>
                                    </ul>
                                
                                    <ul>
                                        <li class="button-add">
                                            <div class="form-group">
                                                <a class="btn btn-primary" id="add">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="starts_at">Starts at:</label>
                                        <input type="datetime-local" id="starts_at" name="starts_at" class="form-control"
                                            value="{{ old('starts_at') }}" />
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="starts_at">Ends at:</label>
                                        <input type="datetime-local" id="ends_at" name="ends_at" class="form-control"
                                            value="{{ old('ends_at') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="canVisitorsVote" value="1" {{ old('canVisitorsVote')  == 1 ? 'checked' : ''  }} checked>
                                            Allow to guests
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-lg full-width">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('custom_js')
    <script type="text/javascript">
        // re render requested options
        @if(old('options'))
        @foreach(array_slice(old('options'), 2) as $option)
        var e = document.createElement('li');
        e.innerHTML = "<input type='text' name='options[]' value='{{ $option }}' class='form-control add-input' placeholder='Insert your option' /> <a class='btn btn-danger' href='#' onclick='remove(this)'><i class='fa fa-minus-circle' aria-hidden='true'></i></a>";
        document.getElementById("options").appendChild(e);
        @endforeach
        @endif
    
        function remove(current) {
            current.parentNode.remove()
        }
        document.getElementById("add").onclick = function() {
            var e = document.createElement('li');
            e.innerHTML = "<input type='text' name='options[]' class='form-control add-input' placeholder='Insert your option' /> <a class='btn btn-danger' href='#' onclick='remove(this)'><i class='fa fa-minus-circle' aria-hidden='true'></i></a>";
            document.getElementById("options").appendChild(e);
        }
    </script>
@endsection
<!-- ... end Edit My Poll Popup -->