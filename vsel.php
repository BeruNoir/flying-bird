<?php
/*
 * Plugin Name: Flying Bird
 * Description: Plugin Wordpress permettant de générer des évènements (basé sur Very Simple Event List).
 * Version: 14.1
 * Author: Guido & BeruNoir
 * Author URI: https://github.com/BeruNoir/flying-bird
 * License: GNU General Public License v3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: flying-bird
 */

// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// enqueue css script
function vsel_frontend_scripts() {
	wp_enqueue_style( 'vsel_style', plugins_url('/css/vsel-style.min.css',__FILE__ ) );
}
add_action('wp_enqueue_scripts', 'vsel_frontend_scripts');

// the sidebar widget
function register_vsel_widget() {
	register_widget( 'vsel_widget' );
}
add_action( 'widgets_init', 'register_vsel_widget' );

// set local timestamp
function vsel_local_timestamp() {
	$current_date = current_datetime();
	$var = $current_date->setTime( 0, 0, 0, 0);
	$today = $var->getTimestamp()+$var->getOffset();
	return $today;
}

// set utc timezone
function vsel_utc_timezone() {
	$time_zone = new DateTimeZone('UTC');
	return $time_zone;
}

// set date format for date input fields
function vsel_input_dateformat() {
	$dateformat_input = get_option('date_format');
	if ($dateformat_input == 'j F Y' || $dateformat_input == 'd/m/Y' || $dateformat_input == 'd-m-Y') {
		$dateformat_input = 'd-m-Y';
	} else {
		$dateformat_input = 'Y-m-d';
	}
	return $dateformat_input;
}

// set date format for datepicker
function vsel_datepicker_dateformat() {
	$dateformat = get_option('date_format');
	if ($dateformat == 'j F Y' || $dateformat == 'd/m/Y' || $dateformat == 'd-m-Y') {
		$dateformat = 'dd-mm-yy';
	} else {
		$dateformat = 'yy-mm-dd';
	}
	return $dateformat;
}

// enqueue datepicker script
function vsel_enqueue_date_picker() {
	// set global
	global $wp_locale;
	global $post_type;
	// end set global
	if( 'event' != $post_type )
	return;
	wp_enqueue_script( 'vsel_datepicker_script', plugins_url( '/js/vsel-datepicker.js' , __FILE__ ), array('jquery', 'jquery-ui-datepicker') );
	wp_enqueue_style( 'vsel_datepicker_style', plugins_url( '/css/vsel-datepicker.min.css',__FILE__ ) );
	// datepicker args
	$vsel_datepicker_args = array(
		'dateFormat' => vsel_datepicker_dateformat()
	);
	// localize script with data for datepicker
	wp_localize_script( 'vsel_datepicker_script', 'objectL10n', $vsel_datepicker_args );
}
add_action( 'admin_enqueue_scripts', 'vsel_enqueue_date_picker' );

// create event post type
function vsel_custom_postype() {
	$disable_public = get_option('vsel-setting-60');
	if ( $disable_public == 'yes' ) {
		$public_event = false;
	} else {
		$public_event = true;
	}
	$disable_archive = get_option('vsel-setting-48');
	if ( $disable_archive == 'yes' ) {
		$has_archive = false;
	} else {
		$has_archive = true;
	}
	$disable_menu = get_option('vsel-setting-50');
	if ( $disable_menu == 'yes' ) {
		$show_in_menu = false;
	} else {
		$show_in_menu = true;
	}
	$custom_slug = get_option('vsel-setting-46');
	if ( !empty($custom_slug) ) {
		$event_slug = $custom_slug;
	} else {
		$event_slug = 'event';
	}
	$vsel_labels = array(
		'name' => esc_attr__( 'Évènements', 'flying-bird' ),
		'singular_name' => esc_attr__( 'Évènement', 'flying-bird' ),
		'all_items' => esc_attr__( 'Tous les évènements', 'flying-bird' ),
		'add_new_item' => esc_attr__( 'Ajouter un évènement', 'flying-bird' ),
		'add_new' => esc_attr__( 'Nouveau évènement', 'flying-bird' ),
		'new_item' => esc_attr__( 'Nouveau évènement', 'flying-bird' ),
		'edit_item' => esc_attr__( 'Éditer évènement', 'flying-bird' ),
		'view_item' => esc_attr__( 'Consulter évènement', 'flying-bird' ),
		'search_items' => esc_attr__( 'Rechercher évènement', 'flying-bird' ),
		'not_found' => esc_attr__( 'Aucun évènement trouvé', 'flying-bird' ),
		'not_found_in_trash' => esc_attr__( 'Aucun évènement trouvé dans la corbeille', 'flying-bird' )
	);
	$vsel_args = array(
		'labels' => $vsel_labels,
		'menu_icon' => 'dashicons-calendar-alt',
		'public' => $public_event,
		'can_export' => true,
		'show_in_nav_menus' => $show_in_menu,
		'has_archive' => $has_archive,
		'show_ui' => true,
		'show_in_rest' => true,
		'capability_type' => 'post',
		'taxonomies' => array( 'event_cat' ),
		'rewrite' => array( 'slug' => esc_attr($event_slug) ),
 		'supports' => array( 'title', 'thumbnail', 'page-attributes', 'custom-fields', 'editor' )
	);
	register_post_type( 'event', $vsel_args );
}
add_action( 'init', 'vsel_custom_postype' );

