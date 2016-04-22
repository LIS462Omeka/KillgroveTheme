<?php if(isset(get_view()->item)): //check if this looks like an item show page
//Taken from forum discussion listed here: http://omeka.org/forums/topic/adding-categories-to-simple-search-results ?>

    <?php
//dig through the elements for display that are passed into this file
//put it all into a new array of just the elements we want
//this should let you collect the elements you want in the order you want
//follow this pattern to get more or change the order
//create variable to check if metadata element isset
    $genre = metadata ($record, array ('MODS','Genre'));
    $date = metadata ($record, array ('MODS','Date Created'));
    $place = metadata ($record, array ('MODS','Place Created'));
    $abstract = metadata ($record, array ('MODS','Abstract'));
    $subject = metadata ($record, array ('MODS','Subject'));
    $language = metadata ($record, array ('MODS','Language'));
    $accessRights = metadata ($record, array ('MODS','Access Rights'));
    $identifier = metadata ($record, array ('MODS','Identifier'));
    $creator = metadata ($record, array ('MODS','Creator'));
    $creatorDate  = metadata ($record, array ('Dublin Core','Creator'));
    $addressee = metadata ($record, array ('MODS','Addressee'));
    $addrDates = metadata ($record, array ('Dublin Core','Contributor'));
    $depicted = metadata ($record, array ('MODS','Depicted'));
    $depctDates = metadata ($record, array ('Dublin Core','Contributor'));
	?>
<br/>
    
<div class="element-set">
	<div class="element-text">
         <?php
         	if(isset($date)){	
         	    echo "<span class='recordElement'><strong>Date: </span>";
			    if($newdate = DateTime::createFromFormat('Y-m-d',$date)):
		  	        echo "{$newdate->format('F j, Y')}</strong>";
		  	    elseif($newdate = DateTime::createFromFormat('Y-m',$date)):
		  	        echo "{$newdate->format('F Y')}</strong>";	
		        else:	
		  		    echo "{$date}</strong>";
         	    endif;
         	}
         ?>
</div><!-- end element -->
	
<div class="element-set">
  <div class="element-text">
  <?php
    if(isset($genre)){
    echo "<span class='recordElement'><strong>Genre: </strong></span>";
    echo $genre;
    }
    ?>
  </div>
</div>

<div class="element-set">
  <?php
    if(isset($abstract)){
      echo "<span class='recordElement'><strong>Description: </strong></span>";
      echo "<div class='element-text'>".$abstract."</div>";
    }
  ?>
  </div>
</div>

<div class="element-set">
	<div class="element-text">
    <?php
    	if(isset($creator)){
        	echo "<span class='recordElement'><strong>Creator: </strong></span>";
            echo $creatorDate;
        } 
        ?>
	</div>
</div>

<div class="element-set">

<?php
//ADDRESSEE array
	$addresseeElements = array();
	 if(isset($addressee)){
      	$addresseeElements['Addressee(s)'] = $elementsForDisplay['Dublin Core']['Contributor'];
    }
    	
//Display array
foreach ($addresseeElements as $elementName => $elementInfo): ?>
	<div id="<?php echo text_to_id(html_escape("$elementName")); ?>" class="element">
	<span class='recordElement'><strong><?php echo html_escape(__($elementName.": ")); ?></strong></span>
	<br/>
	<br/>	
	<?php foreach ($elementInfo['texts'] as $text): ?>
           <?php echo "{$text}<br/>"; ?>

    	<?php endforeach; ?>
    	<br/>
        </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set --> 

<div class="element-set">

<?php
//DEPICTED array
	$depictedElements = array();
	 if(isset($depicted)){
    	$depictedElements['Depicted'] = $elementsForDisplay['Dublin Core']['Contributor'];
    }
    	
//Display array
foreach ($depictedElements as $elementName => $elementInfo): ?>
	<div id="<?php echo text_to_id(html_escape("$elementName")); ?>" class="element">
	<span class='recordElement'><strong><?php echo html_escape(__($elementName.": ")); ?></strong></span>
	<br/>
	<br/>
	<?php foreach ($elementInfo['texts'] as $text): ?>
        <?php echo $text."<br/>"; ?>
    <?php endforeach; ?>
    	<br/>
        </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set --> 

<div class="element-set">

<?php
//SUBJECT array
	$subjectElements = array();
	 if(isset($subject)){
    	$subjectElements['Subjects'] = $elementsForDisplay['MODS']['Subject'];
    }
    	
//Display array
foreach ($subjectElements as $elementName => $elementInfo): ?>
	<div id="<?php echo text_to_id(html_escape("$elementName")); ?>" class="element">
	<span class='recordElement'><strong><?php echo html_escape(__($elementName.": ")); ?></strong></span>
	<br/>
	<br/>
	<?php foreach ($elementInfo['texts'] as $text): ?>
        <?php echo $text."<br/>"; ?>
    <?php endforeach; ?>
    	<br/>
        </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set --> 

<div class="element-set">
	<div class="element-text">
    <?php
    	if(isset($place)){
        	echo "<span class='recordElement'><strong>Sent from: </strong></span>";
            echo $place;
        }
    ?>
	</div>
</div>

<div class="element-set">
	<div class="element-text">
    <?php
    	if(isset($language)){
        	echo "<span class='recordElement'><strong>Language: </strong></span>";
            echo $language;
        }
    ?>
	</div>
</div>

<div class="element-set">
	<div class="element-text">
    <?php
    	if(isset($identifier)){
        	echo "<span class='recordElement'><strong>ID: </strong></span>";
            echo $identifier;
        }
    ?>
	</div>
</div>

<div class="element-set">
  <?php
    if(isset($accessRights)){
      echo "<span class='recordElement'><strong>Access Rights: </strong></span>";
      echo "<div class='element-text'>".$accessRights."</div>";
    }
  ?>
</div>

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