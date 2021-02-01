@extends('site.app')

@section('content')
    <!-- Main Header Events -->

<div class="main-header">
	<div class="content-bg-wrap bg-events"></div>
	<div class="container">
		<div class="row">
			<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
				<div class="main-header-content">
					<h1>Create and Manage Events</h1>
					<p>Welcome to your personal planner assistant. Here you’ll see all your next events and invites that your
	 friends sent you. You can create 3 different types of events: Personal (for your daily errands), Private
	 (for you and friends only) and Public (open to everyone). Create your events, invite friends and have fun!</p>
				</div>
			</div>
		</div>
	</div>

	<img class="img-bottom" src="{{asset('site/img/event-bottom.png')}}" alt="friends">
</div>

<!-- ... end Main Header Events -->



<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<ul class="nav nav-tabs calendar-events-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#events" role="tab">
								Calendar and Events
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#notifications" role="tab">
								Event Invites <span class="items-round-little bg-breez">2</span>
							</a>
						</li>

					</ul>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="events" role="tabpanel">

		<div class="container">
			<div class="row">
				<div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
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
									<a href="#" class="btn btn-control bg-breez" data-toggle="modal" data-target="#create-event">
										<svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
									</a>
								</div>
						
								<div class="day-event" id="accordion-1" data-month="12" data-day="2">
						
									<div class="card">
										<div class="card-header" id="headingOne-1">
						
											<div class="event-time">
												<time datetime="2004-07-24T18:18">9:00am</time>
												<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
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
												<a href="#" data-toggle="collapse" data-target="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne">
													Breakfast at the Agency
													<i class="fa fa-angle-down" aria-hidden="true"></i>
													<span class="event-status-icon"  data-toggle="modal" data-target="#public-event">
																				<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top"   data-original-title="UNCOMPLETED"><use xlink:href="#olymp-calendar-icon"></use></svg>
																			</span>
												</a>
											</h5>
										</div>
						
										<div id="#collapseOne-1" class="collapse show" aria-labelledby="headingOne" data-parent="#headingOne-1">
											<div class="card-body">
												Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
											</div>
											<div class="place inline-items">
												<svg class="olymp-add-a-place-icon"><use xlink:href="#olymp-add-a-place-icon"></use></svg>
												<span>Daydreamz Agency</span>
											</div>
						
											<ul class="friends-harmonic inline-items">
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/friend-harmonic5.jpg')}}" alt="friend">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/friend-harmonic10.jpg')}}" alt="friend">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/friend-harmonic7.jpg')}}" alt="friend">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/friend-harmonic8.jpg')}}" alt="friend">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/friend-harmonic2.jpg')}}" alt="friend">
													</a>
												</li>
												<li class="with-text">
													Will Assist
												</li>
											</ul>
										</div>
						
						
						
						
						
									</div>
						
									<div class="card">
										<div class="card-header" id="headingTwo-1">
						
											<div class="event-time">
												<time datetime="2004-07-24T18:18">12:00pm</time>
												<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
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
												<a href="#" data-toggle="collapse" data-target="#collapseTwo-1" aria-expanded="true" aria-controls="collapseOne">
													Send the new “Olympus” project files to the Agency
													<i class="fa fa-angle-down" aria-hidden="true"></i>
													<span class="event-status-icon"  data-toggle="modal" data-target="#public-event">
																				<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top"   data-original-title="UNCOMPLETED"><use xlink:href="#olymp-calendar-icon"></use></svg>
																			</span>
												</a>
											</h5>
										</div>
						
										<div id="collapseTwo-1" class="collapse" aria-labelledby="headingOne" data-parent="#headingOne-1">
											<div class="card-body">
												Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
											</div>
										</div>
									</div>
						
									<div class="card">
										<div class="card-header" id="headingThree-1">
						
											<div class="event-time">
												<time datetime="2004-07-24T18:18">6:30pm</time>
												<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
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
												<a href="#" data-toggle="collapse" data-target="#collapseThree-1" aria-expanded="true" aria-controls="collapseOne">
													Take Querty to the Veterinarian
													<i class="fa fa-angle-down" aria-hidden="true"></i>
													<span class="event-status-icon"  data-toggle="modal" data-target="#public-event">
																				<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top"   data-original-title="UNCOMPLETED"><use xlink:href="#olymp-calendar-icon"></use></svg>
																			</span>
												</a>
											</h5>
										</div>
						
										<div class="place inline-items">
											<svg class="olymp-add-a-place-icon"><use xlink:href="#olymp-add-a-place-icon"></use></svg>
											<span>Daydreamz Agency</span>
										</div>
									</div>
						
								</div>
						
							</div>
						</div>
						
						<!-- ... end Today Events -->
					</div>
				</div>
				<div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
					<div class="ui-block">

						
						<!------------------------------------- Full Calendar ----------------------------------------->
						
						<div id="calendar" class="crumina-full-calendar">
						
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">WEDNESDAY, MARCH 30</h6>
							</div>
						
						</div>
						
						<!-- JS library for Full Calendar -->
						<script src="js/libs/fullcalendar.js"></script>
						<!-- ...end JS library for Full Calendar -->
						
						<!-- JS-init for Full Calendar -->
						<script>
						
							/* -----------------------------
								 * FullCalendar Init
								 * Script file: fullcalendar.js
								 * https://fullcalendar.io/
							* ---------------------------*/
						
							fullCalendar = function () {
								var calendarEl = document.getElementById('calendar');
						
								var calendar = new FullCalendar.Calendar(calendarEl, {
									plugins: ['interaction', 'dayGrid', 'timeGrid'],
									defaultView: 'dayGridMonth',
									defaultDate: '2019-05-07',
									header: {
										left: 'prev',
										center: 'title',
										right: 'next,dayGridMonth,timeGridWeek,timeGridDay'
									},
									buttonText: {
										month:    ' ',
										week:     ' ',
										day:      ' '
									},
									buttonIcons: {
										prev: 'far fa-chevron-left',
										next: 'far fa-chevron-right'
									},
						
									eventClick: function (info) {
										var url = info.event.url;
										var is_modal = url.match(/^modal\:(#[-\w]+)$/);
										if(!is_modal) {
											return;
										}
						
										info.jsEvent.preventDefault();
										var modal = is_modal[1];
						
										$(modal).modal('show');
									},
									events: [
										{
											title: 'Chris Greyson’s Bday',
											start: '2019-05-08',
											url: 'modal:#public-event'
										},
										{
											title: 'Make Dinner Plans...',
											start: '2019-05-08',
											url: 'modal:#private-event'
										},
										{
											title: 'Jenny’s Birthday...',
											start: '2019-05-30',
											url: 'modal:#private-event'
										},
										{
											title: 'Videocall to talk...',
											start: '2019-05-30',
											url: 'modal:#public-event'
										},
										{
											title: 'Breakfast at the...',
											start: '2019-05-26',
											url: 'modal:#public-event'
										},
										{
											title: 'Send the new...',
											start: '2019-05-26',
											url: 'modal:#private-event'
										},
										{
											title: 'Take Querty to the...',
											start: '2019-05-26',
											url: 'modal:#public-event'
										}
									]
								});
						
								calendar.render();
							};
						
							document.addEventListener("DOMContentLoaded", function() {
								fullCalendar();
							});
						
						</script>
						<!-- ... end JS-init for Full Calendar -->
						
						<!------------------------------------- ... end Full Calendar ----------------------------------------->
						
						
						<div class="today-events calendar">
							<div class="list">
						
								<div class="control-block-button">
						
									<a href="#" class="btn btn-control bg-breez" data-toggle="modal" data-target="#create-event">
										<svg class="olymp-plus-icon">
											<use xlink:href="#olymp-plus-icon"></use>
										</svg>
									</a>
						
								</div>
						
								<div id="accordion-3" aria-multiselectable="true" class="day-event">
						
									<div class="card">
										<div class="card-header" id="headingOne-3">
											<div class="event-time">
												<time class="published" datetime="2017-03-24T18:18">10:50am</time>
												<div class="more">
													<svg class="olymp-three-dots-icon">
														<use xlink:href="#olymp-three-dots-icon"></use>
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
												<a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Videocall to talk with the agency’s new client<i class="fa fa-angle-down" aria-hidden="true"></i>
													<span class="event-status-icon" data-toggle="modal" data-target="#public-event">
																																				<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top" data-original-title="UNCOMPLETED"><use xlink:href="#olymp-calendar-icon"></use></svg>
																																			</span>
												</a>
											</h5>
										</div>
						
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#headingOne-3">
											<div class="card-body">
												I have to remeber to be a little earlier at the agency to discuss with the guys all the questions we have for our new client and to show them the new logo.
											</div>
											<div class="place inline-items">
												<svg class="olymp-add-a-place-icon">
													<use xlink:href="#olymp-add-a-place-icon"></use>
												</svg>
												<span>Daydreamz Agency</span>
											</div>
						
										</div>
									</div>
						
									<div class="card">
										<div class="card-header" id="headingThree-3">
											<div class="event-time">
												<time class="published" datetime="2017-03-24T18:18">10:50am</time>
												<div class="more">
													<svg class="olymp-three-dots-icon">
														<use xlink:href="#olymp-three-dots-icon"></use>
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
												<a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseThree-3" aria-expanded="false" aria-controls="collapseThree-3">
													Jenny’s Birthday Party<i class="fa fa-angle-down" aria-hidden="true"></i>
													<span class="event-status-icon" data-toggle="modal" data-target="#private-event">
																																				<svg class="olymp-calendar-icon" data-toggle="tooltip" data-placement="top" data-original-title="UNCOMPLETED"><use xlink:href="#olymp-calendar-icon"></use></svg>
																																			</span>
												</a>
											</h5>
										</div>
										<div id="collapseThree-3" class="collapse" aria-labelledby="headingThree" data-parent="#headingOne-3">
											<div class="card-body">
												Hi Guys! I propose to go a litle earlier at the agency to have breakfast and talk a little more about the new design project we have been working on. Cheers!
											</div>
											<div class="place inline-items">
												<svg class="olymp-add-a-place-icon">
													<use xlink:href="#olymp-add-a-place-icon"></use>
												</svg>
												<span>Daydreamz Agency</span>
											</div>
						
											<ul class="friends-harmonic inline-items">
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/friend-harmonic5.jpg')}}" alt="friend">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic10.jpg" alt="friend">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic7.jpg" alt="friend">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic8.jpg" alt="friend">
													</a>
												</li>
												<li>
													<a href="#">
														<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic2.jpg" alt="friend">
													</a>
												</li>
												<li class="with-text">
													Will Assist
												</li>
											</ul>
										</div>
									</div>
						
								</div>
						
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="notifications" role="tabpanel">
		<div class="container">
			<div class="row">
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="ui-block">

						
						<table class="event-item-table event-item-table-fixed-width">
						
							<thead>
						
							<tr>
						
								<th class="author">
									NOTIFICATION
								</th>
						
								<th class="location">
									PLACE
								</th>
						
								<th class="upcoming">
									DATE
								</th>
						
								<th class="description">
									DESCRIPTION
								</th>
						
								<th class="users">
									ASSISTANTS
								</th>
						
								<th class="add-event">
						
								</th>
							</tr>
						
							</thead>
						
							<tbody>
							<tr class="event-item">
								<td class="author">
									<div class="event-author inline-items">
										<div class="author-thumb">
											<img loading="lazy" src="{{asset('site/img/')}}avatar62-sm.jpg" alt="author">
										</div>
										<div class="author-date">
											<a href="#" class="author-name h6">Mathilda Brinker</a> invited you <br> to an event <a href="#">Reunion Dinner.</a>
										</div>
									</div>
								</td>
								<td class="location">
									<div class="place inline-items">
										<svg class="olymp-add-a-place-icon"><use xlink:href="#olymp-add-a-place-icon"></use></svg>
										<span>Panucci Restaurant</span>
									</div>
								</td>
								<td class="upcoming">
									<div class="date-event inline-items align-left">
										<svg class="olymp-small-calendar-icon"><use xlink:href="#olymp-small-calendar-icon"></use></svg>
						
										<span class="month">Aug 14, 2016 at 7:00pm</span>
						
									</div>
								</td>
								<td class="description">
									<p class="description">Hey! I thought we could all get together and grab something to eat to remember old times!</p>
								</td>
								<td class="users">
									<ul class="friends-harmonic">
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic5.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic10.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic7.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic8.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic2.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#" class="all-users bg-breez">+24</a>
										</li>
									</ul>
								</td>
								<td class="add-event">
									<a href="20-CalendarAndEvents-MonthlyCalendar.html" class="btn btn-breez btn-sm">Add to Calendar</a>
									<a href="#" class="btn btn-sm btn-border-think custom-color c-grey">Decline / Delete</a>
								</td>
							</tr>
							<tr class="event-item">
								<td class="author">
									<div class="event-author inline-items">
										<div class="author-thumb">
											<img loading="lazy" src="{{asset('site/img/')}}avatar78-sm.jpg" alt="author">
										</div>
										<div class="author-date">
											<a href="#" class="author-name h6">Walter Havock </a>invited you to <br> an event <a href="#"> Daydreamz New <br> Year’s Party.</a>
										</div>
									</div>
								</td>
								<td class="location">
									<div class="place inline-items">
										<svg class="olymp-add-a-place-icon"><use xlink:href="#olymp-add-a-place-icon"></use></svg>
										<span>Daydreamz Agency</span>
									</div>
								</td>
								<td class="upcoming">
									<div class="date-event inline-items align-left">
										<svg class="olymp-small-calendar-icon"><use xlink:href="#olymp-small-calendar-icon"></use></svg>
						
										<span class="month">Dec 29, 2016 at 7:00pm</span>
						
									</div>
								</td>
								<td class="description">
									<p class="description">Let’s celebrate the new year together! We are organizing a big party for all the agency...</p>
								</td>
								<td class="users">
									<ul class="friends-harmonic">
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic5.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic10.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic7.jpg" alt="friend">
											</a>
										</li>
										<li>
											<a href="#">
												<img loading="lazy" src="{{asset('site/img/')}}friend-harmonic8.jpg" alt="friend">
											</a>
										</li>
						
									</ul>
								</td>
								<td class="add-event">
									<a href="20-CalendarAndEvents-MonthlyCalendar.html" class="btn btn-breez btn-sm">Add to Calendar</a>
									<a href="#" class="btn btn-sm btn-border-think custom-color c-grey">Decline / Delete</a>
								</td>
							</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection