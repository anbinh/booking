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