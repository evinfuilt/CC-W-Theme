<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="content"<?php print $content_attributes; ?>>
<?php
	drupal_add_css(drupal_get_path('theme', 'ccw_2012') . '/css/landing.css');

//	print drupal_get_path('theme', 'ccw_2012') . '/css/landing.css';

	print '<div class="landing_wrapper">';
	print '<div id="landing_left">';
	
	$landingType = $field_landing_type[0]['taxonomy_term']->name;

	if ($landingType == 'Topic') {
		print '<h2 class="landing_header">Explore By Culture</h2>';
		$landingSub =  $content['field_topic']['#items'][0]['taxonomy_term']->name;
	} else {
		print '<h2 class="landing_header">Explore By Topic</h2>';
		$landingSub =  $content['field_culture']['#items'][0]['taxonomy_term']->name;
	}

	if (!empty($content['field_left_half'])) {
		print '<div class="landing-image-half-container">';
		print '<div class="landing-image-half">';
		foreach ($content['field_left_half']['#items'] as $entity_uri) {
			$a_field_collection_item = entity_load('field_collection_item', $entity_uri);
			foreach ($a_field_collection_item as $a_field_collection_item_object ) {
				print '<div class="image-hw-container">';
					$landingSub2 = $a_field_collection_item_object->field_lhalf_topic[und][0]['taxonomy_term']->name . $a_field_collection_item_object->field_lhalf_culture[und][0]['taxonomy_term']->name;
					print '<a href="'. $landingType .'/'.urlencode($landingSub) .'/'. urlencode($landingSub2) .'">';
					print theme_image_style(array( 'path' =>  $a_field_collection_item_object->field_lhalf_image['und'][0]['uri'], 'style_name' => 'landing_hw'));
					print '<span class="landingoverlay_hw">'. $landingSub2 .'</span>';
					print '</a>';
				print '</div>';
			}
		}
		print '<div class="clearBoth"></div>';
		print '</div>' . "\n";
		print '</div>' . "\n";
	}

	if (!empty($content['field_left_wide'])) {
		print '<div class="landing-image">';
		//Grab each entity uri (which is basically a field collection item), and load it through entity_load(). The entity type is field_collection_item.
		foreach ($content['field_left_wide']['#items'] as $entity_uri) {
			$a_field_collection_item = entity_load('field_collection_item', $entity_uri);
			//Now you have a variable with the entity object loaded in it, and you can do stuff. 
			foreach ($a_field_collection_item as $a_field_collection_item_object ) {
				$landingSub2 = $a_field_collection_item_object->field_collection_topic[und][0]['taxonomy_term']->name . $a_field_collection_item_object->field_collection_culture[und][0]['taxonomy_term']->name;
				print '<a href="'. $landingType .'/'.urlencode($landingSub) .'/'. urlencode($landingSub2) .'">';
				print theme_image_style(array( 'path' =>  $a_field_collection_item_object->field_collection_image['und'][0]['uri'], 'style_name' => 'landing_w'));
				print '<span class="landingoverlay_w">'. $landingSub2 .'</span>';
				print '</a><br/>';
			}
		}

//		print '<span class="landingoverlay_all"><a href="'. $landingType .'/'.urlencode($landingSub) .'/All">All</a></span>';

		print '</div>' . "\n"; 
	}

	print render($content['field_learn_more']);
	print '<span class="landingoverlay_more"><span class="landingoverlay_more2">Learn more about how you can help add to our culture resource library.</span></span>';

	print '</div>';
	print '</div>';
	
	print '<div class="landing_wrapper">';
	print '<div id="landing_right">';
	print '<h2 class="landing_header">Explore By Media</h2>';
	if (!empty($content['field_right_half'])) {
		print '<div class="landing-image-half-container">';
		print '<div class="landing-image-half">';
		//Grab each entity uri (which is basically a field collection item), and load it through entity_load(). The entity type is field_collection_item.
		foreach ($content['field_right_half']['#items'] as $entity_uri) {
			$a_field_collection_item = entity_load('field_collection_item', $entity_uri);
			//Now you have a variable with the entity object loaded in it, and you can do stuff. 
			foreach ($a_field_collection_item as $a_field_collection_item_object ) {
				print '<div class="image-hw-container">';
					print theme_image_style(array( 'path' =>  $a_field_collection_item_object->field_collection_right_image['und'][0]['uri'], 'style_name' => 'landing_hw'));
					print '<span class="landingoverlay_hw">'. render($a_field_collection_item_object->field_collection_right_caption['und'][0]['value']) .'</span>';
				print '</div>';
			}
		}
		print '<div class="clearBoth"></div>';
		print '</div>' . "\n";
		print '</div>' . "\n";
	}

	if (!empty($content['field_right_wide'])) {
		print '<div class="landing-image">';
		//Grab each entity uri (which is basically a field collection item), and load it through entity_load(). The entity type is field_collection_item.
		foreach ($content['field_right_wide']['#items'] as $entity_uri) {
			$a_field_collection_item = entity_load('field_collection_item', $entity_uri);
			//Now you have a variable with the entity object loaded in it, and you can do stuff. 
			foreach ($a_field_collection_item as $a_field_collection_item_object ) {
				print theme_image_style(array( 'path' =>  $a_field_collection_item_object->field_collection_w_right_image['und'][0]['uri'], 'style_name' => 'landing_w'));
				print '<span class="landingoverlay_w">'. render($a_field_collection_item_object->field_collection_right_w_caption['und'][0]['value']) .'</span>';
				print '<br/>';
			}
		}
		print '</div>' . "\n"; 
	}


	print '</div>';
	print '</div>';

?>
  </div>
</div><!-- /.node -->
