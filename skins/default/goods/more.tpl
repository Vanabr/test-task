<?php 
CORE::$META['title'] = $row['meta_title'];
CORE::$META['description'] = $row['meta_description'];
CORE::$META['keywords'] = $row['meta_keywords'];
?>
<div class="container">  
  <div class="good_item">
    <img class="goods_img" 
    src="<?php echo (!empty($row['big_img']) ? CORE::$UPLOADED.'300x400/'.hc($row['big_img']) : CORE::$UPLOADED.'tovar_empty.jpg'); ?>">    
  </div>
  <div>
    <h2><?php echo hc($row['title']); ?></h2>
    <?php echo hc($row['text']);?><br>
    <span class="price"><?php echo (int)$row['cost']?></span> руб.<br>
    Наличие: <?php echo ((int)$row['supply_availability'] == 1 ? 'В наличии' : 'Нет в наличии');?><br>
    <a href="/goods">Назад</a>
  </div>
  <div class="clear"></div>
</div>