<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// global variables

// default date format
$date_format_default = get_option('date_format');

// get setting for custom date format
$date_format_settings_page = get_option('vsel-setting-38');

// set global date format
if ( !empty($date_format_settings_page) ) {
	$template_date_format = $date_format_settings_page;
} else {
	$template_date_format = $date_format_default;
}

// utc timezone
$utc_time_zone = vsel_utc_timezone();

// get settings for date and cat separator
$date_separator = get_option('vsel-setting-69');
$cat_separator = get_option('vsel-setting-70');

// date and cat separator
if (empty($date_separator)) {
	$date_separator = '-';
}
if (empty($cat_separator)) {
	$cat_separator = '|';
}

// get settings to disable theme template support
$disable_single_template = get_option('vsel-setting-39');
$disable_category_template = get_option('vsel-setting-40');
$disable_post_type_template = get_option('vsel-setting-43');
$disable_search_template = get_option('vsel-setting-41');

// get event meta
$start_date = get_post_meta( get_the_ID(), 'event-start-date', true );
$end_date = get_post_meta( get_the_ID(), 'event-date', true );
$time = get_post_meta( get_the_ID(), 'event-time', true );
$location = get_post_meta( get_the_ID(), 'event-location', true );
$link = get_post_meta( get_the_ID(), 'event-link', true );
$link_label = get_post_meta( get_the_ID(), 'event-link-label', true );
$link_target = get_post_meta( get_the_ID(), 'event-link-target', true );
$link_title_to_more_info = get_post_meta( get_the_ID(), 'event-link-title', true );
$summary = get_post_meta( get_the_ID(), 'event-summary', true );

// set more info link label
if (empty($link_label)) {
	$link_label = __( 'Plus d\'informations', 'flying-bird' );
}

// set more info link target
if ($link_target == 'yes') {
	$link_target = 'target="_blank" rel="noreferrer noopener"';
} else {
	$link_target = 'target="_self" rel="noreferrer"';
}

// page variables

// set date format
if ( !empty($vsel_atts['date_format']) ) {
	$page_date_format = $vsel_atts['date_format'];
} else {
	$page_date_format = $template_date_format;
}

// get custom labels from settingspage
$page_date_label = get_option('vsel-setting-16');
$page_start_label = get_option('vsel-setting-17');
$page_end_label = get_option('vsel-setting-18');
$page_time_label = get_option('vsel-setting-19');
$page_location_label = get_option('vsel-setting-20');

// get setting to show date icon instead of a label
$page_show_icon  = get_option('vsel-setting-62');

// get setting to combine date icon and title
$page_meta_combine = get_option('vsel-setting-68');

// get setting to combine dates on the same line
$page_date_combine = get_option('vsel-setting-15');

// get setting to show excerpt
$page_excerpt = get_option('vsel-setting-13');

// get setting to relocate title
$page_title_location = get_option('vsel-setting-59');

// get settings to link title and featured image to event page
$page_link_title = get_option('vsel-setting-9');
$page_link_image = get_option('vsel-setting-29');

// get setting to link category to category page
$page_link_cat = get_option('vsel-setting-44');

// get settings for event layout
$page_meta_loc = get_option('vsel-setting-35');
$page_image_loc = get_option('vsel-setting-36');
$page_meta_width = get_option('vsel-setting-66');

// get setting to set featured image size
$page_image_size = get_option('vsel-setting-30');

// get setting to set featured image max width
$page_image_width = get_option('vsel-setting-53');

// get settings to hide elements
$page_title_hide = get_option('vsel-setting-64');
$page_date_hide = get_option('vsel-setting-8');
$page_time_hide = get_option('vsel-setting-11');
$page_location_hide = get_option('vsel-setting-12');
$page_image_hide = get_option('vsel-setting-27');
$page_info_hide = get_option('vsel-setting-28');
$page_link_hide = get_option('vsel-setting-10');
$page_cats_hide = get_option('vsel-setting-33');
$page_pagination_hide = get_option('vsel-setting-42');
$page_acf_hide = get_option('vsel-setting-51');

// show default label if no custom label is set
if (empty($page_date_label)) {
	$page_date_label = __( 'Date : %s', 'flying-bird' );
}
if (empty($page_start_label)) {
	$page_start_label = __( 'Date de d??part : %s', 'flying-bird' );
}
if (empty($page_end_label)) {
	$page_end_label = __( 'Date de fin : %s', 'flying-bird' );
}
if (empty($page_time_label)) {
	$page_time_label = __( 'Heures : %s', 'flying-bird' );
}
if (empty($page_location_label)) {
	$page_location_label = __( 'Lieu : %s', 'flying-bird' );
}

