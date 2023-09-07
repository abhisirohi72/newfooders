<?php

if(is_array($get_menus))
	foreach($get_menus as $val)
{
	if(str_replace(" ", "-", $val['name'])===$menu_name)
	{
		$get_menu_details=array('name'=>$val['name'],'tags'=>$val['tags'],'description'=>$val['description']);
		$get_products=$db->get_all('fooders_products',array('menu_id'=>$val['id'],'status'=>1));
	}
}

?>
			<div class="row-fluid">
				<div class="span12" style="padding-top:10px;">
				<div class="span8">
					<?php if($get_menu_details['name']){ echo "<h4 class='rest-menu-title'><i class='icon-only icon-align-justify fooder-menu-icon'></i>".$get_menu_details['name']."</h4>";}?>
					<?php if($get_menu_details['description']){ 
						echo "<p class='menu-desc'>".$get_menu_details['description']."</p>";
					}
					if($get_menu_details['tags']){
						echo "<p class='menu-desc'>".$get_menu_details['tags']."</p>";
					}  
					?>
			</div>	
			<div class="span4">
			<input type="text" name="categ_search" id="filter" value="" placeholder="Search Dishes" style="width:90%;">
			</div>	
			</div>
			</div>
		<div class="hr-menu"></div>	
		
<?php if(is_array($get_products) && count($get_products)!=0) {foreach($get_products as $key){

	?>
	
<div class="<?php if(fooder_status==='1' && $key['price']!=0 && $key ['price']!='') echo "basket-modal";elseif(fooder_status=='0') echo "closed-fooder" ?> list" id="<?php echo base64_encode($key['id'].'_'.$key['menu_id'].'_'.$key['fooder_id'].'_'.$key['name'].'_'.$key['price'].'_'.$key['proprice'].'_'.fooder_title); ?>">
<div class="row-fluid product-strip" id="product-hover_<?php echo $key['id'];?>">
				<div class="span12" style="padding-top: 8px;">
					<div class="resto-box-product">
				   <div class="span9">
	   <?php if($key['name']){ echo "<h4>".$key['name']."</h4>"; }?>
	   <?php if($key['tags']){ echo "<p class='rest-product-tags'>".$key['tags']."</p>"; }?>
	   </div>
	<div class="span3 price-center">
	<?php 
	if ($key ['proprice']) {
		echo "<span rel='tooltip' title='promotional price' data-placement='top' class='product-proprice'><i class='icon-inr' style='line-height:17px;display:inline;'></i>  " . $key ['proprice'] . "</span><span class='product-price'><i class='icon-inr' style='line-height:17px;display:inline;'></i>  <strike>" . $key ['price'] . "</strike></span>";
		 echo '<a href="#" class="basket-text">Add To Cart</a>';
	} else {
		
		if($key ['price']=='' || $key ['price']==0)
			echo "<span class='product-proprice' style='font-size:10px;'>Price Not Available</span>";
		else
			echo  "<span class='product-proprice'> <i class='icon-inr product-icon'></i> ".$key ['price'] . "</span>";
		    echo '<a href="#" class="basket-text">Add To Cart</a>';
	}?>
	</div>	
						
					</div>
					<!-- <div class="span3">
						<a href="#"><button class="btn btn-mini "><i class="icon-shopping-cart"></i> Add To Cart</button></a>
					</div> -->
			</div>
</div>
<hr class="dotted">
</div>		
			
<script type="text/javascript">
$("#product-hover_<?php echo $key['id'];?>").hover(
        function () {
            $(this).css({"background-color":"#EDEDED"});
        },
        function () {
        	$(this).css({"background-color":"transparent"});
        }
    );
</script>
			
	<?php }}
	else{
		echo "<div class='product-null'>No Product Available</div>";
	} ?>


	