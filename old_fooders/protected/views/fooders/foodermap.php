<?php /* ?> 
 <?php $map = new geomap ();
$loc = $db->get_row ( 'delivery_areas', array ('id' => fooder_location ) );

$foodermapadd = $loc ['region'] . ',' . $loc ['city'] . '<br/> ' . $loc ['state'];

$result = $map->lookup ( $foodermapadd );
$fooder_address = $feature->remove_newline ( fooder_address );

if (fooder_type == 3)
	$type = 'Sweets';
elseif (fooder_type == 2)
	$type = "Confectioners";
else
	$type = "Restaurant";
$lat = $result ['lat']; // latitude
$lng = $result ['lng']; // longitude

$map->center_lat = $lat; // set latitude for center location
$map->center_lng = $lng; // set langitude for center location
$map->zoom = 14;
$isclickable = 'true';
$title = "";
if (fooder_logo_exist != '')
	$info = "<table><tbody><tr><td><img width='50px' height='auto' src='" . fooder_logo . "'></td><td><p style='font-size:.8em;'><b>" . fooder_name . "</b><br/>Type :  " . $type . "<br>" . $fooder_address . "<br>" . $foodermapadd . "</p></td></tr></tbody></table>";
else
	$info = "<p style='font-size:.9em;'><b>" . fooder_name . "</b><br/>Type :  " . $type . "<br>" . $fooder_address . "<br/>" . $foodermapadd . "</p>";

$map->addMarker ( $lat, $lng, $isclickable, $title, $info );

echo $map->showmap ();

?>
<div id="map"
	style="scrolling: no; width: 550px; height: 500px; border: 0px;"></div>
	
	<?php /*?>