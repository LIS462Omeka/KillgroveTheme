<?php if(isset(get_view()->item)): //check if this looks like an item show page
//Taken from forum discussion listed here: http://omeka.org/forums/topic/adding-categories-to-simple-search-results ?>

<?php
//dig through the elements for display that are passed into this file
//put it all into a new array of just the elements we want
//this should let you collect the elements you want in the order you want
//follow this pattern to get more or change the order

//create variable to check if metadata element isset


$genre = metadata ($record, array ('MODS','genre'));
$date = metadata ($record, array ('MODS','originInfo_DateCreated'));
$namePart = metadata ($record, array ('MODS','name'));
$role = metadata ($record, array ('MODS','name_Role'));
$abstract = metadata ($record, array ('MODS','abstract'));
$subject = metadata ($record, array ('MODS','subject'));
$language = metadata ($record, array ('MDOS','language'));
$accessRights = metadata ($record, array ('MODS','accessCondition'));
$identifier = metadata ($record, array ('MODS','identifier'));

//create array
$wantedElements = array();
if(isset($genre)){
	$wantedElements['Genre'] = $elementsForDisplay['MODS']['genre'];
	}
if(isset($date)){
	$wantedElements['Date'] = $elementsForDisplay['MODS']['originInfo_DateCreated'];
	}
if(isset($namePart)){
	$wantedElements[$role] = $elementsForDisplay['MODS']['name_Role'];
	}
if(isset($namePart)){
	$wantedElements[$namePart] = $elementsForDisplay['MODS']['name'];
	}
if(isset($abstract)){
	$wantedElements['Description'] = $elementsForDisplay['MODS']['Abstract'];
	}
if(isset($subject)){
	$wantedElements['Subject'] = $elementsForDisplay['MODS']['subject'];
	}
if(isset($language)){
	$wantedElements['Language'] = $elementsForDisplay['MODS']['language'];
	}
if(isset($accessRights)){
	$wantedElements['Access Rights'] = $elementsForDisplay['MODS']['accessCondition'];
	}
if(isset($identifier)){
	$wantedElements['Unique Identifier'] = $elementsForDisplay['MODS']['identifier'];
	}
	
?>


<div class="element-set">
<br/>
    <?php
    //Display array
    foreach ($wantedElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->

<?php else: ?>

<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($elementName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach; ?>

<?php endif; ?>
