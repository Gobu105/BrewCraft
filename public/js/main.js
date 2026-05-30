(function($) {
    "use strict";

    // Spinner
    var spinner = function() {
        setTimeout(function() {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

    // active 
    document.addEventListener("DOMContentLoaded", function() {
        const aboutSection = document.getElementById('about');
        const homeLink = document.querySelector('.navbar-nav .nav-link[href="index.php"]');
        const aboutLink = document.querySelector('.navbar-nav .nav-link[href="#about"]');

        // Function to add or remove 'active' class based on scroll position
        function toggleActiveClass() {
            const aboutTop = aboutSection.getBoundingClientRect().top;

            if (aboutTop >= 0 && aboutTop < window.innerHeight) {
                homeLink.classList.remove('active');
                aboutLink.classList.add('active');
            } else {
                aboutLink.classList.remove('active');
                homeLink.classList.add('active');
            }
        }

        // Add scroll event listener to toggle active class
        window.addEventListener('scroll', toggleActiveClass);
    });

    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function() {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
                function() {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function() {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });


    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function() {
        var $videoSrc;
        $('.btn-play').click(function() {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function(e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function(e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });




    //validation for name	
    function name1() {
        var c = document.forms["signUp"]["name"].value;
        //alert(c);
        //var letters = /^[A-Za-z]+$/; 
        var charat = c.charAt(0);
        //alert(""+charat);

        if (charat < 65 || charat > 91 || charat < 97 || charat > 123) {
            document.getElementById("fn").innerHTML = "<br/><font color=red>Name must be not start with number</font>";
            return false;
        } else if (c.length < 5) {
            document.getElementById("fn").innerHTML = "<br/><font color=red>Name must be atleast 5 - 32 char long</font>";
            return false;
        } else {
            document.getElementById("fn").innerHTML = "";
            sub++;
            //valid1();
            return true;
            //alert("ninm;l");
        }
    }

    function name12() {
        var c = document.forms["signup"]["lname"].value;
        //alert(c);
        var charat = c.charAt(0);
        //alert(""+charat);

        if (charat < 65 || charat > 91 || charat < 97 || charat > 123) {
            document.getElementById("ln").innerHTML = "<br/><font color=red>Name must be not start with number</font>";
            return false;
        } else if (c.length < 5) {
            document.getElementById("ln").innerHTML = "<br/><font color=red>Name must be atleast 5 - 32 char long</font>";
            return false;
        } else {
            document.getElementById("ln").innerHTML = "";
            //sub++;
            //valid1();
            return true;
            //alert(sub);
        }
    }


    // or
    const myModalAlternative = new bootstrap.Modal('#cartModal', options)
})(jQuery);