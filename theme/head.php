<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<header id="hd">
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
    <!-- 진짜 헤더 bar -->
    <div id="hd_main">
        <div id="hd_wrapper">
            <div class="logo_box">
            <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/logo', 'logo|로고', 1, 0);	//로고 최신게시글
            ?>
            <?php
                // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                echo latest('theme/hdbanner', 'logo|서브배너', 1, 0);	//로고게시판 서브배너 최신게시글
            ?>
            </div>
            <nav id="gnb">
                <h2>메인메뉴</h2>
                <div class="gnb_wrap">
                    <ul id="gnb_1dul">
                        <li class="gnb_1dli gnb_mnal">
                            <button type="button" class="gnb_menu_btn" title="전체메뉴">
                                <span class="sound_only">전체메뉴열기</span>
                                <span class="menu_btn_line">
                                    <span class="btn_line line_01"></span>
                                    <span class="btn_line line_02"></span>
                                    <span class="btn_line line_03"></span>
                                </span>
                            </button>
                        </li>
                        <?php
                        $menu_datas = get_menu_db(0, true);
                        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                        $i = 0;
                        foreach( $menu_datas as $row ){
                            if( empty($row) ) continue;
                            $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                        ?>
                        <li class="gnb_1dli <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                            <?php
                            $k = 0;
                            foreach( (array) $row['sub'] as $row2 ){

                                if( empty($row2) ) continue; 

                                if($k == 0)
                                    echo '<div class="gnb_2dul"><ul class="gnb_2dul_box">'.PHP_EOL;
                                ?>
                                <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                                <?php
                                $k++;
                                }   //end foreach $row2

                                if($k > 0)
                                echo '</ul></div>'.PHP_EOL;
                            ?>
                        </li>
                        <?php
                        $i++;
                        }   //end foreach $row
                        if ($i == 0) {  ?>
                        <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                        <?php } ?>
                    </ul>
                    <div id="gnb_all">
                        <ul class="gnb_al_ul">
                            <?php
                        
                            $i = 0;
                            foreach( $menu_datas as $row ){
                            ?>
                            <li class="gnb_al_li">
                                <input type="checkbox" id="menuBtn<?php echo $i ?>">
                                <label for="menuBtn<?php echo $i ?>" class="gnb_al_la" onclick=""><span><?php echo $row['me_name'] ?></span><i class="fa fa-angle-down"></i></label>
                                <?php
                                $k = 0;
                                foreach( (array) $row['sub'] as $row2 ){
                                    if($k == 0)
                                        echo '<ul>'.PHP_EOL;
                                    ?>
                                    <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                                <?php
                                $k++;
                                }   //end foreach $row2

                                if($k > 0)
                                echo '</ul>'.PHP_EOL;
                                ?>
                            </li>
                            <?php
                            $i++;
                            }   //end foreach $row
                            if ($i == 0) {  ?>
                            <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                            <?php } ?>
                            <li>
                            <?php
                            echo latest('theme/quickmenu', 'quick|SNS', 3, 0);
                            ?>
                            </li>
                        </ul>
                    </div>
                    <div id="gnb_all_bg"></div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- } 상단 끝 -->

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
        <?php if (!defined("_INDEX_")) { ?>
        <script>
            function display_submenu(num) { 
                document.getElementById("mysub"+num).style.display="block";
            }
        </script>
        <div id="mysubmenu">
            <?php
            $sql = " select *
                        from {$g5['menu_table']}
                        where me_use = '1'
                        and length(me_code) = '2'
                        order by me_order, me_id ";
            $result = sql_query($sql, false);
            $gnb_zindex = 999; // gnb_1dli z-index 값 설정용

            for ($i=0; $row=sql_fetch_array($result); $i++) {
            ?>
            <div id="mysub<?php echo $i ?>" class="mysub_bg">
                <div class="menu_b"><p><?php echo $row['me_name'] ?></p></div>
                    <?php
                    $sql2 = " select *
                                from {$g5['menu_table']}
                                where me_use = '1'
                                and length(me_code) = '4'
                                and substring(me_code, 1, 2) = '{$row['me_code']}'
                                order by me_order, me_id ";
                    $result2 = sql_query($sql2);
                    
                    //좌측 서브메뉴 전체 리스트에서 현재 페이지에 해당하는 대메뉴 리스트만 보여줌
                    if ( ($row['me_name']==$board['bo_subject'])||($row['me_name']==$g5['title']) ) {
                        echo ("<script> display_submenu(".$i."); </script>");
                    }
            
                    for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                        if($k == 0)
                            echo '<ul class="menu_box">'.PHP_EOL;
                    ?>
                        <li class="menu_s <?php if (($row2['me_name']==$board['bo_subject'])||($row2['me_name']==$g5['title'])) { echo "on"; } ?>">
                            <a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" <?php echo $class?>><?php echo $row2['me_name'] ?></a>
                        </li>
                    <?php

                        //좌측 서브메뉴 전체 리스트에서 현재 페이지에 해당하는 대메뉴 리스트만 보여줌
                        if ( ($row2['me_name']==$board['bo_subject'])||($row2['me_name']==$g5['title']) ) {
                            echo ("<script>display_submenu(".$i.");</script>");
                        }

                    }

                    if($k > 0)
                        echo '</ul>'.PHP_EOL;
                    ?>
            </div>
            <?php } ?>
        </div>
        <div class="container">
            <h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php } 