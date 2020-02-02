import Vue from "vue"

Vue.mixin({
    methods: {
        site_search(){
            window.$("a[href=\"#search\"]").on("click", function() {
                window.$("#search").addClass("open")
                window.$("#search > form > input[type=\"search\"]").focus()
            })

            window.$("#search, #search button.close").on("click keyup", function(event) {
                if (event.target === this || event.target.className === "close") {
                    window.$(this).removeClass("open")
                }
            })
        },

        video_responsive(){
            window.$("iframe[src*=\"youtube.com\"]").wrap("<div class=\"embed-responsive embed-responsive-16by9\"></div>")
            window.$("iframe[src*=\"vimeo.com\"]").wrap("<div class=\"embed-responsive embed-responsive-16by9\"></div>")
        },

        magnific_popup(){
            window.$(".mfp-gallery").magnificPopup({
                delegate: ".mfp-link",
                type: "image",
                tLoading: "Loading image #%curr%...",
                mainClass: "mfp-img-mobile",
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: "<a href=\"%url%\">The image #%curr%</a> could not be loaded.",
                }
            })
        },

        magnific_video(){
            window.$(".mfp-video").magnificPopup({
                type: "iframe",
            })
        },

        popup_vertical_center(){
            window.$(function() {
                function reposition() {
                    var modal = window.$(this),
                        dialog = modal.find(".modal-dialog")
                    modal.css("display", "block")
                    // Dividing by two centers the modal exactly, but dividing by three
                    // or four works better for larger screens.
                    dialog.css("margin-top", Math.max(0, (window.$(window).height() - dialog.height()) / 2))
                }
                // Reposition when a modal is shown
                window.$(".modal").on("show.bs.modal", reposition)
                // Reposition when the window is resized
                window.$(window).on("resize", function() {
                    window.$(".modal:visible").each(reposition)
                })
            })
        },

        sticky_header(){
            if(window.$(".sticky-header").length){
                return new Waypoint.Sticky({
                    element: window.$(".sticky-header")
                })
            }
        },

        scroll_top(){
            window.$("button.scroltop").on("click", function() {
                window.$("html, body").animate({
                    scrollTop: 0
                }, 1000)
                return false
            })

            window.$(window).on("scroll", function() {
                var scroll = window.$(window).scrollTop()
                if (scroll > 900) {
                    window.$("button.scroltop").fadeIn(1000)
                } else {
                    window.$("button.scroltop").fadeOut(1000)
                }
            })
        },

        // > input type file by = custom.js ========================== //
        input_type_file_form(){
            window.$(document).on("change", ".btn-file :file", function() {
                var input = window.$(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, "/").replace(/.*\//, "")
                input.trigger("fileselect", [numFiles, label])
            })

            window.$(".btn-file :file").on("fileselect", function(event, numFiles, label) {
                var input = window.$(this).parents(".input-group").find(":text"),
                    log = numFiles > 10 ? numFiles + " files selected" : label
                if (input.length) {
                    input.val(log)
                } else {
                    if (log) alert(log)
                }
            })
        },

        // > input Placeholder in IE9 by = custom.js ======================== //
        placeholderSupport(){
            /* input placeholder for ie9 & ie8 & ie7 */
            window.$.support.placeholder = ("placeholder" in document.createElement("input"))
            /* input placeholder for ie9 & ie8 & ie7 end*/
            /*fix for IE7 and IE8  */
            if (!window.$.support.placeholder) {
                window.$("[placeholder]").on("focus", function() {
                    if (window.$(this).val() === window.$(this).attr("placeholder")) window.$(this).val("")
                }).blur(function() {
                    if (window.$(this).val() === "") window.$(this).val(window.$(this).attr("placeholder"))
                }).blur()

                window.$("[placeholder]").parents("form").on("submit", function() {
                    window.$(this).find("[placeholder]").each(function() {
                        if (window.$(this).val() === window.$(this).attr("placeholder")) {
                            window.$(this).val("")
                        }
                    })
                })
            }
            /*fix for IE7 and IE8 end */
        },


        // > footer fixed on bottom by = custom.js ======================== //
        footer_fixed() {
            window.$(".site-footer").css("display", "block")
            window.$(".site-footer").css("height", "auto")
            var footerHeight = window.$(".site-footer").outerHeight()
            window.$(".footer-fixed > .page-wraper").css("padding-bottom", footerHeight)
            window.$(".site-footer").css("height", footerHeight)
        },

        // > accordion active calss by = custom.js ========================= //
        accordion_active() {
            window.$(".acod-head a").on("click", function() {
                window.$(".acod-head").removeClass("acc-actives")
                window.$(this).parents(".acod-head").addClass("acc-actives")
                window.$(".acod-title").removeClass("acc-actives") //just to make a visual sense
                window.$(this).parent().addClass("acc-actives"); //just to make a visual sense
                ($(this).parents(".acod-head").attr("class"))
            })
        },

        // > Nav submenu show hide on mobile by = custom.js
        mobile_nav(){
            window.$(".sub-menu").parent("li").addClass("has-child")
            window.$(".mega-menu").parent("li").addClass("has-child")
            window.$("<div class='glyphicon glyphicon-chevron-right submenu-toogle'></div>").insertAfter(".has-child > a")
            window.$(".has-child a+.submenu-toogle").on("click",function(ev) {
                window.$(this).next(window.$(".sub-menu")).slideToggle("fast", function(){
                    window.$(this).parent().toggleClass("nav-active")
                })
                ev.stopPropagation()
            })

            window.$(".has-child").on("click",function(ev) {
                window.$(this).find(window.$(".sub-menu")).slideToggle("fast", function(){
                    window.$(this).parent().toggleClass("nav-active")
                })
            })

        },

        //  related with content by = owl.carousel.js ========================== //
        blog_related_slider(){
            window.$(".blog-related-slider").owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    767:{
                        items:3
                    },
                    1000:{
                        items:3
                    }
                }
            })
        },

        // Fade slider for home by = owl.carousel.js ========================== //
        aboutus_carousel(){
            window.$(".about-us-carousel").owlCarousel({
                loop:true,
                autoplay:true,
                autoplayTimeout:3000,
                margin:30,
                nav:true,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                items:1,
                dots: false,
            })
        },

        // > Home Carousel_1 Full Screen with no margin by = owl.carousel.js ========================== //
        home_carousel_1(){
            window.$(".home-carousel-1").owlCarousel({
                loop:true,
                margin:0,
                autoplay:true,
                autoplayTimeout:3000,
                //center: true,
                nav:false,
                dots: true,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    767:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
        },

        // > Home Carousel_1 Full Screen with no margin by = owl.carousel.js ========================== //
        home_carousel_2(){
            window.$(".home-carousel-2").owlCarousel({
                loop:true,
                autoplay:true,
                margin:0,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    767:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
        },

        // > home_projects_filter Full Screen with no margin by = owl.carousel.js ========================== //
        home_projects_filter(){

            var owl = window.$(".owl-carousel-filter").owlCarousel({
                loop:false,
                autoplay:true,
                margin:20,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    580:{
                        items:2
                    },
                    767:{
                        items:2
                    },
                    991:{
                        items:3
                    },
                    1152:{
                        items:4
                    },
                    1360:{
                        items:4
                    },
                    1366:{
                        items:5
                    }
                }
            })

            /* Filter Nav */

            window.$(".btn-filter-wrap").on("click", ".btn-filter", function(e) {
                var filter_data = window.$(this).data("filter")

                /* return if current */
                if(window.$(this).hasClass("btn-active")) return

                /* active current */
                window.$(this).addClass("btn-active").siblings().removeClass("btn-active")

                /* Filter */
                owl.owlFilter(filter_data, function(_owl) {
                    window.$(_owl).find(".item").each(owlAnimateFilter)
                })
            })



        },

        // Home page testimonial by = owl.carousel.js ========================== //
        testimonial_home(){
            window.$(".testimonial-home").owlCarousel({
                loop:true,
                autoplay:false,
                margin:80,
                nav:false,
                dots: true,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    991:{
                        items:2
                    }
                }
            })
        },

        //  home_client_carouse by = owl.carousel.js ========================== //
        home_client_carousel(){
            window.$(".home-client-carousel").owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:2
                    },
                    480:{
                        items:3
                    },
                    767:{
                        items:4
                    },
                    1000:{
                        items:5
                    }
                }
            })
        },


        //  home_client_carouse by = owl.carousel.js ========================== //
        home_client_carousel_2(){
            window.$(".home-client-carousel-2").owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                nav:false,
                dots: true,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:2
                    },
                    480:{
                        items:3
                    },
                    767:{
                        items:4
                    },
                    1000:{
                        items:5
                    }
                }
            })
        },
        // > work carousel  by = owl.carousel.js ========================== //
        work_carousel(){
            window.$(".work-carousel").owlCarousel({
                loop:true,
                autoplay:false,
                center: true,
                items:3,
                margin:0,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    854:{
                        items:2
                    }

                }
            })
        },


        //  Portfolio Carousel no margin by = owl.carousel.js ========================== //
        portfolio_nogap_carousel(){
            window.$(".portfolio-carousel-nogap").owlCarousel({
                loop:true,
                margin:0,
                nav:true,
                dots: false,
                navText: ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:2
                    },
                    767:{
                        items:3
                    },
                    1000:{
                        items:3
                    }
                }
            })
        },

        // > Hover Tab  ========================== //
        hover_tab(){
            window.$(".circle-block-outer[data-toggle=\"tab-hover\"] div").on("mouseenter", function(){
                window.$(this).tab("show")
            })
        },

        /*--------------------------------------------------------------------------------------------
    Window on load ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

        // > equal each box by  = custom.js =========================== //
        equalheight(container) {
            var currentTallest = 0,
                currentRowStart = 0,
                rowDivs = [],
                topPosition = 0,
                currentDiv = 0

            window.$(container).each(function() {
                window.$el = window.$(this)
                window.$($el).height("auto")
                var topPostion = window.$el.position().top
                if (currentRowStart != topPostion) {
                    for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                        rowDivs[currentDiv].height(currentTallest)
                    }
                    rowDivs.length = 0 // empty the array
                    currentRowStart = topPostion
                    currentTallest = window.$el.height()
                    rowDivs.push($el)
                } else {

                    rowDivs.push($el)
                    currentTallest = (currentTallest < window.$el.height()) ? ($el.height()) : (currentTallest)
                }

                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest)
                }
            })
        },


        // text animation function

        //TxtType (el, toRotate, period) {
        //this.toRotate = toRotate;
        //this.el = el;
        //this.loopNum = 0;
        //this.period = parseInt(period, 10) || 2000;
        //this.txt = '';
        //this.tick();
        //this.isDeleting = false;
        //};

        //TxtType.prototype.tick = function() {
        //var i = this.loopNum % this.toRotate.length;
        //var fullTxt = this.toRotate[i];

        //if (this.isDeleting) {
        //this.txt = fullTxt.substring(0, this.txt.length - 1);
        //} else {
        //this.txt = fullTxt.substring(0, this.txt.length + 1);
        //}

        //this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        //var that = this;
        //var delta = 200 - Math.random() * 100;
        //
        //if (this.isDeleting) { delta /= 2; }

        //if (!this.isDeleting && this.txt === fullTxt) {
        //delta = this.period;
        //this.isDeleting = true;
        //} else if (this.isDeleting && this.txt === '') {
        //this.isDeleting = false;
        //this.loopNum++;
        //delta = 500;
        //}

        //setTimeout(function() {
        //that.tick();
        //}, delta);
        //};

        // > On scroll content animated by = Viewportchecker.js ============= //
        animate_content(){
            window.$(".animate").scrolla({
                mobile: false,
                once: true
            })
        },

        // > masonry by = isotope.pkgd.min.js ========================= //
        masonryBox() {
            if ( window.$().isotope ) {
                var window.$container = window.$(".portfolio-wrap")
                window.$container.isotope({
                    itemSelector: ".masonry-item",
                    transitionDuration: "1s",
                    originLeft: true
                })

                window.$(".masonry-filter li").on("click",function() {
                    var selector = window.$(this).find("a").attr("data-filter")
                    window.$(".masonry-filter li").removeClass("active")
                    window.$(this).addClass("active")
                    window.$container.isotope({ filter: selector })
                    return false
                })
            }
        },

        // > background image parallax by = stellar.js ==================== //
        bg_image_stellar(){
            window.$(function(){
                window.$.stellar({
                    horizontalScrolling: false,
                    verticalOffset:100
                })
            })
        },

        // > page loader by = custom.js ========================= //
        page_loader() {
            window.$(".loading-area").fadeOut(1000)
        },

        /*--------------------------------------------------------------------------------------------
    Window on scroll ALL FUNCTION START
---------------------------------------------------------------------------------------------*/

        color_fill_header() {
            var scroll = window.$(window).scrollTop()
            if(scroll >= 100) {
                window.$(".is-fixed").addClass("color-fill")
            } else {
                window.$(".is-fixed").removeClass("color-fill")
            }
        },
    }
})
