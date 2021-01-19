@if(isset($scripts) && !blank($scripts))
    @foreach($scripts as $script)
        <script src="{{ $script }}"></script>
    @endforeach
@endif
@stack('pre-scripts')
<!-- LIBRARY JS-->
<script src="{{url('public/newtheme/assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/detect-browser/browser.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/smooth-scroll/jquery-smoothscroll.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/wow-js/wow.min.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/slick-slider/slick.min.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/selectbox/js/jquery.selectbox-0.2.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/please-wait/please-wait.min.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/fancybox/js/jquery.fancybox.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/fancybox/js/jquery.fancybox-buttons.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/fancybox/js/jquery.fancybox-thumbs.js')}}"></script>
<!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")-->

<!-- LOADING JS FOR PAGE-->
<script src="{{url('public/newtheme/assets/js/pages/home-page.js')}}"></script>
<script src="{{url('public/newtheme/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script>

    var slick = $(".slick-slider-added");

    slick.each(function() {
        if ($(this).is(".tours-list")) {
            $(this).slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoPlay: true,
                prevArrow: $('.prev-arrow'),
                nextArrow: $('.next-arrow'),
                arrows: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }
        else if ($(this).is(".traveler-list")){
            $(this).slick({
                dots: false,
                infinite: true,
                slidesToShow: 2
            });
        }
    });

    window.loading_screen = window.pleaseWait(
        {
            logo: logo_str,
            backgroundColor: '#fff',
            loadingHtml: "<div class='spinner sk-spinner-wave'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>",
        });
</script>

@stack('scripts')


