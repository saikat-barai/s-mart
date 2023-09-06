<div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-app"></i>
							<span class="nav-text">Category</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Category</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('category') }}">&nbsp; All Category</a></li>
                                    <li><a href="{{ route('category.trash') }}">&nbsp; Trash Category</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Subcategory</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('subcategory') }}">&nbsp; All Subcategory</a></li>
                                    <li><a href="{{ route('subcategory.trash') }}">&nbsp; Trash Subcategory</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Child Category</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('childcategory') }}">&nbsp; All ChildCategory</a></li>
                                    <li><a href="{{ route('trash.childcategory') }}">&nbsp; Trash Child Category</a></li>
                                </ul>
                            </li>
                            {{-- <li><a href="{{ route('childcategory') }}">Child Category</a></li> --}}
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-blueprint"></i>
							<span class="nav-text">Brand</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{ route('brand') }}" aria-expanded="false">Brand</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-add-3"></i>
							<span class="nav-text">Product</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{ route('add.product') }}" aria-expanded="false">Add Product</a>
                            </li>
                            <li><a class="" href="{{ route('manage.product') }}" aria-expanded="false">Manage Product</a>
                            </li>
                            <li><a class="" href="{{ route('color.size') }}" aria-expanded="false">Color & Size</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-home"></i>
							<span class="nav-text">Warehouse</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{ route('warehouse') }}" aria-expanded="false">Warehouse</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-location-1"></i>
							<span class="nav-text">Pickup Point</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{ route('pickuppoint') }}" aria-expanded="false">---Pickup Point</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-location-1"></i>
							<span class="nav-text">Coupon</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="" href="{{ route('coupon') }}" aria-expanded="false">---Coupon</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-settings"></i>
							<span class="nav-text">Setting</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('seo') }}">Seo Setting</a></li>
                            <li><a href="{{ route('setting') }}">Setting</a></li>
                            </li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="./email-compose.html">Compose</a></li>
                                    <li><a href="./email-inbox.html">Inbox</a></li>
                                    <li><a href="./email-read.html">Read</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Other</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="./email-compose.html">Compose</a></li>
                                    <li><a href="./email-inbox.html">Inbox</a></li>
                                    <li><a href="./email-read.html">Read</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    
                    
                </ul>
				{{-- <div class="add-menu-sidebar">
					<img src="images/calendar.png" alt="" class="mr-3">
					<p class="	font-w500 mb-0">Create Workout Plan Now</p>
				</div> --}}
				<div class="copyright">
					<p><strong>S-Mart Admin Dashboard</strong> © 2023 All Rights Reserved</p>
					<p>Made with <span class="heart"></span> by S-Mart</p>
				</div>
			</div>
        </div>