// set size for featured image
if ($page_image_size == 'small') {
	$page_image_source = 'thumbnail';
} elseif ($page_image_size == 'medium') {
	$page_image_source = 'medium';
} elseif ($page_image_size == 'large') {
	$page_image_source = 'large';
} else {
	$page_image_source = 'post-thumbnail';
}

// set custom max width for featured image
if (!empty($page_image_width) && is_numeric($page_image_width) && ($page_image_width > 19) && ($page_image_width < 101) ) {
	if ($page_image_width == '100') {
		$page_image_max_width = 'style="max-width:'.$page_image_width.'%; float:none; margin-left:0; margin-right:0;"';
	} else {
		$page_image_max_width = 'style="max-width:'.$page_image_width.'%;"';
	}
} else {
	$page_image_max_width = '';
}

// set css class for featured image
if ($page_image_loc == 'left') {
	$page_img_class = 'vsel-image-left';
} else {
	$page_img_class = 'vsel-image-right vsel-image';
}

// set custom width for meta section and event info section
if (!empty($page_meta_width) && is_numeric($page_meta_width) && ($page_meta_width > 19) && ($page_meta_width < 61) ) {
	$page_content_width_default = 96;
	$page_content_width = $page_content_width_default - $page_meta_width;
	$page_meta_section_width = 'style="width:'.$page_meta_width.'%;"';
	$page_event_info_section_width = 'style="width:'.$page_content_width.'%;"';
} else {
	$page_meta_section_width = '';
	$page_event_info_section_width = '';
}

// set css class for meta section and event info section
if ($page_meta_loc == 'right') {
	$page_meta_class = 'vsel-meta-right';
	$page_event_info_class = 'vsel-image-info-left';
} else {
	$page_meta_class = 'vsel-meta-left vsel-meta';
	$page_event_info_class = 'vsel-image-info-right vsel-image-info';
}
if ( ($page_image_hide == 'yes') && ($page_info_hide == 'yes') ) {
	$page_meta_section_start = '<div class="vsel-meta-full">';
	$page_meta_section_end = '</div>';
	$page_event_info_section_start = '';
	$page_event_info_section_end = '';
} else {
	$page_meta_section_start = '<div class="'.$page_meta_class.'" '.$page_meta_section_width.'>';
	$page_meta_section_end = '</div>';
	$page_event_info_section_start = '<div class="'.$page_event_info_class.'" '.$page_event_info_section_width.'>';
	$page_event_info_section_end = '</div>';
}

