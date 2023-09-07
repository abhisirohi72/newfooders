<?php
$arr = $link->hrefquery ();
if ($arr [0] == 'value') {
	$db->group_by = '`city`';
	$query = $db->get_all ( "delivery_areas", array ("id" => $arr [1] ) );
	?>
<select name="city" onchange="cities(this.value);">
	<option value="0" selected="selected">--------- Select City ---------</option>
	<?php
	foreach ( $query as $row ) {
		?>
			<option value="<?php echo $row['city'];?>"><?php echo $row['city'];?></option>
		<?php
	}
	?>	
	</select>
<?php
}
if ($arr [0] == 'city') {
	$arr = $link->hrefquery ();
	$query = $db->get_all ( "delivery_areas", array ("city" => $arr [1] ) );
	?>
<select name="region">
	<option value="0" selected="selected">--------- Select Region ---------</option>
			<?php
	foreach ( $query as $row ) {
		?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['region'];?></option>
				<?php
	}
	?>	
			</select>
<?php
}
?>