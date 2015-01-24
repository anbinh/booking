<!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row" style="margin-top: 15px;">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>1234 Address<br>City</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <a href = {{URL::route('contact-page')}}><h3 style = "color: #FFF">Contact Us</h3></a>
                        <a href = {{URL::route('terms-page')}}><h4 style = "color: #FFF;margin: 5px 0">Terms and Conditions</h4></a>
                        <a href = {{URL::route('privacy-page')}}><h4 style = "color: #FFF;margin: 5px 0">Privacy Policy</h4></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row"style="margin-top: 10px;">
                    <div class="col-lg-12">
                        Copyright &copy; Miratik 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>
{{--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>--}}
{{--<script src="{{ cached_asset('/home_page/js/jquery.min.js', true) }}"></script>--}}
{{--<script src="{{ cached_asset('/home_page/js/material/jquery-1.10.2.min.js', true) }}"></script>--}}
{{--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>--}}

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


<script src="{{ cached_asset('/home_page/js/material/bootstrap.min.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/material/material.min.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/material/ripples.min.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/material/jquery.dropdown.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/include-header.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/modernizr.min.js') }}"></script>

<script src="{{ cached_asset('/home_page/js/imagesloaded.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/skrollr.js', true) }}"></script>
<script src="{{ cached_asset('/home_page/js/_main.js', true) }}"></script>
<script src="{{ cached_asset('js/jRating.jquery.min.js', true) }}"></script>
<script src="{{ cached_asset('js/jquery.raty.js', true) }}"></script>