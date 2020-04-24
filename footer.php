<!--footer -->
<footer class="footer-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-block-box" data-aos="fade-right" style="transition:all 2000ms ease-in-out;">
                    <h3>About Us</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>


                </div>
            </div>

            <div class="col-md-2">
                <div class="footer-block-box" data-aos="fade-right" style="transition:all 1700ms ease-in-out;">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="product.php">Product</a></li>
                        <li><a href="terms_condition.php">Terms & Condition</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <ul class="social-network">
                            <li><a href="#" data-placement="bottom" title="" data-original-title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="" data-original-title="Google +"><i class="fa fa-google"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-block-box" data-aos="fade-right" style="transition:all 1500ms ease-in-out;">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><span><i class="fa fa-location-arrow"></i></span>Madhurwada, Visakhapatnam,
                            Andhra Pradesh, pin: 530048,
                            Registried address: 18-221/3 Devarakonda,
                            Nalagonda District, Telangana</li>
                        <li><span><i class="fa fa-envelope" aria-hidden="true"></i></span></i><a href="mailto:ganapathiart@gmail.com">ganapathiart@gmail.com</a>  //  <a href="mailto:contact@dnmsquareart.com">contact@dnmsquareart.com</a></li>                            
                        <li><span><i class="fa fa-phone"></i></span><a href="#">9492871006</a>  </li>


                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-block-box" data-aos="fade-right" style="transition:all 1200ms ease-in-out;">
                    <h3>Following us</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60772.14572993514!2d83.33545194559035!3d17.826484442714523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a395bcfa932bf55%3A0xb8f76df244a25670!2sVisakhapatnam%2C%20Andhra%20Pradesh%20530048!5e0!3m2!1sen!2sin!4v1585120084360!5m2!1sen!2sin" width="100%" height="auto" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        
                </div>


            </div>

        </div>
    </div>
    <div class="copyright">
        <div class="text-center">
            <p>© 2020 <a href="#">dnmsquareart.com</a>| All Rights Reserved | Design by <a href="#"> Incrementer Technology Solutions Pvt. Ltd.</a> </p>
        </div>
    </div>
</footer>
<!-- //footer -->


<!-- js files -->
<!-- js -->


<script src="js/superfish.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        jQuery('ul.sf-menu').superfish();

        jQuery('#nav-wrap').prepend('<div id="menu-icon"></div>');

        $("#menu-icon").on("click", function() {
            jQuery(".sf-menu").slideToggle();
            jQuery(this).toggleClass("active");
        });
    });

</script>





<!-- carousel SLIDER / Product slider -->
<script type="text/javascript" src="js/owl.carousel.js"></script>

<!-- banner-demo start -->
<script type="text/javascript">
    var owl = $('.owl-carousel');
    $("#banner-demo").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 8000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            550: {
                items: 3,
                nav: true
            },
            768: {
                items: 1,
                nav: true,
                loop: true
            }
        }
    });

</script>
<!-- Testmonial start -->
<script type="text/javascript">
    var owl = $('.owl-carousel');
    $("#popular-demo").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            550: {
                items: 3,
                nav: true
            },
            768: {
                items: 5,
                nav: true,
                loop: true
            }
        }
    });

</script>

<!-- gift-demo start -->
<script type="text/javascript">
    var owl = $('.owl-carousel');
    $("#gift-demo").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            550: {
                items: 3,
                nav: true
            },
            768: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

</script>

<!-- event-demo start -->
<script type="text/javascript">
    var owl = $('.owl-carousel');
    $("#event-demo").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            550: {
                items: 3,
                nav: true
            },
            768: {
                items: 4,
                nav: true,
                loop: true
            }
        }
    });

</script>


<script src="js/aos.js" type="text/javascript"></script>
<script>
    AOS.init({
        easing: 'ease-in-out-sine'
    });

    setInterval(addItem, 500);

    var itemsCounter = 1;
    var container = document.getElementById('aos-demo');

    function addItem() {
        if (itemsCounter > 42) return;
        var item = document.createElement('div');
        item.classList.add('aos-item');
        item.setAttribute('data-aos', 'fade-up');
        item.innerHTML = '<div class="aos-item__inner"><h3>' + itemsCounter + '</h3></div>';
        // container.appendChild(item);
        itemsCounter++;
    }

</script>

<!-- single zoom -->
<script src="js/imagezoom.js"></script>
<!-- single  zoom-->

<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
	// Can also be used with $(document).ready()
		$(window).load(function() {
			$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
			});
		});
	</script>
<!-- //FlexSlider-->


<script src="js/bootstrap.js"></script>
<!-- bootstrap -->

</body>

</html>
