<?php 
queue_css_file('geolocation-items-map');

$title = __('Browse Items on the Map') . ' ' . __('(%s total)', $totalItems);
echo head(array('title' => $title, 'bodyclass' => 'map browse'));
?>

<h1><?php echo $title; ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(
    	array(
    		array('label'=>__('Browse All'), 'uri'=> url('items/browse')),
    		array('label'=>__('Browse Subjects'), 'uri'=> url('subjects/list')),
    		array('label'=>__('Browse by Location'), 'uri'=> url('items/map')),
    		//array('label'=>__('Browse Tags'), 'uri'=> url('items/tags')),
    	)
    ); ?>
</nav>

<?php
echo item_search_filters();
echo pagination_links();
?>

<div id="geolocation-browse">
    <?php echo $this->googleMap('map_browse', array('list' => 'map-links', 'params' => $params)); ?>
    <div id="map-links"><h2><?php echo __('Find An Item on the Map'); ?></h2></div>
</div>

<?php echo foot(); ?>
