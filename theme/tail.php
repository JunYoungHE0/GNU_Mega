<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}
?>
        </div>
    </div>
</div>
<!-- } 콘텐츠 끝 -->

<!-- 하단 시작 { -->
<div id="ft">
    <div id="ft_wrap">
        <div class="ft_top d-flex">
            <div id="ft_gnb">
                <div class="ft_gnb_wrap">
                    <ul class="ft_gnb_ul d-flex">
                        <?php
                    
                        $i = 0;
                        foreach( $menu_datas as $row ){
                        ?>
                        <li class="ft_gnb_li">
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="ft_gnb_a"><?php echo $row['me_name'] ?></a>
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
                    </ul>
                </div>
            </div>
            <div id="ft_company" class="ft_cnt">
                <?php
                echo latest('theme/footer', 'footer', 1, 30);
                ?>
                <div id="ft_link" class="d-flex">
                    <a href="<?php echo get_pretty_url('content', 'privacy'); ?>">가맹문의</a>
                    <a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a>
                    <a href="<?php echo get_pretty_url('content', 'privacy'); ?>">점주전용</a>
                </div>
            </div>
        </div>
	</div>
    <aside id="quick">
        <?php
        echo latest('theme/quick_tel', 'quick|문의전화', 1, 0);
        ?>
        <?php
        echo latest('theme/quickmenu', 'quick|SNS', 3, 0);
        ?>
    </aside>
    <button type="button" id="top_btn">
    	<i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span>
    </button>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->
<script src="/project_2/theme/basic/js/hjycustom.js"></script>
<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");