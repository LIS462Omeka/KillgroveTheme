<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div id="primary">

   <!--Homepage Image-->
	<div class=imageHome><img alt="Ethel A. Killgrove sits next to Mr. Harold Braden in the radio studio." src="<?php echo img('homepage.jpg'); ?>" /><br /><span style="font-size: 75%;">Image courtesy of SCUA - UMass</span></div> 
	
	<br/>
	<br/>
	<br/>  	
   	
	<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
		
    <p><?php echo $homepageText; ?></p>
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Collection')): ?>
   
    <!-- Featured Collection -->
    <div id="featured-collection">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>	
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
   
    <!-- Featured Exhibit 
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>-->
    <?php endif; ?>

</div><!-- end primary -->

<div id="secondary">
	<br/>
	<!-- Feature Items -->
	<?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item --> 
    <div id="featured-item">
        <h2><?php echo __('Featured Items'); ?></h2>
        <?php echo random_featured_items(3); ?>
    </div> <!--end featured-item-->
    <?php endif; ?>
    	
    <!--<?php
    $recentItems = get_theme_option('Homepage Recent Items');
    if ($recentItems === null || $recentItems === ''):
        $recentItems = 3;
    else:
        $recentItems = (int) $recentItems;
    endif;
    if ($recentItems):
    ?>
    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php echo recent_items($recentItems); ?>
        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>end recent-items 
    <?php endif; ?> -->

    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div><!-- end secondary -->

<?php echo foot(); ?>