// create event categories
function vsel_taxonomy() {
	$disable_menu = get_option('vsel-setting-50');
	if ( $disable_menu == 'yes' ) {
		$show_in_menu = false;
	} else {
		$show_in_menu = true;
	}
	$custom_slug = get_option('vsel-setting-47');
	if ( !empty($custom_slug) ) {
		$cat_slug = $custom_slug;
	} else {
		$cat_slug = 'event_cat';
	}
	$disable_cats_column = get_option('vsel-setting-55');
	if ( $disable_cats_column == 'yes' ) {
		$cats_column = false;
	} else {
		$cats_column = true;
	}
	$vsel_cat_args = array(
		'label' => esc_attr__( 'Catégories des évènements', 'flying-bird' ),
		'hierarchical' => true,
		'show_in_nav_menus' => $show_in_menu,
		'show_admin_column' => $cats_column,
		'show_in_rest' => true,
		'rewrite' => array( 'slug' => esc_attr($cat_slug) )
	);
	register_taxonomy( 'event_cat', 'event', $vsel_cat_args );
}
add_action( 'init', 'vsel_taxonomy' );

// flush rewrite rules on plugin activation
function vsel_activation_hook() {
	vsel_custom_postype();
	vsel_taxonomy();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'vsel_activation_hook' );

