<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
<div>
<!-- 매장찾기 팝업 -->
    <div id="search_map" class="d-none">
        <div class="map_off">
            <button class="map_off_btn">
                지도 닫기
            </button>
        </div>
        <div class="map_wrap">
            <div id="map" style="width:100%;position:relative;overflow:hidden;">
            </div>
            <div id="menu_wrap" class="bg_white">
                <ul id="placesList"></ul>
            </div>
        </div>
    </div>
    <div id="map_bg" class="d-none"></div>
    <h2 class="sound_only">메인콘텐츠</h2>
    <div class="section" id="section0">
        <div id="mainbanner" class="p-rel">
        <?php
        // 이 함수가 바로 메인배너최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo latest('theme/swiper_mainbanner', 'mainbanner|PC', 5,0); //메인배너관리 관리자게시판
        ?>
        </div>
        <div id="mainbanner_mobile" class="p-rel">
        <?php
        // 이 함수가 바로 메인배너최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo latest('theme/swiper_mainbanner2', 'mainbanner|모바일', 5,0); //메인배너관리 관리자게시판
        ?>
        </div>
    </div>
    <div class="section" id="section1">
        <div class="section1_bg">
            <div class="container_main">
                <p class="sub_title">남녀노소 인기만점</p>
                <h2>BEST MENU</h2>
                <div class="latest_area">
                    <div class="bestmenu">
                        <?php
                        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                        echo latest('theme/newmenu_swiper', 'NewAndBest|BEST', 10, 26);		//NEW & BEST 관리자게시판
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="container_main2">
            <div class="latest_area d-flex">
                <div class="box_left">
                <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/movie', 'franchise|동영상', 1, 30); // 프렌차이즈안내
                ?>
                </div>
                <div class="box_right">
                <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/franchise2', 'franchise|안내문구', 1, 30); // 프렌차이즈안내
                ?>

                <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/franchise3', 'franchise|링크버튼', 2, 30); // 프렌차이즈안내
                ?>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section3">
        <div class="container_main3">
            <p class="sub_title">성공적인 창업을 위한</p>
            <h2>메가커피의 성공포인트</h2>
            <div class="latest_area">
                <div data-aos="fade-left" data-aos-duration="2000" class="graybox1"></div>
                <div class="point num1">
                <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/success', 'success_point|1번', 1, 30);		// 성공포인트
                ?>
                </div> 
            </div>
            <div class="latest_area">
                <div data-aos="fade-right" data-aos-duration="2000" class="graybox2"></div>
                <div class="point num2">
                <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/success2', 'success_point|2번', 1, 30);		// 성공포인트
                ?>
                </div> 
            </div>
            <div class="latest_area">
                <div data-aos="fade-left" data-aos-duration="2000" class="graybox1"></div>
                <div class="point num3">
                <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/success', 'success_point|3번', 1, 30);		// 성공포인트
                ?>
                </div> 
            </div>
            <div class="latest_area">
                <div data-aos="fade-right" data-aos-duration="2000" class="graybox2"></div>
                <div class="point num4">
                <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/success2', 'success_point|4번', 1, 30);		// 성공포인트
                ?>
                </div> 
            </div>
        </div>
    </div>
    <div class="section" id="section4">
        <div class="container_main">
            <div class="latest_area d-flex">
                <div class="option store_search">
                    <div class="search_box">
                        <h3>매장 찾기</h3>
                        <div class="txt">
                            고객님 가까이에<br><strong>MEGA MGC COFFEE</strong>가 있습니다.
                        </div>
                        <p>가까운 지역명 또는 지점명으로 검색하세요</p>
                        <form onsubmit="searchPlaces(); return false;">
                            <input type="text" id="keyword" class="keyword_box" placeholder="ex)서울시 강남구 / ex)강남역점" autocomplete="off">
                            <button id="search_btn" class="map_on" type="submit"><img src="/project_2/theme/basic/img/search.png" alt="검색"></button>
                        </form>
                    </div>
                </div>
                <div class="notice_box p-rel">
                    <?php
                    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                    echo latest('theme/notice', 'notice', 4, 34);		//공지사항
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        AOS.init();
    </script>
    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=1ee470a7d991e66253bfe05a93678613&libraries=services"></script>
    <script src="/project_2/theme/basic/js/store_find_by_hjy.js"></script>

<?php
include_once(G5_THEME_PATH.'/tail.php');