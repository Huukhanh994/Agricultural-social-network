<div class="stunning-header bg-primary-opacity">
	<!-- Header Standard Landing  -->
	<div class="header--standard header--standard-landing" id="header--standard">
		<div class="container">
			<div class="header--standard-wrap">
	
				<a href="{{url('/')}}" class="logo">
					<div class="img-wrap">
						<img src="{{asset('site/img/logo.png')}}" alt="Olympus">
						<img src="{{asset('site/img/logo-colored-small.png')}}" alt="Olympus" class="logo-colored">
					</div>
					<div class="title-block">
						<h6 class="logo-title">olympus</h6>
						<div class="sub-title">SOCIAL NETWORK</div>
					</div>
				</a>
	
				<a href="#" class="open-responsive-menu js-open-responsive-menu">
					<svg class="olymp-menu-icon"><use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-menu-icon')}}"></use></svg>
				</a>
	
				<div class="nav nav-pills nav1 header-menu">
					<div class="mCustomScrollbar">
						<ul>
							<li class="nav-item dropdown dropdown-has-megamenu">
							<li class="shoping-cart more">
								<a href="#" class="nav-link">
									<svg class="olymp-shopping-bag-icon"><use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-shopping-bag-icon')}}"></use></svg>
									<span class="count-product">{{ \Cart::getContent()->count() }}</span>
								</a>
								<div class="more-dropdown shop-popup-cart">
									<ul>
										@foreach (\Cart::getContent() as $item)
											<li class="cart-product-item">
												<div class="product-thumb">
													<img src="{{ asset('images/products/'.$item->attributes[0]) }}" alt="product">
												</div>
												<div class="product-content">
													<h6 class="title">{{$item->name}}</h6>
													<ul class="rait-stars">
														<li>
															<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
														</li>
											
														<li>
															<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
														</li>
														<li>
															<i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
														</li>
														<li>
															<i class="far fa-star star-icon" aria-hidden="true"></i>
														</li>
													</ul>
													<div class="counter">x{{$item->quantity}}</div>
												</div>
												<div class="product-price">${{$item->price}}</div>
												<div class="more">
													<svg class="olymp-little-delete">
														<use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-little-delete')}}"></use>
													</svg>
												</div>
											</li>
										@endforeach
									</ul>
								<div class="cart-subtotal">Cart Subtotal:<span>${{\Cart::getTotal()}}</span></div>
	
									<div class="cart-btn-wrap">
										<a href="#" class="btn btn-primary btn-sm">Go to Your Cart</a>
										<a href="{{route('checkout.cart')}}" class="btn btn-purple btn-sm">Go to Checkout</a>
									</div>
								</div>
							</li>
	
							<li class="menu-search-item">
								<a href="#" class="nav-link" data-toggle="modal" data-target="#main-popup-search">
									<svg class="olymp-magnifying-glass-icon"><use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon')}}"></use></svg>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="content-bg-wrap stunning-header-bg1"></div>
</div>