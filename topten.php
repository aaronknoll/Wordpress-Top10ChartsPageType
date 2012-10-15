<?php
/*
Plugin Name: Top 10 Charts Post Type
Plugin URI: http://theginisin.com
Description: Creates a page type called "top 10" which looks like Billboard chart
Version: 0.1
Author: Aaron Knoll
Author URI: http://aaronknoll.com
License: GPL
*/

add_action( 'init', 'top10_create_post_type' );
wp_enqueue_style( 'top10-styles', plugin_dir_url( __FILE__ ) . 'css/top10.css', array(), '0.1', 'screen' );

//add_action('add_meta_boxes', 'top10_add_meta_boxes');
/* Define the custom box */
add_action( 'add_meta_boxes', 'top10_how_big_of_a_countdown' );
add_action( 'add_meta_boxes', 'top10_add_custom_box' );

// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'top10_add_custom_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'top10_save_postdata' );


//ACTIONS, HOOKS AND FILTERS. 
/* Runs when plugin is activated */
register_activation_hook(__FILE__,'top10_install'); 
/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'top10_remove' );


//FUNCTIONS, OBJECTS AND OTHER EPHEMERA
function top10_install() {
/* Creates new database field */
//add_option('omekafeedpull_omekaroot', '/omeka', '', 'yes');
}

function top10_remove() {
/* Deletes the database field */
//delete_option('omekafeedpull_omekaroot');
}


function top10_create_post_type() {
	register_post_type( 'charts',
		array(
			'labels' => array(
				'name' => __( 'Charts' ),
				'singular_name' => __( 'Chart' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}


/* Adds a box to the main column on the Post and Page edit screens */
function top10_how_big_of_a_countdown() {
    add_meta_box( 
        'top10_howbigid',
        __( 'How many entries in your countdown>', 'top10_textdomain' ),
        'top10_howmany_custombox',
        'charts' 
    );
}

/* Adds a box to the main column on the Post and Page edit screens */
function top10_add_custom_box() {
    add_meta_box( 
        'top10_sectionid',
        __( 'Make your Top 10 Countdown', 'top10_textdomain' ),
        'top10_inner_custom_box',
        'charts' 
    );
}


function top10_inner_custom_box( $post ) {
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'top10_noncename' );
  // The actual fields for data entry
  $post_id = get_the_ID(); 
  $length = get_post_meta($post_id, 'top10_length', true); 
  for($x=1;$x<=$length;$x++)
  	{  top10_count_up($x);	}

}

/* Prints the box content */
function top10_howmany_custombox( $post ) {
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'top10_noncename' );
  // The actual fields for data entry
		//for each version of $x, echo a single instance of the block of
		//fields. 
		?>
		<?php 
		$post_id = get_the_ID();  
		$length = get_post_meta($post_id, 'top10_length', true); 
		if(!$length){$length = "10";}
		?>
		
		<fieldset>
				<legend>How long is your countdown? enter 5, 10 or 20</legend>
				 	<label for="top10_length">Length of Countdown</label>
					<input type="text" id="top10_length" name="top10_length" value="<?php echo $length; ?>"/>			
		<?
		
}

function top10_count_up($x)
	{
		//for each version of $x, echo a single instance of the block of
		//fields. 
		
		$valuearray = array("title", "subtitle", "link", "lastweek", "2week", "mover", "debut", "description");
		$post_id = get_the_ID();  

	 	foreach($valuearray as $prefix)
			{
			$variablename	=	"top10_" . $prefix ."". $x;	
			//echo "$variablename";//debug
			$$variablename = get_post_meta($post_id, $variablename, true); 
			//echo ${$variablename};	//debug
			} 
		include "displayform.php";
		
	}

/* When the post is saved, saves our custom data */
function top10_save_postdata( $post_id ) {
	//add the top 10 length. this variable drives how many entries we have to
	//submit overall.
  	if(add_post_meta($post_id, 'top10_length', $_POST['top10_length'], true))
		{}
	else
		{update_post_meta($post_id, 'top10_length', $_POST['top10_length']);}
	
	//NOW LET's submit all the other fields. 
	$iteratormax	=	 $_POST['top10_length'];
	for($x=1;$x<=$iteratormax;$x++)
		{
		top_cycle_savedata($post_id, $x);
		}
}

function top_cycle_savedata($post_id, $x)
	{
	//$x is the iteration variable.	
	//here's our variable categories....
		// top10_title$x, top10_subtitle$x, top10_link$x
		// top10_lastweek$x, top10_2week$x, top10_mover$x
		// top10_debut$x
	//for each $x, this gets called once to update/save the meta
	$valuearray = array("title", "subtitle", "link", "lastweek", "2week", "mover", "debut", "description");
	
	foreach($valuearray as $prefix)
		{
		$valuename	=	"top10_". $prefix ."". $x ."";
		if(add_post_meta($post_id, $valuename, $_POST[$valuename], true))
			{}
		else
			{update_post_meta($post_id, $valuename, $_POST[$valuename]);}	
		}
}
	

?>
