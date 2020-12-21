@extends('layouts.app')

@section('content')
    <div class="content">
        <!--section -->
        <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
            <div class="bg"  data-bg="{{ asset('images/bg/1.jpg') }}" data-scrollax="properties: { translateY: '200px' }"></div>
            <div class="overlay"></div>
            <div class="hero-section-wrap fl-wrap">
                <div class="container">
                    <div class="intro-item fl-wrap">
                        <h2>Before You Rent check iCheckRental</h2>
                        <h2>Find and rank risky renters</h2>
                    </div>
                    <div class="main-search-input-wrap">
                        <div class="main-search-input fl-wrap">
                            <div class="main-search-input-item">
                                <input type="text" placeholder="Who are you looking for?" value=""/>
                            </div>
                            <div class="main-search-input-item location" id="autocomplete-container">
                                <input type="text" placeholder="Location" id="autocomplete-input" value=""/>
                                <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                            </div>
                            <div class="main-search-input-item">
                                <select data-placeholder="All Categories" class="chosen-select" >
                                    <option>Categories</option>
                                    <option>Auto Rental</option>
                                    <option>Apartments Rental</option>
                                    <option>Equipments Rental</option>
                                    <option>Furniture Rental</option>
                                    <option>Events Rental</option>
                                </select>
                            </div>
                            <button class="main-search-button" onclick="window.location.href='listings-half-screen-map-list.html'">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bubble-bg"> </div>
            <div class="header-sec-link">
                <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section id="sec2">
            <div class="container">
                <div class="section-title">
                    <h2>Categories</h2>
                    <div class="section-subtitle">Type of Categories</div>
                    <span class="section-separator"></span>
                    <p>Explore some of the best news from around the country and from our partners and friends.</p>
                </div>
                <!-- portfolio start -->
                <div class="gallery-items fl-wrap mr-bot spad">
                    <!-- gallery-item-->
                    <div class="gallery-item">
                        <div class="grid-item-holder">
                            <div class="listing-item-grid">
                                <div class="bg"  data-bg="{{ asset('images/all/event.jpg') }}"></div>
                                <div class="listing-counter"><span>10 </span> Locations</div>
                                <div class="listing-item-cat">
                                    <h3><a href="listing.html">Events Rentals</a></h3>
                                    <p>Space is available for Weddings, Conferences, Parties, Business Meetings, etc.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item gallery-item-second">
                        <div class="grid-item-holder">
                            <div class="listing-item-grid">
                                <div class="bg"  data-bg="{{ asset('images/all/car4.jpg') }}"></div>
                                <div class="listing-counter"><span>6 </span> Locations</div>
                                <div class="listing-item-cat">
                                    <h3><a href="listing.html">Auto Rentals</a></h3>
                                    <p>Consider choosing Luxury models, Premium, Full Size, Mid Size and Economy Vehicles</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item">
                        <div class="grid-item-holder">
                            <div class="listing-item-grid">
                                <div class="bg"  data-bg="{{ asset('images/all/apartments.jpg') }}"></div>
                                <div class="listing-counter"><span>21 </span> Locations</div>
                                <div class="listing-item-cat">
                                    <h3><a href="listing.html">Apartments Rentals</a></h3>
                                    <p>Highly sort after Homes  and Apartments at your disposal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item">
                        <div class="grid-item-holder">
                            <div class="listing-item-grid">
                                <div class="bg"  data-bg="{{ asset('images/all/equipment.jpg') }}"></div>
                                <div class="listing-counter"><span>7 </span> Locations</div>
                                <div class="listing-item-cat">
                                    <h3><a href="listing.html">Equipments Rentals</a></h3>
                                    <p>Sort through hard to find Tools and Equipments for your projects</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    <!-- gallery-item-->
                    <div class="gallery-item">
                        <div class="grid-item-holder">
                            <div class="listing-item-grid">
                                <div class="bg"  data-bg="{{ asset('images/all/furniture.jpg') }}"></div>
                                <div class="listing-counter"><span>15 </span> Locations</div>
                                <div class="listing-item-cat">
                                    <h3><a href="listing.html">Furniture Rentals</a></h3>
                                    <p>Premium Living Room, Dining Room, Sofa/Loveseat, Big Screen Television available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- gallery-item end-->
                </div>
                <!-- portfolio end -->
                <a href="listing.html" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section class="gray-section">
            <div class="container">
                <div class="section-title">
                    <h2>Popular listings</h2>
                    <div class="section-subtitle">Best Listings</div>
                    <span class="section-separator"></span>
                    <p>Nulla tristique mi a massa convallis cursus. Nulla eu mi magna.</p>
                </div>
            </div>
            <!-- carousel -->
            <div class="list-carousel fl-wrap card-listing ">
                <!--listing-carousel-->
                <div class="listing-carousel  fl-wrap ">
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <!-- listing-item -->
                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img">
                                    <img src="{{ asset('images/all/1.jpg') }}" alt="">
                                    <div class="overlay"></div>
                                    <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                                </div>
                                <div class="geodir-category-content fl-wrap">
                                    <a class="listing-geodir-category" href="listing.html">Retail</a>
                                    <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                        <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                                    </div>
                                    <h3><a href="listing-single.html">Event in City Mol</a></h3>
                                    <p>Sed interdum metus at nisi tempor laoreet.  </p>
                                    <div class="geodir-category-options fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                            <span>(7 reviews)</span>
                                        </div>
                                        <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- listing-item end-->
                    </div>
                    <!--slick-slide-item end-->
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <!-- listing-item -->
                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img">
                                    <img src="{{ asset('images/all/1.jpg') }}" alt="">
                                    <div class="overlay"></div>
                                    <div class="list-post-counter"><span>15</span><i class="fa fa-heart"></i></div>
                                </div>
                                <div class="geodir-category-content fl-wrap">
                                    <a class="listing-geodir-category" href="listing.html">Event</a>
                                    <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                        <span class="avatar-tooltip">Added By  <strong>Mark Rose</strong></span>
                                    </div>
                                    <h3><a href="listing-single.html">Cafe "Lollipop"</a></h3>
                                    <p>Morbi suscipit erat in diam bibendum rutrum in nisl.</p>
                                    <div class="geodir-category-options fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                            <span>(17 reviews)</span>
                                        </div>
                                        <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- listing-item end-->
                    </div>
                    <!--slick-slide-item end-->
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <!-- listing-item -->
                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img">
                                    <img src="{{ asset('images/all/1.jpg') }}" alt="">
                                    <div class="overlay"></div>
                                    <div class="list-post-counter"><span>13</span><i class="fa fa-heart"></i></div>
                                </div>
                                <div class="geodir-category-content fl-wrap">
                                    <a class="listing-geodir-category" href="listing.html">Gym </a>
                                    <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                        <span class="avatar-tooltip">Added By  <strong>Nasty Wood</strong></span>
                                    </div>
                                    <h3><a href="listing-single.html">Gym In Brooklyn</a></h3>
                                    <p>Morbiaccumsan ipsum velit tincidunt . </p>
                                    <div class="geodir-category-options fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="3">
                                            <span>(16 reviews)</span>
                                        </div>
                                        <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- listing-item end-->
                    </div>
                    <!--slick-slide-item end-->
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <!-- listing-item -->
                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img">
                                    <img src="{{ asset('images/all/1.jpg') }}" alt="">
                                    <div class="overlay"></div>
                                    <div class="list-post-counter"><span>3</span><i class="fa fa-heart"></i></div>
                                </div>
                                <div class="geodir-category-content fl-wrap">
                                    <a class="listing-geodir-category" href="listing.html">Shops</a>
                                    <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                        <span class="avatar-tooltip">Added By  <strong>Nasty Wood</strong></span>
                                    </div>
                                    <h3><a href="listing-single.html">Shop in Boutique Zone</a></h3>
                                    <p>Morbiaccumsan ipsum velit tincidunt . </p>
                                    <div class="geodir-category-options fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                            <span>(6 reviews)</span>
                                        </div>
                                        <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- listing-item end-->
                    </div>
                    <!--slick-slide-item end-->
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <!-- listing-item -->
                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img">
                                    <img src="{{ asset('images/all/1.jpg') }}" alt="">
                                    <div class="overlay"></div>
                                    <div class="list-post-counter"><span>35</span><i class="fa fa-heart"></i></div>
                                </div>
                                <div class="geodir-category-content fl-wrap">
                                    <a class="listing-geodir-category" href="listing.html">Cars</a>
                                    <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                        <span class="avatar-tooltip">Added By  <strong>Kliff Antony</strong></span>
                                    </div>
                                    <h3><a href="listing-single.html">Best deal For the Cars</a></h3>
                                    <p>Lorem ipsum gravida nibh vel velit.</p>
                                    <div class="geodir-category-options fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                            <span>(11 reviews)</span>
                                        </div>
                                        <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- listing-item end-->
                    </div>
                    <!--slick-slide-item end-->
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <!-- listing-item -->
                        <div class="listing-item">
                            <article class="geodir-category-listing fl-wrap">
                                <div class="geodir-category-img">
                                    <img src="{{ asset('images/all/1.jpg') }}" alt="">
                                    <div class="overlay"></div>
                                    <div class="list-post-counter"><span>553</span><i class="fa fa-heart"></i></div>
                                </div>
                                <div class="geodir-category-content fl-wrap">
                                    <a class="listing-geodir-category" href="listing.html">Restourants</a>
                                    <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                        <span class="avatar-tooltip">Added By  <strong>Adam Koncy</strong></span>
                                    </div>
                                    <h3><a href="listing-single.html">Luxury Restourant</a></h3>
                                    <p>Sed non neque elit. Sed ut imperdie.</p>
                                    <div class="geodir-category-options fl-wrap">
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                            <span>(7 reviews)</span>
                                        </div>
                                        <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- listing-item end-->
                    </div>
                    <!--slick-slide-item end-->
                </div>
                <!--listing-carousel end-->
                <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
            </div>
            <!--  carousel end-->
        </section>
        <!-- section end -->
        <!--section -->
        <section class="color-bg">
            <div class="shapes-bg-big"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images-collage fl-wrap">
                            <div class="images-collage-title">City<span>Book</span></div>
                            <div class="images-collage-main images-collage-item"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></div>
                            <div class="images-collage-other images-collage-item" data-position-left="23" data-position-top="10" data-zindex="2"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></div>
                            <div class="images-collage-other images-collage-item" data-position-left="62" data-position-top="54" data-zindex="5"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></div>
                            <div class="images-collage-other images-collage-item anim-col" data-position-left="18" data-position-top="70" data-zindex="11"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></div>
                            <div class="images-collage-other images-collage-item" data-position-left="37" data-position-top="90" data-zindex="1"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="color-bg-text">
                            <h3>Join our online community</h3>
                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>
                            <a href="#" class="color-bg-link modal-open">Sign In Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section   end -->
        <!--section -->


        <section>
            <div class="container">
                <div class="section-title">
                    <h2>How it works</h2>
                    <div class="section-subtitle">Discover & Connect </div>
                    <span class="section-separator"></span>
                    <p>Explore some of the best tips from around the country.</p>
                </div>
                <!--process-wrap  -->
                <div class="process-wrap fl-wrap">
                    <ul>
                        <li>
                            <div class="process-item">
                                <span class="process-count">01 . </span>
                                <div class="time-line-icon"><i class="fa fa-map-o"></i></div>
                                <h4> Create an Account</h4>
                                <p>Go to iCheckRental and create an Account.</p>
                            </div>
                            <span class="pr-dec"></span>
                        </li>
                        <li>
                            <div class="process-item">
                                <span class="process-count">02 .</span>
                                <div class="time-line-icon"><i class="fa fa-envelope-open-o"></i></div>
                                <h4> Log in to your new Account</h4>
                                <p>Provide all required information about you and your company.</p>
                            </div>
                            <span class="pr-dec"></span>
                        </li>
                        <li>
                            <div class="process-item">
                                <span class="process-count">03 .</span>
                                <div class="time-line-icon"><i class="fa fa-hand-peace-o"></i></div>
                                <h4> Search the iCheckRental database</h4>
                                <p>Before you make a decision to rent to an unknown individual, you must factor in the potential risks involved. We will provide you with a Rental Score of the individual for you to make a sound decision.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="process-end"><i class="fa fa-check"></i></div>
                </div>
                <!--process-wrap   end-->
            </div>
        </section>
        <section class="parallax-section" data-scrollax-parent="true">
            <div class="bg"  data-bg="{{ asset('images/bg/1.jpg') }}" data-scrollax="properties: { translateY: '100px' }"></div>
            <div class="overlay co lor-overlay"></div>
            <!--container-->
            <div class="container">
                <div class="intro-item fl-wrap">
                    <h2>Visit the Best Places In Your City</h2>
                    <h3>Find great places , hotels , restourants , shops.</h3>
                    <a class="trs-btn" href="#">Add Listing + </a>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section>
            <div class="container">
                <div class="section-title">
                    <h2> Pricing Tables</h2>
                    <div class="section-subtitle">cost of our services</div>
                    <span class="section-separator"></span>
                    <p>Explore some of the best tips from around the city from our partners and friends.</p>
                </div>
                <div class="pricing-wrap fl-wrap">
                    <!-- price-item-->
                    <div class="price-item">
                        <div class="price-head op1">
                            <h3>Basic</h3>
                        </div>
                        <div class="price-content fl-wrap">
                            <div class="price-num fl-wrap">
                                <span class="curen">$</span>
                                <span class="price-num-item">0</span>
                                <div class="price-num-desc">Per month</div>
                            </div>
                            <div class="price-desc fl-wrap">
                                <ul>
                                    <li>Search by State(1)</li>
                                    <li>No. of Search(5)</li>
                                    <li>Display Rental Score</li>
                                    <li>Images(0)</li>
                                    <li>Videos(0)</li>
                                    <li>No. of Complaints(10)</li>
                                </ul>
                                <a href="#" class="price-link">Choose Basic</a>
                            </div>
                        </div>
                    </div>
                    <!-- price-item end-->
                    <!-- price-item-->
                    <div class="price-item best-price">
                        <div class="price-head op2">
                            <h3>Extended</h3>
                        </div>
                        <div class="price-content fl-wrap">
                            <div class="price-num fl-wrap">
                                <span class="curen">$</span>
                                <span class="price-num-item">2</span>
                                <div class="price-num-desc">Per month</div>
                            </div>
                            <div class="price-desc fl-wrap">
                                <ul>
                                    <li>Search by State(5)</li>
                                    <li>No. of Search(10)</li>
                                    <li>Display Rental Score</li>
                                    <li>Images(5)</li>
                                    <li>Videos(2) - 30sec length</li>
                                    <li>No. of Complaints(50)</li>
                                </ul>
                                <a href="#" class="price-link">Choose Extended</a>
                                <div class="recomm-price">
                                    <i class="fa fa-check"></i>
                                    <span class="clearfix"></span>
                                    Recommended
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- price-item end-->
                    <!-- price-item-->
                    <div class="price-item">
                        <div class="price-head">
                            <h3>Premium</h3>
                        </div>
                        <div class="price-content fl-wrap">
                            <div class="price-num fl-wrap">
                                <span class="curen">$</span>
                                <span class="price-num-item">5</span>
                                <div class="price-num-desc">Per month</div>
                            </div>
                            <div class="price-desc fl-wrap">
                                <ul>
                                    <li>Search by State(50)</li>
                                    <li>No. of Search(unlimited)</li>
                                    <li>Display Rental Score</li>
                                    <li>Images(10)</li>
                                    <li>Videos(5) - 30sec length</li>
                                    <li>No. of Complaints(100)</li>
                                </ul>
                                <a href="#" class="price-link">Choose Premium</a>
                            </div>
                        </div>
                    </div>
                    <!-- price-item end-->
                </div>
                <!-- about-wrap end  -->
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section class="color-bg">
            <div class="shapes-bg-big"></div>
            <div class="container">
                <div class=" single-facts fl-wrap">
                    <!-- inline-facts -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="254">154</div>
                                </div>
                            </div>
                            <h6>Interested Renters</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="12168">12168</div>
                                </div>
                            </div>
                            <h6>Good Renters</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="172">172</div>
                                </div>
                            </div>
                            <h6>Bad Risk Prevented</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num" data-content="0" data-num="732">732</div>
                                </div>
                            </div>
                            <h6>New Complaints Every Week</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>Reviews</h2>
                    <div class="section-subtitle">Clients Reviews</div>
                    <span class="section-separator"></span>
                    <p>Valuable information about your Renters.</p>
                </div>
            </div>
            <!-- testimonials-carousel -->
            <div class="carousel fl-wrap">
                <!--testimonials-carousel-->
                <div class="testimonials-carousel single-carousel fl-wrap">
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <div class="testimonilas-text">
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                            <p>It has been an eye opening satisfaction for our business since joining up wth CheckRenters </p>
                        </div>
                        <div class="testimonilas-avatar-item">
                            <div class="testimonilas-avatar"><img src="{{ asset('images/avatar/4.jpg') }}" alt=""></div>
                            <h4>Lisa Noory</h4>
                            <span>Equipment Rental Owner</span>
                        </div>
                    </div>
                    <!--slick-slide-item end-->
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <div class="testimonilas-text">
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                            <p>The Auto Rental Industry have been dealing with problems arising from customers failure to follow our policy. With CheckRenters we have alleviate most pf our issues. </p>
                        </div>
                        <div class="testimonilas-avatar-item">
                            <div class="testimonilas-avatar"><img src="{{ asset('images/avatar/3.jpg') }}" alt=""></div>
                            <h4>Antony Moore</h4>
                            <span>Auto Rental Owner</span>
                        </div>
                    </div>
                    <!--slick-slide-item end-->
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <div class="testimonilas-text">
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                            <p>We have had issues in the past with some of our customers, but since becoming a member at CheckRenters we have had little or no problems.</p>
                        </div>
                        <div class="testimonilas-avatar-item">
                            <div class="testimonilas-avatar"><img src="{{ asset('images/avatar/2.jpg') }}" alt=""></div>
                            <h4>Austin Harisson</h4>
                            <span>Event Hall Rental Owner</span>
                        </div>
                    </div>
                    <!--slick-slide-item end-->
                    <!--slick-slide-item-->
                    <div class="slick-slide-item">
                        <div class="testimonilas-text">
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                            <p>CheckRenters gave us the ability to screen new customers and allow us to make decisions that will affect our business in a negative way</p>
                        </div>
                        <div class="testimonilas-avatar-item">
                            <div class="testimonilas-avatar"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""></div>
                            <h4>Garry Colonsi</h4>
                            <span>Apartments Rental Owner</span>
                        </div>
                    </div>
                    <!--slick-slide-item end-->
                </div>
                <!--testimonials-carousel end-->
                <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
            </div>
            <!-- carousel end-->
        </section>
        <!-- section end -->
        <!--section -->
        <section class="gray-section">
            <div class="container">
                <div class="fl-wrap spons-list">
                    <ul class="client-carousel">
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}" alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}" alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}" alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}" alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}" alt=""></a></li>
                        <li><a href="#" target="_blank"><img src="{{ asset('images/clients/1.png') }}" alt=""></a></li>
                    </ul>
                    <div class="sp-cont sp-cont-prev"><i class="fa fa-angle-left"></i></div>
                    <div class="sp-cont sp-cont-next"><i class="fa fa-angle-right"></i></div>
                </div>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>Tips & Articles</h2>
                    <div class="section-subtitle">From the blog.</div>
                    <span class="section-separator"></span>
                    <p>Browse the latest articles from our blog.</p>
                </div>
                <div class="row home-posts">
                    <div class="col-md-4">
                        <article class="card-post">
                            <div class="card-post-img fl-wrap">
                                <a href="blog-single.html"><img src="{{ asset('images/all/1.jpg') }}"   alt=""></a>
                            </div>
                            <div class="card-post-content fl-wrap">
                                <h3><a href="blog-single.html">Gallery Post</a></h3>
                                <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                <div class="post-author"><a href="#"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""><span>By , Alisa Noory</span></a></div>
                                <div class="post-opt">
                                    <ul>
                                        <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                        <li><i class="fa fa-eye"></i> <span>264</span></li>
                                        <li><i class="fa fa-tags"></i> <a href="#">Photography</a>  </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="card-post">
                            <div class="card-post-img fl-wrap">
                                <a href="blog-single.html"><img  src="{{ asset('images/all/1.jpg') }}"   alt=""></a>
                            </div>
                            <div class="card-post-content fl-wrap">
                                <h3><a href="blog-single.html">Video and gallery post</a></h3>
                                <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                <div class="post-author"><a href="#"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""><span>By , Mery Lynn</span></a></div>
                                <div class="post-opt">
                                    <ul>
                                        <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                        <li><i class="fa fa-eye"></i> <span>264</span></li>
                                        <li><i class="fa fa-tags"></i> <a href="#">Design</a>  </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="card-post">
                            <div class="card-post-img fl-wrap">
                                <a href="blog-single.html"><img  src="{{ asset('images/all/1.jpg') }}"   alt=""></a>
                            </div>
                            <div class="card-post-content fl-wrap">
                                <h3><a href="blog-single.html">Post Article</a></h3>
                                <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. </p>
                                <div class="post-author"><a href="#"><img src="{{ asset('images/avatar/1.jpg') }}" alt=""><span>By , Garry Dee</span></a></div>
                                <div class="post-opt">
                                    <ul>
                                        <li><i class="fa fa-calendar-check-o"></i> <span>25 April 2018</span></li>
                                        <li><i class="fa fa-eye"></i> <span>264</span></li>
                                        <li><i class="fa fa-tags"></i> <a href="#">Stories</a>  </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <a href="blog.html" class="btn  big-btn circle-btn  dec-btn color-bg flat-btn">Read All<i class="fa fa-eye"></i></a>
            </div>
        </section>
        <!-- section end -->
        <!--section -->
        <section class="gradient-bg">
            <div class="cirle-bg">
                <div class="bg" data-bg="{{ asset('images/bg/circle.png') }}"></div>
            </div>
            <div class="container">
                <div class="join-wrap fl-wrap">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Do You Have Questions ?</h3>
                            <p>Lorem ipsum dolor sit amet, harum dolor nec in, usu molestiae at no.</p>
                        </div>
                        <div class="col-md-4"><a href="contacts.html" class="join-wrap-btn">Get In Touch <i class="fa fa-envelope-o"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
    </div>
@endsection
