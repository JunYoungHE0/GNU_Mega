<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<!-- 성공포인트 슬라이드 -->
<div class="success">
    <?php
    for ($i=count($list)-1; $i>=0; $i--) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="이미지">';
    ?>
    <div data-aos="fade-left" data-aos-duration="2000" class="success_con" >
        <div class="con_img">
            <?php echo run_replace('thumb_image_tag', $img_content); ?>
        </div>
        <div class="con_text">
            <span>Point <?php echo $list[$i]['wr_id'] ?></span>
            <h3><?php echo $list[$i]['subject'] ?></h3>
            <p><?php echo $list[$i]['wr_content'] ?></p>
        </div>
    </div>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <div class="success_con">
        <div class="con_sub">등록된 게시물이 없습니다.</div>
    </div>
    <?php }  ?>
</div>
<!-- <script>
    AOS.init();
</script> -->