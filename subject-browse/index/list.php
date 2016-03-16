<?php
$title = __('Browse Items by Subject');
echo head(array(
    'title' => $title,
    'bodyclass' => 'subject-browse browse list',
)); ?>
<div id="primary" class="subject-browse">
    <h1><?php echo __('Browse Items By Subject (%d Headings)', count($subjects)); ?></h1>
    <nav class="items-nav navigation secondary-nav">
        <?php echo public_nav_items(
        	array(
    		array('label'=>__('Browse All'), 'uri'=> url('items/browse')),
    		array('label'=>__('Browse Subjects'), 'uri'=> url('subjects/list')),
    		array('label'=>__('Browse Map'), 'uri'=> url('items/map')),
    		array('label'=>__('Browse Tags'), 'uri'=> url('items/tags')),
    	)
        ); ?>
    </nav>
    <?php
    if (count($subjects)) :
        echo $this->subjectBrowse($subjects, array('mode' => 'list'));
    else:
        echo '<p>' . __('There is no subjects.') . '</p>';
    endif;
    ?>
</div>
<?php echo foot();
