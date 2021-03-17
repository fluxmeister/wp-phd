<?php
/* 	VWS Prototype Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2021, FluxMeister
*/
 
$fconf = '';
foreach (range(1, 3) as $fboxn) { 
	$featured = '';
	$ftitle1 = ''; $ftitle1 = esc_textarea(travel_get_option('featured01-title' . $fboxn, ''));
	$ftitle2 = ''; $ftitle2 = esc_textarea(travel_get_option('featured02-title' . $fboxn, ''));
	if($ftitle2) $ftitle2 = '<span>'.$ftitle2.'</span>';
	$flink = ''; $flink = esc_url(travel_get_option('featured-link' . $fboxn, ''));
	$fimage = ''; $fimage = esc_url(travel_get_option('featured-image' . $fboxn, '')); 
	$fdes = ''; $fdes = wp_kses_post(travel_get_option('featured-description' . $fboxn, ''));
	
	if($ftitle1 || $ftitle2 ) $featured .= '<h2>'.$ftitle1.$ftitle2.'</h2>';
	if($flink) $featured .= '<a href="'.$flink.'">';
	if($fimage) $featured .= '<img src="'.$fimage.'" />';
	if($flink) $featured .= '</a>';
	if($fdes) $featured .= '<p>'.$fdes.'</p>';
	if($featured) $fconf .= ' <span class="featured-box">'.$featured.'</span>';
}
if($fconf) echo '<div class="featured-boxs">'.$fconf.'</div>';


$fconf = '';
foreach (range(1, 3) as $fboxn2) { 
	$featured = '';
	$ftitle1 = ''; $ftitle1 = esc_textarea(travel_get_option('fcontent01-title' . $fboxn2, ''));
	$ftitle2 = ''; $ftitle2 = esc_textarea(travel_get_option('fcontent02-title' . $fboxn2, ''));
	if($ftitle2) $ftitle2 = '<span>'.$ftitle2.'</span>';
	$flink = ''; $flink = esc_url(travel_get_option('fcontent-link' . $fboxn2, ''));
	$fimage = ''; $fimage = esc_url(travel_get_option('fcontent-image' . $fboxn2, '')); 
	$fdes = ''; $fdes = wp_kses_post(travel_get_option('fcontent-description' . $fboxn2, ''));
	
	if($ftitle1 || $ftitle2 ) $featured .= '<h2>'.$ftitle1.$ftitle2.'</h2>';
	if($flink) $featured .= '<a href="'.$flink.'">';
	if($fimage) $featured .= '<img class="fcon-image" src="'.$fimage.'" />';
	if($flink) $featured .= '</a>';
	if($fdes) $featured .= '<p>'.$fdes.'</p>';
	if($featured) $fconf .= ' <span class="featured-content">'.$featured.'</span>';
}
if($fconf) echo '<div class="featured-contents">'.$fconf.'</div>';
?>

<div class="sep2">sep</div>