// show date label or icon
$page_start_default = sprintf(esc_attr($page_start_label), '<span>'.wp_date( esc_attr($page_date_format), esc_attr($start_date), $utc_time_zone ).'</span>' );
$page_end_default = sprintf(esc_attr($page_end_label), '<span>'.wp_date( esc_attr($page_date_format), esc_attr($end_date), $utc_time_zone ).'</span>' );
$page_same_default = sprintf(esc_attr($page_date_label), '<span>'.wp_date( esc_attr($page_date_format), esc_attr($end_date), $utc_time_zone ).'</span>' );
$page_start_icon_1 = '<span class="vsel-day vsel-day-top">'.wp_date( 'j', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-month">'.wp_date( 'M', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($start_date), $utc_time_zone ).'</span>';
$page_start_icon_2 = '<span class="vsel-month vsel-month-top">'.wp_date( 'M', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-day">'.wp_date( 'j', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($start_date), $utc_time_zone ).'</span>';
$page_end_icon_1 = '<span class="vsel-day vsel-day-top">'.wp_date( 'j', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-month">'.wp_date( 'M', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($end_date), $utc_time_zone ).'</span>';
$page_end_icon_2 = '<span class="vsel-month vsel-month-top">'.wp_date( 'M', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-day">'.wp_date( 'j', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($end_date), $utc_time_zone ).'</span>';

// widget variables

// set date format
if ( !empty($vsel_widget_atts['date_format']) ) {
	$widget_date_format = $vsel_widget_atts['date_format'];
} else {
	$widget_date_format = $template_date_format;
}

// get custom labels from settingspage
$widget_date_label = get_option('vsel-setting-22');
$widget_start_label = get_option('vsel-setting-23');
$widget_end_label = get_option('vsel-setting-24');
$widget_time_label = get_option('vsel-setting-25');
$widget_location_label = get_option('vsel-setting-26');

// get setting to show date icon instead of a label
$widget_show_icon  = get_option('vsel-setting-63');

// get setting to combine date icon and title
$widget_meta_combine = get_option('vsel-setting-67');

// get setting to combine dates on the same line
$widget_date_combine = get_option('vsel-setting-21');

// get setting to show excerpt
$widget_excerpt = get_option('vsel-setting-1');

// get settings to link title and featured image to event page
$widget_link_title = get_option('vsel-setting-14');
$widget_link_image = get_option('vsel-setting-31');

// get setting to link category to category page
$widget_link_cat = get_option('vsel-setting-45');

// get setting for event layout
$widget_image_loc = get_option('vsel-setting-37');

// get setting to set featured image size
$widget_image_size = get_option('vsel-setting-32');

// get setting to set featured image max width
$widget_image_width = get_option('vsel-setting-54');

// get settings to hide elements
$widget_title_hide = get_option('vsel-setting-65');
$widget_date_hide = get_option('vsel-setting-2');
$widget_time_hide = get_option('vsel-setting-3');
$widget_location_hide = get_option('vsel-setting-4');
$widget_image_hide = get_option('vsel-setting-5');
$widget_info_hide = get_option('vsel-setting-7');
$widget_link_hide = get_option('vsel-setting-6');
$widget_cats_hide = get_option('vsel-setting-34');
$widget_acf_hide = get_option('vsel-setting-52');

// show default label if no custom label is set
if (empty($widget_date_label)) {
	$widget_date_label = __( 'Date : %s', 'flying-bird' );
}
if (empty($widget_start_label)) {
	$widget_start_label = __( 'Date de d??part: %s', 'flying-bird' );
}
if (empty($widget_end_label)) {
	$widget_end_label = __( 'Date de fin : %s', 'flying-bird' );
}
if (empty($widget_time_label)) {
	$widget_time_label = __( 'Heures : %s', 'flying-bird' );
}
if (empty($widget_location_label)) {
	$widget_location_label = __( 'Lieu : %s', 'flying-bird' );
}

// set size for featured image
if ($widget_image_size == 'small') {
	$widget_image_source = 'thumbnail';
} elseif ($widget_image_size == 'medium') {
	$widget_image_source = 'medium';
} elseif ($widget_image_size == 'large') {
	$widget_image_source = 'large';
} else {
	$widget_image_source = 'post-thumbnail';
}

// set custom max width for featured image
if (!empty($widget_image_width) && is_numeric($widget_image_width) && ($widget_image_width > 19) && ($widget_image_width < 101) ) {
	if ($widget_image_width == '100') {
		$widget_image_max_width = 'style="max-width:'.$widget_image_width.'%; float:none; margin-left:0; margin-right:0;"';
	} else {
		$widget_image_max_width = 'style="max-width:'.$widget_image_width.'%;"';
	}
} else {
	$widget_image_max_width = '';
}

// set css class for featured image
if ($widget_image_loc == 'left') {
	$widget_img_class = 'vsel-image-left';
} else {
	$widget_img_class = 'vsel-image-right vsel-image';
}

// show date label or icon
$widget_start_default = sprintf(esc_attr($widget_start_label), '<span>'.wp_date( esc_attr($widget_date_format), esc_attr($start_date), $utc_time_zone ).'</span>' );
$widget_end_default = sprintf(esc_attr($widget_end_label), '<span>'.wp_date( esc_attr($widget_date_format), esc_attr($end_date), $utc_time_zone ).'</span>' );
$widget_same_default = sprintf(esc_attr($widget_date_label), '<span>'.wp_date( esc_attr($widget_date_format), esc_attr($end_date), $utc_time_zone ).'</span>' );
$widget_start_icon_1 = '<span class="vsel-day vsel-day-top">'.wp_date( 'j', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-month">'.wp_date( 'M', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($start_date), $utc_time_zone ).'</span>';
$widget_start_icon_2 = '<span class="vsel-month vsel-month-top">'.wp_date( 'M', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-day">'.wp_date( 'j', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($start_date), $utc_time_zone ).'</span>';
$widget_end_icon_1 = '<span class="vsel-day vsel-day-top">'.wp_date( 'j', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-month">'.wp_date( 'M', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($end_date), $utc_time_zone ).'</span>';
$widget_end_icon_2 = '<span class="vsel-month vsel-month-top">'.wp_date( 'M', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-day">'.wp_date( 'j', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($end_date), $utc_time_zone ).'</span>';

// single event variables

// get custom labels from settingspage
$single_date_label = get_option('vsel-setting-81');
$single_start_label = get_option('vsel-setting-82');
$single_end_label = get_option('vsel-setting-83');
$single_time_label = get_option('vsel-setting-84');
$single_location_label = get_option('vsel-setting-85');

// get setting to show date icon instead of a label
$single_show_icon  = get_option('vsel-setting-74');

// get setting to combine dates on the same line
$single_date_combine = get_option('vsel-setting-75');

// get setting to link category to category page
$single_link_cat = get_option('vsel-setting-73');

// get settings for event layout
$single_meta_loc = get_option('vsel-setting-72');
$single_meta_width = get_option('vsel-setting-71');

// get settings to hide elements
$single_date_hide = get_option('vsel-setting-86');
$single_time_hide = get_option('vsel-setting-76');
$single_location_hide = get_option('vsel-setting-77');
$single_link_hide = get_option('vsel-setting-79');
$single_cats_hide = get_option('vsel-setting-78');
$single_acf_hide = get_option('vsel-setting-80');

// show default label if no custom label is set
if (empty($single_date_label)) {
	$single_date_label = __( 'Date : %s', 'flying-bird' );
}
if (empty($single_start_label)) {
	$single_start_label = __( 'Date de d??part : %s', 'flying-bird' );
}
if (empty($single_end_label)) {
	$single_end_label = __( 'Date de fin : %s', 'flying-bird' );
}
if (empty($single_time_label)) {
	$single_time_label = __( 'Heures : %s', 'flying-bird' );
}
if (empty($single_location_label)) {
	$single_location_label = __( 'Lieu : %s', 'flying-bird' );
}

// set custom width for meta section and event info section
if (!empty($single_meta_width) && is_numeric($single_meta_width) && ($single_meta_width > 19) && ($single_meta_width < 61) ) {
	$single_content_width_default = 96;
	$single_content_width = $single_content_width_default - $single_meta_width;
	$single_meta_section_width = 'style="width:'.$single_meta_width.'%;"';
	$single_event_info_section_width = 'style="width:'.$single_content_width.'%;"';
} else {
	$single_meta_section_width = '';
	$single_event_info_section_width = '';
}

// set css class for meta section and event info section
if ($single_meta_loc == 'right') {
	$single_meta_class = 'vsel-meta-right';
	$single_event_info_class = 'vsel-image-info-left';
} else {
	$single_meta_class = 'vsel-meta-left vsel-meta';
	$single_event_info_class = 'vsel-image-info-right vsel-image-info';
}
$single_meta_section_start = '<div class="'.$single_meta_class.'" '.$single_meta_section_width.'>';
$single_meta_section_end = '</div>';
$single_event_info_section_start = '<div class="'.$single_event_info_class.'" '.$single_event_info_section_width.'>';
$single_event_info_section_end = '</div>';

// show date label or icon
$single_start_default = sprintf(esc_attr($single_start_label), '<span>'.wp_date( esc_attr($template_date_format), esc_attr($start_date), $utc_time_zone ).'</span>' );
$single_end_default = sprintf(esc_attr($single_end_label), '<span>'.wp_date( esc_attr($template_date_format), esc_attr($end_date), $utc_time_zone ).'</span>' );
$single_same_default = sprintf(esc_attr($single_date_label), '<span>'.wp_date( esc_attr($template_date_format), esc_attr($end_date), $utc_time_zone ).'</span>' );
$single_start_icon_1 = '<span class="vsel-day vsel-day-top">'.wp_date( 'j', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-month">'.wp_date( 'M', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($start_date), $utc_time_zone ).'</span>';
$single_start_icon_2 = '<span class="vsel-month vsel-month-top">'.wp_date( 'M', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-day">'.wp_date( 'j', esc_attr($start_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($start_date), $utc_time_zone ).'</span>';
$single_end_icon_1 = '<span class="vsel-day vsel-day-top">'.wp_date( 'j', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-month">'.wp_date( 'M', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($end_date), $utc_time_zone ).'</span>';
$single_end_icon_2 = '<span class="vsel-month vsel-month-top">'.wp_date( 'M', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-day">'.wp_date( 'j', esc_attr($end_date), $utc_time_zone ).'</span><span class="vsel-year">'.wp_date( 'Y', esc_attr($end_date), $utc_time_zone ).'</span>';
