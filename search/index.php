<?php
$pageTitle = __('Search') . ' ' . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>
<h1><?php echo $pageTitle; ?></h1>
<?php echo search_filters(); ?>
<?php if ($total_results): ?>
<?php echo pagination_links(); ?>
<table id="search-results">
    <thead>
        <tr>
            <th><h2><?php echo __('Title');?></h2></th>
            <th><h2><?php echo __('Date');?></h2></th>
            <th><h2><?php echo __('Description');?></h2></th>
            
        </tr>
    </thead>
    <tbody>
        <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
        <?php foreach (loop('search_texts') as $searchText): ?>
        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
        <?php $recordType = $searchText['record_type']; ?>
        <?php set_current_record($recordType, $record); ?>
        <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
             <td>
                <?php if ($recordImage = record_image($recordType, 'square_thumbnail')): ?>
                    <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
                <?php endif; ?>
                <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
            </td>
            <td><div style="width:120px;">
            	<?php 
					$date = metadata ($record, array ('MODS','Date Created'));?>
					<?php if ($date = metadata($record, array('MODS', 'Date Created'))): ?>
	    				<?php echo "<strong>Created: <br />"; ?>
		  				<?php if ($newdate = DateTime::createFromFormat('Y-m-d',$date)): 	
		  						 echo "{$newdate->format('M. j, Y')}</strong>";	
		  					  elseif ($newdate = DateTime::createFromFormat('Y-m',$date)):	
		  						 echo "{$newdate->format('M. Y')}</strong>";
		  					  else:
		  		 				echo "{$date}</strong>";
						endif;
						endif;
				?>
            </div></td>
            <td>
            	<?php echo metadata($record, array('MODS', 'Abstract'), array('snippet'=>200));?>
            </td>
        
           
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php echo pagination_links(); ?>
<?php else: ?>
<div id="no-results">
    <p><?php echo __('Your query returned no results.');?></p>
</div>
<?php endif; ?>
<?php echo foot(); ?>