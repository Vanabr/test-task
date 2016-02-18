<?php CORE::$META['title'] = 'Товары';
while($row = $goods->fetch_assoc()){ ?>
<div class="goods_all">
  <div class="goods_img_div">
    <img class="goods_img" src="<?php echo (!empty($row['img']) ? CORE::$UPLOADED.'150x200/'.hc($row['img']) : CORE::$UPLOADED.'tovar_empty.jpg'); ?>">  
  </div>
  <div>
    <a href="/goods/more?id=<?php echo (int)$row['id']; ?>"><?php echo hc($row['title']);?></a><br>
    <?php echo hc($row['description']);?><br>
    <span class="price"><?php echo (int)$row['cost']?></span> руб.<br>
    Наличие: <?php echo ((int)$row['supply_availability'] == 1 ? 'В наличии' : 'Нет в наличии');?>
  </div>       
</div>
<?php    
}
?>
<div class="clear"></div>