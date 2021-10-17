// by hjy 작성

// hjy 팝업 닫기
$(function () {
    $("#hjy_pop .close_btn").click(function () {
        $('#hjy_pop').addClass('popClose');
        $('#popbg').addClass('popClose');
    });
});

// 네비게이션 Header 확장
$(function () {
    // $(".gnb_menu_btn").click(function () {
    //     $("#gnb_all, #gnb_all_bg").show();
    // });
    // $(".gnb_close_btn, #gnb_all_bg").click(function () {
    //     $("#gnb_all, #gnb_all_bg").hide();
    // });
    // $('#gnb_1dul > li').mouseover(function () {
    //     $('.gnb_2dul').stop().slideDown();
    // });
    // $('#gnb').mouseleave(function () {
    //     $('.gnb_2dul').stop().slideUp();
    // });
    $('.gnb_1da').mouseenter(function(){
		$('#hd_main').addClass('over');
    });
    $('#hd_wrapper').mouseleave(function(){
		$('#hd_main').removeClass('over');
	});
});

// 헤더 스크롤에 따른 숨김/노출 
$(function () {
    var lastScrollTop = 0;
    delta = 20;
    $(window).scroll(function() {
        var st = $(this).scrollTop();
        if (Math.abs(lastScrollTop - st) <= delta) return;
        if ((st > lastScrollTop) && (lastScrollTop > 0)) {
            $("#hd_main").css("top", "-100px");
        } else {
            $("#hd_main").css("top", "0px");
        }
        lastScrollTop = st;
    });
});

// 모바일용 메뉴 창 열기 닫기 버튼
$(function(){
    $(".gnb_menu_btn").click(function(){
        if ($(".gnb_menu_btn").hasClass("menu_open")) {
            $(".gnb_menu_btn").removeClass("menu_open");
            $("#gnb_all").removeClass("on")
            $("#gnb_all_bg").hide();
        } else {
            $(".gnb_menu_btn").addClass("menu_open");
            $("#gnb_all").addClass("on")
            $("#gnb_all_bg").show();
        }
    });
    $("#gnb_all_bg").click(function(){
        $("#gnb_all_bg").hide();
        $("#gnb_all").removeClass("on");
        $(".gnb_menu_btn").removeClass("menu_open");
    });
});

// 메인배너 슬라이드
$(function () {
    var swiper1 = new Swiper('.swiper_main', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        slidesPerView: 1,
        paginationClickable: true,
        loop: true, // 루프(반복)옵션 활성화시 주석해제
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        centeredSlides: true,
        spaceBetween: 0,
    });
});

// 모바일 메인배너 슬라이드
$(function () {
    var swiper2 = new Swiper('.swiper_main_mobile', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        slidesPerView: 1,
        paginationClickable: true,
        loop: true, // 루프(반복)옵션 활성화시 주석해제
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        centeredSlides: true,
        spaceBetween: 0,
    });
});

// NEW & BEST 포스터 슬라이드
$(function () {
    var swiper3 = new Swiper(".swiper_new", {
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1025:{
                slidesPerView: 3,
                spaceBetween: 30,
            },
            700: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 0,
            }
        }
    });
});

//매장찾기 맵 off 버튼
$(function () {
    // $('.map_on').click(function () {
    //         $('#section4 .map_wrap').css('height', '500px');
    //         $('#section4 .map_off').removeClass('d-none');
    //     });
    $('.map_off_btn').click(function () {
        $('#search_map').addClass('d-none');
        $('#map_bg').addClass('d-none');
    });
});

// 스크롤 이벤트 
$(function() {

    $("#top_btn").hide(); // 탑 버튼 숨김
    $(function () {
        $(window).scroll(function(){
            if ($(this).scrollTop()>200) { //스크롤 내릴 높이
                $('#top_btn').fadeIn();
                $(".section1_bg").css('background-color', '#f8f4ed80');
            } else {
                $('#top_btn').fadeOut();
                $(".section1_bg").css('background-color', '#fff');
            }
        });
        // 탑 버튼 이벤트
        $("#top_btn").click(function() {
            $("html, body").animate({
                scrollTop:0
            }, '500'); //탑 이동 스크롤 속도
            return false;
        });
    });
});
