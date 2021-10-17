<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="lt_gal">
    <?php for ($i=0; $i<$list_count; $i++) { ?>
	    <div class="video">
            <iframe width="560" height="315" src="<?php echo $list[$i]['wr_link1']; ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	<?php }  ?>
    <?php if ($list_count == 0) { //동영상이 없을 때  ?>
	<div class="empty_video">게시물이 없습니다.</div>
	<?php }  ?>
</div>