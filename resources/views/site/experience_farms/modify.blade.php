@extends('site.app')
@section('title')
    {{$pageTitle}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <!-- Today Events -->
                <div class="today-events calendar">
                    <div class="today-events-thumb">
                        <div class="date">
                            <div class="day-number">26</div>
                            <div class="day-week">Saturday</div>
                            <div class="month-year">March, 2016</div>
                        </div>
                    </div>
                    <div class="list">
                        <div class="control-block-button">
                            <a href="#" class="btn btn-control bg-breez" data-toggle="modal"
                                data-target="#create-event">
                                <svg class="olymp-plus-icon">
                                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-plus-icon')}}"></use>
                                </svg>
                            </a>
                        </div>

                        <div class="day-event" id="accordion-1" data-month="12" data-day="2">

                            <div class="card">
                                <div class="card-header" id="headingOne-1">

                                    <div class="event-time">
                                        <time datetime="2004-07-24T18:18">9:00am</time>
                                        <div class="more"><svg class="olymp-three-dots-icon">
                                                <use
                                                    xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}">
                                                </use>
                                            </svg>
                                            <ul class="more-dropdown">
                                                <li>
                                                    <a href="#">Mark as Completed</a>
                                                </li>
                                                <li>
                                                    <a href="#">Delete Event</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <h5 class="mb-0 title">
                                        <a href="#" data-toggle="collapse" data-target="#collapseOne-1"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Breakfast at the Agency
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <span class="event-status-icon" data-toggle="modal"
                                                data-target="#public-event">
                                                <svg class="olymp-calendar-icon" data-toggle="tooltip"
                                                    data-placement="top" data-original-title="UNCOMPLETED">
                                                    <use
                                                        xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}">
                                                    </use>
                                                </svg>
                                            </span>
                                        </a>
                                    </h5>
                                </div>

                                <div id="#collapseOne-1" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#headingOne-1">
                                    <div class="card-body">
                                        Hi Guys! I propose to go a litle earlier at the agency to have breakfast
                                        and talk a little more about the new design project we have been working
                                        on. Cheers!
                                    </div>
                                    <div class="place inline-items">
                                        <svg class="olymp-add-a-place-icon">
                                            <use
                                                xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}">
                                            </use>
                                        </svg>
                                        <span>Daydreamz Agency</span>
                                    </div>

                                    <ul class="friends-harmonic inline-items">
                                        <li>
                                            <a href="#">
                                                <img src="{{asset('site/img/friend-harmonic5.jpg')}}" alt="friend">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo-1">

                                    <div class="event-time">
                                        <time datetime="2004-07-24T18:18">12:00pm</time>
                                        <div class="more"><svg class="olymp-three-dots-icon">
                                                <use
                                                    xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}">
                                                </use>
                                            </svg>
                                            <ul class="more-dropdown">
                                                <li>
                                                    <a href="#">Mark as Completed</a>
                                                </li>
                                                <li>
                                                    <a href="#">Delete Event</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <h5 class="mb-0 title">
                                        <a href="#" data-toggle="collapse" data-target="#collapseTwo-1"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Send the new “Olympus” project files to the Agency
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <span class="event-status-icon" data-toggle="modal"
                                                data-target="#public-event">
                                                <svg class="olymp-calendar-icon" data-toggle="tooltip"
                                                    data-placement="top" data-original-title="UNCOMPLETED">
                                                    <use
                                                        xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}">
                                                    </use>
                                                </svg>
                                            </span>
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseTwo-1" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#headingOne-1">
                                    <div class="card-body">
                                        Hi Guys! I propose to go a litle earlier at the agency to have breakfast
                                        and talk a little more about the new design project we have been working
                                        on. Cheers!
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree-1">

                                    <div class="event-time">
                                        <time datetime="2004-07-24T18:18">6:30pm</time>
                                        <div class="more"><svg class="olymp-three-dots-icon">
                                                <use
                                                    xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}">
                                                </use>
                                            </svg>
                                            <ul class="more-dropdown">
                                                <li>
                                                    <a href="#">Mark as Completed</a>
                                                </li>
                                                <li>
                                                    <a href="#">Delete Event</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <h5 class="mb-0 title">
                                        <a href="#" data-toggle="collapse" data-target="#collapseThree-1"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Take Querty to the Veterinarian
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <span class="event-status-icon" data-toggle="modal"
                                                data-target="#public-event">
                                                <svg class="olymp-calendar-icon" data-toggle="tooltip"
                                                    data-placement="top" data-original-title="UNCOMPLETED">
                                                    <use
                                                        xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}">
                                                    </use>
                                                </svg>
                                            </span>
                                        </a>
                                    </h5>
                                </div>

                                <div class="place inline-items">
                                    <svg class="olymp-add-a-place-icon">
                                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}">
                                        </use>
                                    </svg>
                                    <span>Daydreamz Agency</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- ... end Today Events -->
            </div>
        </div>
    </div>
