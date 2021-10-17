<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 350;
$thumb_height = 120;
?>
<!-- NEW & BEST 슬라이드 -->
<div class="swiper-container swiper_new">
    <div class="swiper-wrapper">
        <?php
        for ($i=0; $i<count($list); $i++) {
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

        if($thumb['src']) {
        $img = $thumb['ori'];
        } else {
            $img = $latest_skin_url.'/img/noimg.png';
            $thumb['alt'] = '등록된 이미지가 없습니다.';
        }
            //$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
        $img_content = $img;
        ?>
        <div class="swiper-slide">
            <div class="sw_tit">
                <?php echo $list[$i]['subject'] ?>
            </div>
            <div class="sw_img" style="background-image: url('<?php echo $img_content; ?>')">
            </div>
            <div class="it_more">
                <a href="<?php echo $list[$i]['href'] ?>" class="it_more_btn">자세히 보기</a>
            </div>
        </div>
        <?php }  ?>
        <?php if (count($list) == 0) { //게시물이 없을 때  ?>
        <div class="swiper-slide">
            <div class="sw_sub">등록된 게시물이 없습니다.</div>
        </div>
        <?php }  ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>