// create metabox
function vsel_metabox() {
	add_meta_box(
		'vsel-event-metabox',
		esc_attr__( 'Informations de l\'évènement', 'flying-bird' ),
		'vsel_metabox_callback',
		'event',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'vsel_metabox' );

function vsel_metabox_callback( $post ) {
	// generate a nonce field
	wp_nonce_field( 'vsel_meta_box', 'vsel_nonce' );

	// get setting for one date instead of start date and end date
	$one_date = get_option('vsel-setting-58');

	// get previously saved meta values (if any)
	$start_date = get_post_meta( $post->ID, 'event-start-date', true );
	$end_date = get_post_meta( $post->ID, 'event-date', true );
	$time = get_post_meta( $post->ID, 'event-time', true );
	$location = get_post_meta( $post->ID, 'event-location', true );
	$link = get_post_meta( $post->ID, 'event-link', true );
	$link_label = get_post_meta( $post->ID, 'event-link-label', true );
	$link_target = get_post_meta( $post->ID, 'event-link-target', true );
	$link_title = get_post_meta( $post->ID, 'event-link-title', true );
	$summary = get_post_meta( $post->ID, 'event-summary', true );

	// date format
	$date_format = vsel_input_dateformat();

	// utc timezone
	$utc_time_zone = vsel_utc_timezone();

	// local timestamp
	$local_timestamp = vsel_local_timestamp();

	// get date if saved, else set it to today
	$start_date = !empty( $start_date ) ? $start_date : $local_timestamp;
	$end_date = !empty( $end_date ) ? $end_date : $local_timestamp;

	// metabox fields
	if ( $one_date == 'yes' ) { ?>
		<p><label for="vsel-end-date"><?php esc_attr_e( 'Date', 'flying-bird' ); ?></label>
		<input class="widefat" id="vsel-end-date" type="text" name="vsel-end-date" required maxlength="10" placeholder="<?php esc_attr_e( 'Utiliser le datepicker', 'flying-bird' ); ?>" value="<?php echo wp_date( $date_format, esc_attr( $end_date ), $utc_time_zone ); ?>" /></p>
	<?php } else { ?>
		<p><label for="vsel-start-date"><?php esc_attr_e( 'Date de départ', 'flying-bird' ); ?></label>
		<input class="widefat" id="vsel-start-date" type="text" name="vsel-start-date" required maxlength="10" placeholder="<?php esc_attr_e( 'Utiliser le datepicker', 'flying-bird' ); ?>" value="<?php echo wp_date( $date_format, esc_attr( $start_date ), $utc_time_zone ); ?>" /></p>
		<p><label for="vsel-end-date"><?php esc_attr_e( 'Date de fin', 'flying-bird' ); ?></label>
		<input class="widefat" id="vsel-end-date" type="text" name="vsel-end-date" required maxlength="10" placeholder="<?php esc_attr_e( 'Utiliser le datepicker', 'flying-bird' ); ?>" value="<?php echo wp_date( $date_format, esc_attr( $end_date ), $utc_time_zone ); ?>" /></p>
	<?php } ?>
	<p><label for="vsel-time"><?php esc_attr_e( 'Heure', 'flying-bird' ); ?></label>
	<input class="widefat" id="vsel-time" type="text" name="vsel-time" placeholder="<?php esc_attr_e( 'Exemple : 16:00 - 18:00', 'flying-bird' ); ?>" value="<?php echo esc_attr( $time ); ?>" /></p>
	<p><label for="vsel-location"><?php esc_attr_e( 'Lieu', 'flying-bird' ); ?></label>
	<input class="widefat" id="vsel-location" type="text" name="vsel-location" placeholder="<?php esc_attr_e( 'Exemple : Dijon', 'flying-bird' ); ?>" value="<?php echo esc_attr( $location ); ?>" /></p>
	<p><label for="vsel-link"><?php esc_attr_e( 'Lien pour plus d\'informations', 'flying-bird' ); ?></label>
	<input class="widefat" id="vsel-link" type="text" name="vsel-link" placeholder="<?php esc_attr_e( 'Exemple : www.wordpress.org', 'flying-bird' ); ?>" value="<?php echo esc_url( $link ); ?>" /></p>
	<p><label for="vsel-link-label"><?php esc_attr_e( 'Nom du lien', 'flying-bird' ); ?></label>
	<input class="widefat" id="vsel-link-label" type="text" name="vsel-link-label" placeholder="<?php esc_attr_e( 'Exemple : Plus d\'infos', 'flying-bird' ); ?>" value="<?php echo esc_attr( $link_label ); ?>" /></p>
	<p><input class="checkbox" id="vsel-link-target" type="checkbox" name="vsel-link-target" value="yes" <?php checked( $link_target, 'yes' ); ?> />
	<label for="vsel-link-target"><?php esc_attr_e('Ouvrir le lien dans une nouvelle fenêtre', 'flying-bird'); ?></label></p>
	<p><input class="checkbox" id="vsel-link-title" type="checkbox" name="vsel-link-title" value="yes" <?php checked( $link_title, 'yes' ); ?> />
	<label for="vsel-link-title"><?php esc_attr_e('Rediriger le titre de l\'événement vers le lien plus d\'informations', 'flying-bird'); ?></label></p>
	<p><label for="vsel-summary"><?php esc_attr_e( 'Résumé personnalisé', 'flying-bird' ); ?></label>
	<textarea id="vsel-summary" name="vsel-summary" class="large-text" rows="6" placeholder="<?php esc_attr_e( 'Résumé simplifié de l\'évènement', 'flying-bird' ); ?>"><?php echo wp_kses_post( $summary); ?></textarea></p>
	<?php
}

// save event
function vsel_save_event_info( $post_id ) {
	// get current timezone
	$current_zone = date_default_timezone_get();
	// set utc timezone for strtotime
	date_default_timezone_set('UTC');
	// get setting for one date instead of start date and end date
	$one_date = get_option('vsel-setting-58');
	// check if nonce is set
	if ( ! isset( $_POST['vsel_nonce'] ) ) {
		return;
	}
	// verify that nonce is valid
	if ( ! wp_verify_nonce( $_POST['vsel_nonce'], 'vsel_meta_box' ) ) {
		return;
	}
	// if this is an autosave, our form has not been submitted, so do nothing
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// check user permission
	if ( ( get_post_type() != 'event' ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
 	// checking values and save fields
	if ( $one_date == 'yes' ) {
		if ( isset( $_POST['vsel-end-date'] ) ) {
			update_post_meta( $post_id, 'event-start-date', sanitize_text_field(strtotime( $_POST['vsel-end-date'] ) ) );
		}
	} else {
		if ( isset( $_POST['vsel-start-date'] ) ) {
			update_post_meta( $post_id, 'event-start-date', sanitize_text_field(strtotime( $_POST['vsel-start-date'] ) ) );
		}
	}
	if ( isset( $_POST['vsel-end-date'] ) ) {
		update_post_meta( $post_id, 'event-date', sanitize_text_field(strtotime( $_POST['vsel-end-date'] ) ) );
	}
	if ( isset( $_POST['vsel-time'] ) ) {
		update_post_meta( $post_id, 'event-time', sanitize_text_field( $_POST['vsel-time'] ) );
	}
	if ( isset( $_POST['vsel-location'] ) ) {
		update_post_meta( $post_id, 'event-location', sanitize_text_field( $_POST['vsel-location'] ) );
	}
	if ( isset( $_POST['vsel-link'] ) ) {
		update_post_meta( $post_id, 'event-link', esc_url_raw( $_POST['vsel-link'] ) );
	}
	if ( isset( $_POST['vsel-link-label'] ) ) {
		update_post_meta( $post_id, 'event-link-label', sanitize_text_field( $_POST['vsel-link-label'] ) );
	}
	if ( isset( $_POST['vsel-link-target'] ) ) {
		update_post_meta( $post_id, 'event-link-target', 'yes' );
	} else {
		update_post_meta( $post_id, 'event-link-target', 'no' );
	}
	if ( isset( $_POST['vsel-link-title'] ) ) {
		update_post_meta( $post_id, 'event-link-title', 'yes' );
	} else {
		update_post_meta( $post_id, 'event-link-title', 'no' );
	}	
	if ( isset( $_POST['vsel-summary'] ) ) {
		update_post_meta( $post_id, 'event-summary', wp_kses_post( $_POST['vsel-summary'] ) );
	}
	// set current timezone again
	date_default_timezone_set($current_zone);
}
add_action( 'save_post', 'vsel_save_event_info' );

// remove native custom fields metabox from the editor
function vsel_remove_native_metabox() {
	remove_meta_box( 'postcustom', 'event', 'normal' );
}
add_action( 'admin_menu' , 'vsel_remove_native_metabox' );

// dashboard event columns
function vsel_custom_columns( $defaults ) {
	// get settings to disable time and location column
	$disable_time_column = get_option('vsel-setting-56');
	$disable_loc_column = get_option('vsel-setting-57');
	$disable_menu_order_column = get_option('vsel-setting-61');

	unset( $defaults['date'] );
	$defaults['start_date_column'] = esc_attr__( 'Date de départ', 'flying-bird' );
	$defaults['end_date_column'] = esc_attr__( 'Date de fin', 'flying-bird' );
	if ( $disable_time_column != 'yes' ) {
		$defaults['time_column'] = esc_attr__( 'Heures', 'flying-bird' );
	}
	if ( $disable_loc_column != 'yes' ) {
		$defaults['location_column'] = esc_attr__( 'Lieu', 'flying-bird' );
	}
	if ( $disable_menu_order_column != 'yes' ) {
		$defaults['menu_order_column'] = esc_attr__( 'Ordre', 'flying-bird' );
	}
	return $defaults;
}
add_filter( 'manage_event_posts_columns', 'vsel_custom_columns', 10 );

function vsel_custom_columns_content( $column_name, $post_id ) {
	// utc timezone
	$utc_time_zone = vsel_utc_timezone();
	// end utc timezone
	if ( 'start_date_column' == $column_name ) {
		$start_date = get_post_meta( $post_id, 'event-start-date', true );
		if(!empty( $start_date ) ) {
			echo wp_date( get_option('date_format'), $start_date, $utc_time_zone );
		} else {
			echo '<span aria-hidden="true">&mdash;</span>';
		}
	}
	if ( 'end_date_column' == $column_name ) {
		$end_date = get_post_meta( $post_id, 'event-date', true );
		if(!empty( $end_date ) ) {
			echo wp_date( get_option('date_format'), $end_date, $utc_time_zone );
		} else {
			echo '<span aria-hidden="true">&mdash;</span>';
		}
	}
	if ( 'time_column' == $column_name ) {
		$time = get_post_meta( $post_id, 'event-time', true );
		if(!empty( $time ) ) {
			echo $time;
		} else {
			echo '<span aria-hidden="true">&mdash;</span>';
		}
	}
	if ( 'location_column' == $column_name ) {
		$location = get_post_meta( $post_id, 'event-location', true );
		if(!empty( $location ) ) {
			echo $location;
		} else {
			echo '<span aria-hidden="true">&mdash;</span>';
		}
	}
	if ( 'menu_order_column' == $column_name ) {
		$order = get_post( $post_id )->menu_order;
		if(!empty( $order ) ) {
			echo $order;
		} else {
			echo '<span aria-hidden="true">0</span>';
		}
	}
}
add_action( 'manage_event_posts_custom_column', 'vsel_custom_columns_content', 10, 2 );

// make event date column sortable
function vsel_column_register_sortable( $columns ) {
	$columns['start_date_column'] = 'event-start-date';
	$columns['end_date_column'] = 'event-date';
	return $columns;
}
add_filter( 'manage_edit-event_sortable_columns', 'vsel_column_register_sortable' );

function vsel_start_date_column_orderby( $vars ) {
	if(is_admin()) {
		if ( isset( $vars['orderby'] ) && 'event-start-date' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => 'event-start-date',
				'orderby' => 'meta_value_num'
			) );
		}
	}
	return $vars;
}
add_filter( 'request', 'vsel_start_date_column_orderby' );

function vsel_date_column_orderby( $vars ) {
	if(is_admin()) {
		if ( isset( $vars['orderby'] ) && 'event-date' == $vars['orderby'] ) {
			$vars = array_merge( $vars, array(
				'meta_key' => 'event-date',
				'orderby' => 'meta_value_num'
			) );
		}
	}
	return $vars;
}
add_filter( 'request', 'vsel_date_column_orderby' );

// add categories to event css class
function vsel_event_cats() {
	// set global
	global $post;
	// end set global
	$terms = get_the_terms( $post->ID, 'event_cat' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$cats = array();
		foreach ( $terms as $term ) {
			$cats[] = $term->slug;
		}
		$vsel_cats = implode( " ", $cats );
		return ' '.$vsel_cats;
	} else {
		return '';
	}
}

// add status to event css class
function vsel_event_status() {
	// set global
	global $post;
	// end set global
	$start = get_post_meta( $post->ID, 'event-start-date' );
	$end = get_post_meta( $post->ID, 'event-date' );
	// local timestamp
	$local_timestamp = vsel_local_timestamp();
	// end local timestamp
	$start_date = array();
	$end_date = array();
	foreach ( $start as $term ) {
		$start_date = $term;
	}
	foreach ( $end as $term ) {
		$end_date = $term;
	}
	if ( ( $end_date == $local_timestamp ) || ( ( $start_date <= $local_timestamp ) && ( $end_date > $local_timestamp ) ) ) {
		return ' vsel-upcoming vsel-current';
	} elseif ( $end_date > $local_timestamp ) {
		return ' vsel-upcoming vsel-future';
	} elseif ( $end_date < $local_timestamp ) {
		return ' vsel-past';
	} else {
		return '';
	}
}

// add class to pagination
function vsel_prev_posts() {
	return 'class="prev"';
}
add_filter('previous_posts_link_attributes', 'vsel_prev_posts', 10);

function vsel_next_posts() {
	return 'class="next"';
}
add_filter('next_posts_link_attributes', 'vsel_next_posts', 10);

// add settings link
function vsel_action_links( $links ) {
	$settingslink = array( '<a href="'. admin_url( 'options-general.php?page=vsel' ) .'">'.esc_attr__('Paramétrage', 'flying-bird').'</a>' );
	return array_merge( $links, $settingslink );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'vsel_action_links' );

// include files
include 'vsel-widget.php';
include 'vsel-options.php';
include 'vsel-page-shortcodes.php';
include 'vsel-widget-shortcodes.php';
include 'vsel-template-support.php';