</div>

<!-- Window-popup Create Event -->

<div class="modal fade" id="create-event" tabindex="-1" role="dialog" aria-labelledby="create-event" aria-hidden="true">
    <div class="modal-dialog window-popup create-event" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use>
                </svg>
            </a>
            <div class="modal-header">
                <h6 class="title">Create an Event</h6>
            </div>

            <div class="modal-body">
                <div class="form-group label-floating is-select">
                    <label class="control-label">Personal Event</label>
                    <select class="form-control">
                        <option value="MA">Private Event</option>
                        <option value="FE">Personal Event</option>
                    </select>
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">Event Name</label>
                    <input class="form-control" placeholder="" value="Take Querty to the Veterinarian" type="text">
                </div>

                <div class="form-group label-floating is-empty">
                    <label class="control-label">Event Location</label>
                    <input class="form-control" placeholder="" value="" type="text">
                </div>

                <div class="form-group date-time-picker label-floating">
                    <label class="control-label">Event Date</label>
                    <input name="datetimepicker" value="26/03/2016">
                    <span class="input-group-addon">
                        <svg class="olymp-calendar-icon icon">
                            <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}"></use>
                        </svg>
                    </span>
                </div>

                <div class="row">
                    <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label">Event Time</label>
                            <input class="form-control" placeholder="" value="09:00" type="text">
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label">AM-PM</label>
                            <select class="form-control">
                                <option value="MA">AM</option>
                                <option value="FE">PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label class="control-label">Timezone</label>
                            <select class="form-control">
                                <option value="MA">US (UTC-8)</option>
                                <option value="FE">UK (UTC-0)</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <textarea class="form-control"
                        placeholder="Event Description">I need to take Querty for a check up and ask the doctor if he needs a new tank.</textarea>
                </div>

                <form class="form-group">
                    <svg class="olymp-happy-face-icon">
                        <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-happy-face-icon')}}"></use>
                    </svg>

                    <select class="form-control" multiple data-live-search="true">
                        <option title="Green Goo Rock" data-content='<div class="inline-items">
										<div class="author-thumb">
											<img src="{{asset('site/img/avatar52-sm.jpg')}}" alt="author">
										</div>
											<div class="h6 author-title">Green Goo Rock</div>

										</div>'>Green Goo Rock
                        </option>

                        <option title="Mathilda Brinker" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="{{asset('site/img/avatar74-sm.jpg')}}" alt="author">
											</div>
											<div class="h6 author-title">Mathilda Brinker</div>
										</div>'>Mathilda Brinker
                        </option>

                        <option title="Marina Valentine" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="{{asset('site/img/avatar48-sm.jpg')}}" alt="author">
											</div>
											<div class="h6 author-title">Marina Valentine</div>
										</div>'>Marina Valentine
                        </option>

                        <option title="Dave Marinara" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="{{asset('site/img/avatar75-sm.jpg')}}" alt="author">
											</div>
											<div class="h6 author-title">Dave Marinara</div>
										</div>'>Dave Marinara
                        </option>

                        <option title="Rachel Howlett" data-content='<div class="inline-items">
											<div class="author-thumb">
												<img src="{{asset('site/img/avatar76-sm.jpg')}}" alt="author">
											</div>
											<div class="h6 author-title">Rachel Howlett</div>
										</div>'>Rachel Howlett
                        </option>

                    </select>
                </form>

                <button class="btn btn-breez btn-lg full-width">Create Event</button>

            </div>
        </div>
    </div>
</div>

<!-- ... end Window-popup Create Event -->
@endsection