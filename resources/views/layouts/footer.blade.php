<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/21/2020
 * Time: 9:13 AM
 */
?>
<footer class="main-footer dark-footer  ">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-widget fl-wrap">
                    <h3>About Us</h3>
                    <div class="footer-contacts-widget fl-wrap">
                        <p>Our aim is provide a service that will improve your business greatly </p>
                        <ul  class="footer-contacts fl-wrap">
                            <li><span><i class="fa fa-envelope-o"></i> Mail :</span><a href="#" target="_blank">actaid101@gmail.com</a></li>
                            <!--<li> <span><i class="fa fa-map-marker"></i> Adress :</span><a href="#" target="_blank">USA 27TH Brooklyn NY</a></li>
                            <li><span><i class="fa fa-phone"></i> Phone :</span><a href="#">+7(111)123456789</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget fl-wrap">
                    <h3>Our Last News</h3>
                    <div class="widget-posts fl-wrap">
                        <ul>
                            <li class="clearfix">
                                <a href="#"  class="widget-posts-img"><img src="{{ asset('images/all/1.jpg') }}" class="respimg" alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">New concepts in renting</a>
                                    <span class="widget-posts-date"> 21 Sep 09.05 </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <a href="#"  class="widget-posts-img"><img src="{{ asset('images/all/1.jpg') }}" class="respimg" alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title=""> Rental Industry booming</a>
                                    <span class="widget-posts-date"> 7 Sep 18.21 </span>
                                </div>
                            </li>
                            <li class="clearfix">
                                <a href="#"  class="widget-posts-img"><img src="{{ asset('images/all/1.jpg') }}" class="respimg" alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Rental News</a>
                                    <span class="widget-posts-date"> 7 Sep 16.42 </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget fl-wrap">
                    <h3>Our  Twitter</h3>
                    <div id="footer-twiit"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget fl-wrap">
                    <h3>Subscribe</h3>
                    <div class="subscribe-widget fl-wrap">
                        <p>Want to be notified when we launch a new program. Just sign up and we'll send you a notification by email.</p>
                        <div class="subcribe-form">
                            <form id="subscribe">
                                <input class="enteremail" name="email" id="subscribe-email" placeholder="Email" spellcheck="false" type="text">
                                <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fa fa-rss"></i> Subscribe</button>
                                <label for="subscribe-email" class="subscribe-message"></label>
                            </form>
                        </div>
                    </div>
                    <div class="footer-widget fl-wrap">
                        <div class="footer-menu fl-wrap">
                            <ul>
                                <li><a href="#">Home </a></li>
                                <li><a href="#">Blog</a></li>
                                <!--<li><a href="#">Listing</a></li>-->
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer fl-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="about-widget">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="copyright"> &#169; iCheckRental 2020.  All rights reserved.</div>
                </div>
                <div class="col-md-4">
                    <div class="footer-social">
                        <ul>
                            <li><a href="#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" ><i class="fa fa-chrome"></i></a></li>
                            <li><a href="#" target="_blank" ><i class="fa fa-vk"></i></a></li>
                            <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
