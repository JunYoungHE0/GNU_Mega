<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.bxslider.js"></script>', 10);
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="notice box_cnt">
    <div class="box_title">
        <h3><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h3>
        <a href="<?php echo get_pretty_url($bo_table); ?>" class="lt_more"><span class="sound_only"><?php echo $bo_subject ?> 더보기</span><i class="fa fa-plus more_btn"></i></a>
    </div>
    <ul>
    <?php for ($i=0; $i<$list_count; $i++) {  ?>
        <li>
            <?php
            if ($list[$i]['icon_secret']) echo "<span class=\"lock_icon\"><i class=\"fa fa-lock\" aria-hidden=\"true\"></i></span> ";
            if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";
             //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".get_pretty_url($bo_table, $list[$i]['wr_id'])."\">";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];
            echo "</a>";
            ?>
            <div class="lt_info">
            	<span class="lt_date"><?php echo $list[$i]['datetime'] ?></span>              
            </div>
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
        <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
</div>
