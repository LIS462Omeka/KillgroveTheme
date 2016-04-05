<?php if(isset(get_view()->item)): //check if this looks like an item show page
//Taken from forum discussion listed here: http://omeka.org/forums/topic/adding-categories-to-simple-search-results ?>

<?php
//dig through the elements for display that are passed into this file
//put it all into a new array of just the elements we want
//this should let you collect the elements you want in the order you want
//follow this pattern to get more or change the order

//create variable to check if metadata element isset


$genre = metadata ($record, array ('MODS','genre'));
$date = metadata ($record, array ('MODS','originInfo_datecreated'));
$place = metadata ($record, array ('MODS','originInfo_place'));
$abstract = metadata ($record, array ('MODS','abstract'));
$subject1 = metadata ($record, array ('MODS','subject1'));
$subject2 = metadata ($record, array ('MODS','subject2'));
$subject3 = metadata ($record, array ('MODS','subject3'));
$subject4 = metadata ($record, array ('MODS','subject4'));
$language = metadata ($record, array ('MODS','language'));
$accessRights = metadata ($record, array ('MODS','accessCondition'));
$identifier = metadata ($record, array ('MODS','identifier'));

$name1Part = metadata ($record, array ('MODS','name1'));
$role1 = metadata ($record, array ('MODS','name1_role'));
$name2Part = metadata ($record, array ('MODS','name2'));
$role2 = metadata ($record, array ('MODS','name2_role'));
$name3Part = metadata ($record, array ('MODS','name3'));
$role3 = metadata ($record, array ('MODS','name3_role'));

//pretty date setup
$dateElements = array();
if(isset($date)){
    $dateElements['Date'] = $elementsForDisplay['MODS']['originInfo_datecreated'];
}

//create array
$wantedElements = array();
if(isset($genre)){
    $wantedElements['Genre'] = $elementsForDisplay['MODS']['genre'];
}
if(isset($abstract)){
    $wantedElements['Description'] = $elementsForDisplay['MODS']['abstract'];
}

//abanadoned subject array

/*$subjectElements = array();
if(isset($subject1)){
	$subjectElements = metadata ($record, array ('MODS','subject1'));
	}
if(isset($subject2)){
	$subjectElements = metadata ($record, array ('MODS','subject2'));
	}
if(isset($subject3)){
	$subjectElements = metadata ($record, array ('MODS','subject3'));
	}
if(isset($subject4)){
	$subjectElements = metadata ($record, array ('MODS','subject4'));
	}*/

/*if(isset($name1Part)){
	$wantedElements[$role1] = $elementsForDisplay['MODS']['name1'];
	}
if(isset($name2Part)){
	$wantedElements[$role2] = $elementsForDisplay['MODS']['name2'];
	}
if(isset($name3Part)){
	$wantedElements[$role3] = $elementsForDisplay['MODS']['name3'];
	}*/

//array for rest of elements
$moreElements = array();
if(isset($language)){
    $moreElements['Language'] = $elementsForDisplay['MODS']['language'];
}
if(isset($accessRights)){
    $moreElements['Access Rights'] = $elementsForDisplay['MODS']['accessCondition'];
}
if(isset($identifier)){
    $moreElements['Unique Identifier'] = $elementsForDisplay['MODS']['identifier'];
}
if(isset($place)){
    $moreElements['Sent From'] = $elementsForDisplay['MODS']['originInfo_place'];
}

?>
<div class="element-set">
    <?php foreach ($dateElements as $elementName => $elementInfo): ?>
    <div id="<?php echo text_to_id(html_escape("$elementName")); ?>" class="element">
        <?php
        echo "<h3>Date</h3>";?>
        <div class="element-text">
            <?php
            if(isset($date)){
                echo date('F d, Y',strtotime($date));
            }
            ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
      
            <div class="element-set">
                <?php foreach ($wantedElements as $elementName => $elementInfo): ?>
                    <div id="<?php echo text_to_id(html_escape("$elementName")); ?>" class="element">
                        <h3><?php echo html_escape(__($elementName)); ?></h3>
                        <?php foreach ($elementInfo['texts'] as $text): ?>
                            <div class="element-text"><?php echo $text; ?></div>
                        <?php endforeach; ?>
                    </div><!-- end element -->
                <?php endforeach; ?>
            </div><!-- end element-set -->

        </div>
        <div class="element-set">
            <?php
            if(isset($role1)){
                echo "<h3>$role1</h3>";
            }
            if(isset($name1Part)){
                echo "<div class='element-text'>".$name1Part."</div>";
            }
            if(isset($role2)){
                echo "<h3>$role2</h3>";
            }
            if(isset($name2Part)){
                echo "<div class='element-text'>".$name2Part."</div>";
            }
            if(isset($name3Part)){
                echo "<div class='element-text'>".$name3Part."</div>";
            }
            ?>


            <div class="element-set">
                <?php
                echo "<h3>Subjects</h3>";?>
                <div class="element-text">
                    <?php
                    if(isset($subject1)){
                        echo $subject1."<br/>";
                    }
                    if(isset($subject2)){
                        echo $subject2."<br/>";
                    }
                    if(isset($subject3)){
                        echo $subject3."<br/>";
                    }
                    if(isset($subject4)){
                        echo $subject4."<br/>";
                    }
                    ?>
                </div>

                <div class="element-set">
                    <?php foreach ($moreElements as $elementName => $elementInfo): ?>
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
