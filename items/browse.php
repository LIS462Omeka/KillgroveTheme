<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(
    	array(
    		array('label'=>__('Browse All'), 'uri'=> url('items/browse')),
    		array('label'=>__('Browse Subjects'), 'uri'=> url('subjects/list')),
    		array('label'=>__('Browse By Location'), 'uri'=> url('items/map')),
    		//array('label'=>__('Browse Tags'), 'uri'=> url('items/tags')),
    	)
    ); ?>
</nav>

<?php echo item_search_filters(); ?>

<?php echo pagination_links(); ?>

<?php if ($total_results > 0): ?>

<?php
$sortLinks[__('Title')] = 'MODS,Title';
$sortLinks[__('Genre')] = 'MODS,Genre';
$sortLinks[__('Date Created')] = 'MODS,Date Created';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php endif; ?>

<?php foreach (loop('items') as $item): ?>
<div class="item hentry">
    <p style="font-size:1.35em; line-height:150%"><?php echo link_to_item(metadata('item', array('MODS', 'Title')), array('class'=>'permalink')); ?></p>
    <div class="item-meta">
    <?php if (metadata('item', 'has files')): ?>
    <div class="item-img" style=margin-bottom:6em;">
        <div id=browseImage><?php echo link_to_item(item_image('square_thumbnail')); ?></div>
    </div>
    <?php endif; ?>
    
    <div class="item-description">
    <?php if ($date = metadata('item', array('MODS', 'Date Created'))): ?>
	    <?php echo '<strong>Date Created: '; ?>
		  		<?php if ($newdate = DateTime::createFromFormat('Y-m-d',$date)): ?>	
		  			<?php echo "{$newdate->format('F j, Y')}</strong>"; ?>	
		  		<?php elseif ($newdate = DateTime::createFromFormat('Y-m',$date)): ?>	
		  			<?php echo "{$newdate->format('F Y')}</strong>"; ?>	
		  		<?php else: ?>	
		  		 		<?php echo "{$date}</strong>"; ?>	
	<?php endif; ?>
	<?php endif; ?>
    <br/>
    <br/>
    <?php if ($description = metadata('item', array('MODS', 'Abstract'), array('snippet'=>250))): ?>
   	<?php echo '<b>Description:</b> ' . $description; ?>
    <?php endif; ?>
	</div>
	
   <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

    </div><!-- end class="item-meta" -->
</div><!-- end class="item hentry" -->
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
