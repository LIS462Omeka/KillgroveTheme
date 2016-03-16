<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle, 'bodyclass'=>'items tags'));
?>

<h1><?php echo $pageTitle; ?></h1>

<nav class="navigation items-nav secondary-nav">
    <?php echo public_nav_items(
    	array(
    		array('label'=>__('Browse All'), 'uri'=> url('items/browse')),
    		array('label'=>__('Browse Subjects'), 'uri'=> url('subjects/list')),
    		array('label'=>__('Browse Map'), 'uri'=> url('items/map')),
    		array('label'=>__('Browse Tags'), 'uri'=> url('items/tags')),
    	)
    ); ?>
</nav>

<?php echo tag_cloud($tags, 'items/browse'); ?>

<?php echo foot(); ?>
