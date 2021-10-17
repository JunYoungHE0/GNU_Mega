<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 210;
$thumb_height = 150;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>
<div class="quick_tel">
        <ul>
        <?php
        for ($i=count($list)-1; $i>=0; $i--) {
        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

        if($thumb['src']) {
            $img = $thumb['ori'];
        } else {
            $img = G5_IMG_URL.'/no_img.png';
            $thumb['alt'] = '이미지가 없습니다.';
        }
        $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
        $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
        ?>
            <li>
                <a href="<?php echo $list[$i]['wr_link1']; ?>">
                    <span><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?></span><strong><?php echo $list[$i]['wr_content'] ?></strong>
                </a>
            </li>
        <?php }  ?>
        <?php if ($list_count == 0) { //게시물이 없을 때  ?>
            <li>게시물이 없습니다.</li>
        <?php }  ?>
        </ul>
</div>