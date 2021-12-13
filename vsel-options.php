<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// add admin options page
function vsel_menu_page() {
    add_options_page( esc_attr__( 'Flying Bird', 'flying-bird' ), esc_attr__( 'Flying Bird', 'flying-bird' ), 'manage_options', 'vsel', 'vsel_options_page' );
}
add_action( 'admin_menu', 'vsel_menu_page' );

// add admin settings and such
function vsel_admin_init() {
	// general section
	add_settings_section( 'vsel-general-section', esc_attr__( 'Général', 'flying-bird' ), '', 'vsel-general' );

	add_settings_field( 'vsel-field', esc_attr__( 'Désinstallation', 'flying-bird' ), 'vsel_field_callback', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-38', esc_attr__( 'Format de la date', 'flying-bird' ), 'vsel_field_callback_38', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-38', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-58', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_58', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-58', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-69', esc_attr__( 'Séparateur de la date', 'flying-bird' ), 'vsel_field_callback_69', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-69', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-70', esc_attr__( 'Séparateur des catégories', 'flying-bird' ), 'vsel_field_callback_70', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-70', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-55', esc_attr__( 'Catégories', 'flying-bird' ), 'vsel_field_callback_55', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-55', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-56', esc_attr__( 'Heures', 'flying-bird' ), 'vsel_field_callback_56', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-56', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-57', esc_attr__( 'Lieu', 'flying-bird' ), 'vsel_field_callback_57', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-57', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-61', esc_attr__( 'Ordre', 'flying-bird' ), 'vsel_field_callback_61', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-61', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-50', esc_attr__( 'Menu', 'flying-bird' ), 'vsel_field_callback_50', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-50', array('sanitize_callback' => 'sanitize_key') );	

	add_settings_field( 'vsel-field-60', esc_attr__( 'Évènement unique', 'flying-bird' ), 'vsel_field_callback_60', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-60', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-39', esc_attr__( 'Évènement unique', 'flying-bird' ), 'vsel_field_callback_39', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-39', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-48', esc_attr__( 'Archive des types d\'évènements', 'flying-bird' ), 'vsel_field_callback_48', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-48', array('sanitize_callback' => 'sanitize_key') );	

	add_settings_field( 'vsel-field-43', esc_attr__( 'Archive des types d\'évènements', 'flying-bird' ), 'vsel_field_callback_43', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-43', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-40', esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ), 'vsel_field_callback_40', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-40', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-41', esc_attr__( 'Résultat de recherche', 'flying-bird' ), 'vsel_field_callback_41', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-41', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-46', esc_attr__( 'Évènement unique (BDD)', 'flying-bird' ), 'vsel_field_callback_46', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-46', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-47', esc_attr__( 'Catégorie d\'évènement (BDD)', 'flying-bird' ), 'vsel_field_callback_47', 'vsel-general', 'vsel-general-section' );
	register_setting( 'vsel-general-options', 'vsel-setting-47', array('sanitize_callback' => 'sanitize_text_field') );

	// page section
	add_settings_section( 'vsel-page-section', esc_attr__( 'Page', 'flying-bird' ), '', 'vsel-page' );

	add_settings_field( 'vsel-field-66', esc_attr__( 'Meta', 'flying-bird' ), 'vsel_field_callback_66', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-66', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-35', esc_attr__( 'Meta de vos évènements', 'flying-bird' ), 'vsel_field_callback_35', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-35', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-59', esc_attr__( 'Titre', 'flying-bird' ), 'vsel_field_callback_59', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-59', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-9', esc_attr__( 'Titre', 'flying-bird' ), 'vsel_field_callback_9', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-9', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-62', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_62', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-62', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-68', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_68', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-68', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-15', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_15', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-15', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-36', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_36', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-36', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-30', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_30', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-30', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-53', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_53', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-53', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-29', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_29', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-29', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-13', esc_attr__( 'Sommaire', 'flying-bird' ), 'vsel_field_callback_13', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-13', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-44', esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ), 'vsel_field_callback_44', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-44', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-64', esc_attr__( 'Titre', 'flying-bird' ), 'vsel_field_callback_64', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-64', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-8', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_8', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-8', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-11', esc_attr__( 'Heure', 'flying-bird' ), 'vsel_field_callback_11', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-11', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-12', esc_attr__( 'Lieu', 'flying-bird' ), 'vsel_field_callback_12', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-12', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-33', esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ), 'vsel_field_callback_33', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-33', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-27', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_27', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-27', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-28', esc_attr__( 'Info', 'flying-bird' ), 'vsel_field_callback_28', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-28', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-10', esc_attr__( 'Lien pour plus d\'informations', 'flying-bird' ), 'vsel_field_callback_10', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-10', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-42', esc_attr__( 'Pagination', 'flying-bird' ), 'vsel_field_callback_42', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-42', array('sanitize_callback' => 'sanitize_key') );

	if( class_exists('acf') ) {
		add_settings_field( 'vsel-field-51', esc_attr__( 'Champs ACF', 'flying-bird' ), 'vsel_field_callback_51', 'vsel-page', 'vsel-page-section' );
		register_setting( 'vsel-page-options', 'vsel-setting-51', array('sanitize_callback' => 'sanitize_key') );
	}

	add_settings_field( 'vsel-field-16', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_16', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-16', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-17', esc_attr__( 'Date de départ', 'flying-bird' ), 'vsel_field_callback_17', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-17', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-18', esc_attr__( 'Date de fin', 'flying-bird' ), 'vsel_field_callback_18', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-18', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-19', esc_attr__( 'Heure', 'flying-bird' ), 'vsel_field_callback_19', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-19', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-20', esc_attr__( 'Lieu', 'flying-bird' ), 'vsel_field_callback_20', 'vsel-page', 'vsel-page-section' );
	register_setting( 'vsel-page-options', 'vsel-setting-20', array('sanitize_callback' => 'sanitize_text_field') );

	// widget section
	add_settings_section( 'vsel-widget-section', esc_attr__( 'Widget', 'flying-bird' ), 'vsel_widget_section_callback', 'vsel-widget' );

	add_settings_field( 'vsel-field-14', esc_attr__( 'Titre', 'flying-bird' ), 'vsel_field_callback_14', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-14', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-63', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_63', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-63', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-67', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_67', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-67', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-21', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_21', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-21', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-37', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_37', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-37', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-32', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_32', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-32', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-54', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_54', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-54', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-31', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_31', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-31', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-1', esc_attr__( 'Sommaire', 'flying-bird' ), 'vsel_field_callback_1', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-1', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-45', esc_attr__( 'Catégorie d\'évènement', 'flying-bird' ), 'vsel_field_callback_45', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-45', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-65', esc_attr__( 'Titre', 'flying-bird' ), 'vsel_field_callback_65', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-65', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-2', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_2', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-2', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-3', esc_attr__( 'Heure', 'flying-bird' ), 'vsel_field_callback_3', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-3', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-4', esc_attr__( 'Lieu', 'flying-bird' ), 'vsel_field_callback_4', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-4', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-34', esc_attr__( 'Catégorie d\'évènement', 'flying-bird' ), 'vsel_field_callback_34', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-34', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-5', esc_attr__( 'Image d\'entête', 'flying-bird' ), 'vsel_field_callback_5', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-5', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-7', esc_attr__( 'Info', 'flying-bird' ), 'vsel_field_callback_7', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-7', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-6', esc_attr__( 'Lien pour plus d\'informations', 'flying-bird' ), 'vsel_field_callback_6', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-6', array('sanitize_callback' => 'sanitize_key') );

	if( class_exists('acf') ) {
		add_settings_field( 'vsel-field-52', esc_attr__( 'Champs ACF', 'flying-bird' ), 'vsel_field_callback_52', 'vsel-widget', 'vsel-widget-section' );
		register_setting( 'vsel-widget-options', 'vsel-setting-52', array('sanitize_callback' => 'sanitize_key') );
	}

	add_settings_field( 'vsel-field-22', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_22', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-22', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-23', esc_attr__( 'Date de départ', 'flying-bird' ), 'vsel_field_callback_23', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-23', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-24', esc_attr__( 'Date de fin', 'flying-bird' ), 'vsel_field_callback_24', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-24', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-25', esc_attr__( 'Heure', 'flying-bird' ), 'vsel_field_callback_25', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-25', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-26', esc_attr__( 'Lieu', 'flying-bird' ), 'vsel_field_callback_26', 'vsel-widget', 'vsel-widget-section' );
	register_setting( 'vsel-widget-options', 'vsel-setting-26', array('sanitize_callback' => 'sanitize_text_field') );

	// single event section
	add_settings_section( 'vsel-single-section', esc_attr__( 'Évènement unique', 'flying-bird' ), 'vsel_single_section_callback', 'vsel-single' );

	add_settings_field( 'vsel-field-71', esc_attr__( 'Meta', 'flying-bird' ), 'vsel_field_callback_71', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-71', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-72', esc_attr__( 'Meta', 'flying-bird' ), 'vsel_field_callback_72', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-72', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-74', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_74', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-74', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-75', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_75', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-75', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-73', esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ), 'vsel_field_callback_73', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-73', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-86', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_86', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-86', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-76', esc_attr__( 'Heure', 'flying-bird' ), 'vsel_field_callback_76', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-76', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-77', esc_attr__( 'Lieu', 'flying-bird' ), 'vsel_field_callback_77', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-77', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-78', esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ), 'vsel_field_callback_78', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-78', array('sanitize_callback' => 'sanitize_key') );

	add_settings_field( 'vsel-field-79', esc_attr__( 'Lien pour plus d\'informations', 'flying-bird' ), 'vsel_field_callback_79', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-79', array('sanitize_callback' => 'sanitize_key') );

	if( class_exists('acf') ) {
		add_settings_field( 'vsel-field-80', esc_attr__( 'Champs ACF', 'flying-bird' ), 'vsel_field_callback_80', 'vsel-single', 'vsel-single-section' );
		register_setting( 'vsel-single-options', 'vsel-setting-80', array('sanitize_callback' => 'sanitize_key') );
	}

	add_settings_field( 'vsel-field-81', esc_attr__( 'Date', 'flying-bird' ), 'vsel_field_callback_81', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-81', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-82', esc_attr__( 'Date de départ', 'flying-bird' ), 'vsel_field_callback_82', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-82', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-83', esc_attr__( 'Date de fin', 'flying-bird' ), 'vsel_field_callback_83', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-83', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-84', esc_attr__( 'Heure', 'flying-bird' ), 'vsel_field_callback_84', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-84', array('sanitize_callback' => 'sanitize_text_field') );

	add_settings_field( 'vsel-field-85', esc_attr__( 'Lieu', 'flying-bird' ), 'vsel_field_callback_85', 'vsel-single', 'vsel-single-section' );
	register_setting( 'vsel-single-options', 'vsel-setting-85', array('sanitize_callback' => 'sanitize_text_field') );
}
add_action( 'admin_init', 'vsel_admin_init' );

// section callbacks
function vsel_single_section_callback() {
	?>
	<p><?php esc_attr_e( 'La prise en charge de la page des événements uniques et du modèle des événements uniques doit être active.', 'flying-bird' ); ?></p>
	<p><?php esc_attr_e( 'Le titre, les informations et l\'image d\'entête sont gérés par votre thème.', 'flying-bird' ); ?></p>
	<?php
}

function vsel_widget_section_callback() {
	?>
	<p><?php printf( esc_attr__( 'La section Meta et la section d\'informations sur l\'événement sont en pleine largeur lors de l\'utilisation du widget.', 'flying-bird' ), esc_attr__( 'Info', 'flying-bird' ) ); ?></p>
	<?php
}

// general field callbacks
function vsel_field_callback() {
	$value = esc_attr( get_option( 'vsel-setting' ) );
	?>
	<input type='hidden' name='vsel-setting' value='no'>
	<label><input type='checkbox' name='vsel-setting' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Ne pas supprimer les événements ainsi que le paramétrage lors de la désinstallation.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_38() {
	$placeholder = esc_attr( get_option( 'date_format' ) );
	$value = esc_attr( get_option( 'vsel-setting-38' ) );
	?>
	<input type='text' size='40' maxlength='10' name='vsel-setting-38' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<?php
}

function vsel_field_callback_58() {
	$value = esc_attr( get_option( 'vsel-setting-58' ) );
	?>
	<input type='hidden' name='vsel-setting-58' value='no'>
	<label><input type='checkbox' name='vsel-setting-58' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Une unique date plutôt qu\'une date de début et de fin.', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte pas les événements existants.', 'flying-bird' ); ?></i></p>
	<p><i><?php esc_attr_e( 'Vous pourrez toujours revenir au format précédent.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_69() {
	$placeholder = esc_attr( '-' );
	$value = esc_attr( get_option( 'vsel-setting-69' ) );
	?>
	<input type='text' size='40' maxlength='10' name='vsel-setting-69' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<?php
}

function vsel_field_callback_70() {
	$placeholder = esc_attr( '|' );
	$value = esc_attr( get_option( 'vsel-setting-70' ) );
	?>
	<input type='text' size='40' maxlength='10' name='vsel-setting-70' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<?php
}

function vsel_field_callback_55() {
	$value = esc_attr( get_option( 'vsel-setting-55' ) );
	?>
	<input type='hidden' name='vsel-setting-55' value='no'>
	<label><input type='checkbox' name='vsel-setting-55' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Désactiver la colonne dans le tableau de bord.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_56() {
	$value = esc_attr( get_option( 'vsel-setting-56' ) );
	?>
	<input type='hidden' name='vsel-setting-56' value='no'>
	<label><input type='checkbox' name='vsel-setting-56' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Désactiver la colonne dans le tableau de bord.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_57() {
	$value = esc_attr( get_option( 'vsel-setting-57' ) );
	?>
	<input type='hidden' name='vsel-setting-57' value='no'>
	<label><input type='checkbox' name='vsel-setting-57' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Désactiver la colonne dans le tableau de bord.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_61() {
	$value = esc_attr( get_option( 'vsel-setting-61' ) );
	?>
	<input type='hidden' name='vsel-setting-61' value='no'>
	<label><input type='checkbox' name='vsel-setting-61' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Désactiver la colonne dans le tableau de bord.', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cette colonne affiche votre commande personnalisée pour les événements avec la même date.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_50() {
	$value = esc_attr( get_option( 'vsel-setting-50' ) );
	?>
	<input type='hidden' name='vsel-setting-50' value='no'>
	<label><input type='checkbox' name='vsel-setting-50' <?php checked( $value, 'yes' ); ?> value='yes'> <?php printf( esc_attr__( 'Désactiver la prise en charge de la page %s.', 'flying-bird' ), esc_attr__( 'Menu', 'flying-bird' ) ); ?></label>
	<p><i><?php esc_attr_e( 'Ce support est ajouté pour rendre Flying Bird compatible avec les plugins de création de pages.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_60() {
	$value = esc_attr( get_option( 'vsel-setting-60' ) );
	?>
	<input type='hidden' name='vsel-setting-60' value='no'>
	<label><input type='checkbox' name='vsel-setting-60' <?php checked( $value, 'yes' ); ?> value='yes'> <?php printf( esc_attr__( 'Désactiver la prise en charge de la page %s.', 'flying-bird' ), esc_attr__( 'Évènement unique', 'flying-bird' ) ); ?></label>
	<?php
}

function vsel_field_callback_39() {
	$value = esc_attr( get_option( 'vsel-setting-39' ) );
	?>
	<input type='hidden' name='vsel-setting-39' value='no'>
	<label><input type='checkbox' name='vsel-setting-39' <?php checked( $value, 'yes' ); ?> value='yes'> <?php printf( esc_attr__( 'Désactiver la prise en charge du modèle %s.', 'flying-bird' ), esc_attr__( 'Évènement unique', 'flying-bird' ) ); ?></label>
	<?php
}

function vsel_field_callback_48() {
	$value = esc_attr( get_option( 'vsel-setting-48' ) );
	$link_label = __( 'Permalinks', 'flying-bird' );
	$link_permalinks = '<a href="'.admin_url( 'options-permalink.php' ).'">'.$link_label.'</a>';
	?>
	<input type='hidden' name='vsel-setting-48' value='no'>
	<label><input type='checkbox' name='vsel-setting-48' <?php checked( $value, 'yes' ); ?> value='yes'> <?php printf( esc_attr__( 'Désactiver la prise en charge du %s.', 'flying-bird' ), esc_attr__( 'Archive des types d\'évènements', 'flying-bird' ) ); ?></label>
	<p><strong><i><?php printf( esc_attr__( 'Sauvegarder de nouveau vos %s après avoir changé ce paramètre.', 'flying-bird' ), $link_permalinks ); ?></i></strong></p>
	<p><i><?php printf( esc_attr__( 'La page %s n\'est pas générée par Flying Bird. Les événements ne sont pas classés par date d\'événement.', 'flying-bird' ), esc_attr__( 'Archive des types d\'évènements', 'flying-bird' ) ); ?></i></p>
	<p><i><?php esc_attr_e( 'Ce support est ajouté pour rendre Flying Bird compatible avec les plugins de création de pages.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_43() {
	$value = esc_attr( get_option( 'vsel-setting-43' ) );
	?>
	<input type='hidden' name='vsel-setting-43' value='no'>
	<label><input type='checkbox' name='vsel-setting-43' <?php checked( $value, 'yes' ); ?> value='yes'> <?php printf( esc_attr__( 'Désactiver la prise en charge du modèle %s.', 'flying-bird' ), esc_attr__( 'Archive des types d\'évènements', 'flying-bird' ) ); ?></label>
	<p><i><?php printf( esc_attr__( 'La page %s n\'est pas générée par Flying Bird. Les événements ne sont pas classés par date d\'événement.', 'flying-bird' ), esc_attr__( 'Archive des types d\'évènements', 'flying-bird' ) ); ?></i></p>
	<p><i><?php esc_attr_e( 'Ce support est ajouté pour rendre Flying Bird compatible avec les plugins de création de pages.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_40() {
	$value = esc_attr( get_option( 'vsel-setting-40' ) );
	?>
	<input type='hidden' name='vsel-setting-40' value='no'>
	<label><input type='checkbox' name='vsel-setting-40' <?php checked( $value, 'yes' ); ?> value='yes'> <?php printf( esc_attr__( 'Désactiver la prise en charge du modèle %s.', 'flying-bird' ), esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ) ); ?></label>
	<p><i><?php printf( esc_attr__( 'La page %s n\'est pas générée par Flying Bird. Les événements ne sont pas classés par date d\'événement.', 'flying-bird' ), esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ) ); ?></i></p>
	<p><i><?php esc_attr_e( 'Ce support est ajouté pour rendre Flying Bird compatible avec les plugins de création de pages.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_41() {
	$value = esc_attr( get_option( 'vsel-setting-41' ) );
	?>
	<input type='hidden' name='vsel-setting-41' value='no'>
	<label><input type='checkbox' name='vsel-setting-41' <?php checked( $value, 'yes' ); ?> value='yes'> <?php printf( esc_attr__( 'Désactiver la prise en charge du modèle %s.', 'flying-bird' ), esc_attr__( 'Search Results', 'flying-bird' ) ); ?></label>
	<p><i><?php printf( esc_attr__( 'La page %s n\'est pas générée par Flying Bird. Les événements ne sont pas classés par date d\'événement.', 'flying-bird' ), esc_attr__( 'Search Results', 'flying-bird' ) ); ?></i></p>
	<p><i><?php esc_attr_e( 'Ce support est ajouté pour rendre Flying Bird compatible avec les plugins de création de pages.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_46() {
	$placeholder = 'event';
	$value = esc_attr( get_option( 'vsel-setting-46' ) );
	?>
	<input type='text' size='40' maxlength='25' name='vsel-setting-46' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<?php
	$link_label = __( 'Permalinks', 'flying-bird' );
	$link_permalinks = '<a href="'.admin_url( 'options-permalink.php' ).'">'.$link_label.'</a>';
	?>
	<p><strong><i><?php printf( esc_attr__( 'Sauvegarder de nouveau vos %s après avoir changé ce paramètre.', 'flying-bird' ), $link_permalinks ); ?></i></strong></p>
	<?php
}

function vsel_field_callback_47() {
	$placeholder = 'event_cat';
	$value = esc_attr( get_option( 'vsel-setting-47' ) );
	?>
	<input type='text' size='40' maxlength='25' name='vsel-setting-47' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<?php
	$link_label = __( 'Permalinks', 'flying-bird' );
	$link_permalinks = '<a href="'.admin_url( 'options-permalink.php' ).'">'.$link_label.'</a>';
	?>
	<p><strong><i><?php printf( esc_attr__( 'Sauvegarder de nouveau vos %s après avoir changé ce paramètre.', 'flying-bird' ), $link_permalinks ); ?></i></strong></p>
	<?php
}

// page field callbacks
function vsel_field_callback_66() {
	$value = esc_attr( get_option( 'vsel-setting-66' ) );
	$placeholder = '36';
	?>
	<label><input type='number' size='10' min='20' max='60' maxlength='3' name='vsel-setting-66' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' /> <?php printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), '36' ); ?></label>
	<p><i><?php esc_attr_e( 'Taille de la section Meta de vos évènements.', 'flying-bird' ); ?></i></p>
	<p><strong><i><?php esc_attr_e( 'L\'image et les informations mises en avant ne doivent pas être masquées.', 'flying-bird' ); ?></i></strong></p>
	<?php
}

function vsel_field_callback_35() {
	$value = esc_attr( get_option( 'vsel-setting-35' ) );
 	?>
	<select id='vsel-setting-35' name='vsel-setting-35'>
		<option value='left'<?php echo ($value == 'left') ? 'selected' : ''; ?>><?php esc_attr_e( 'Alignement : gauche', 'flying-bird' ); ?></option>
		<option value='right'<?php echo ($value == 'right') ? 'selected' : ''; ?>><?php esc_attr_e( 'Alignement : droit', 'flying-bird' ); ?></option>
	</select>
	<?php
	printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), esc_attr__( 'Alignement : gauche', 'flying-bird' ) );
}

function vsel_field_callback_59() {
	$value = esc_attr( get_option( 'vsel-setting-59' ) );
	?>
	<input type='hidden' name='vsel-setting-59' value='no'>
	<label><input type='checkbox' name='vsel-setting-59' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Afficher au dessus (en dehors de la section Meta des évènements)).', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte que les pages où vous avez ajouté un shortcode.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_9() {
	$value = esc_attr( get_option( 'vsel-setting-9' ) );
	?>
	<input type='hidden' name='vsel-setting-9' value='no'>
	<label><input type='checkbox' name='vsel-setting-9' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Lien vers la page de l\'évènement.', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte que les pages où vous avez ajouté un shortcode.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_62() {
	$value = esc_attr( get_option( 'vsel-setting-62' ) );
	?>
	<input type='hidden' name='vsel-setting-62' value='no'>
	<label><input type='checkbox' name='vsel-setting-62' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Afficher une icône de date plutôt qu\'une étiquette.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_68() {
	$value = esc_attr( get_option( 'vsel-setting-68' ) );
	?>
	<input type='hidden' name='vsel-setting-68' value='no'>
	<label><input type='checkbox' name='vsel-setting-68' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Combine l\'icône de date et le titre.', 'flying-bird' ); ?></label>
	<p><strong><i><?php esc_attr_e( 'Les icônes de date doivent êtres actives.', 'flying-bird' ); ?></i></strong></p>
	<p><strong><i><?php esc_attr_e( 'Le titre et la date ne doivent pas être masqués.', 'flying-bird' ); ?></i></strong></p>
	<p><strong><i><?php esc_attr_e( 'Le titre ne doit pas être affiché en haut.', 'flying-bird' ); ?></i></strong></p>
	<p><i><?php esc_attr_e( 'Cela n\'affecte que les pages où vous avez ajouté un shortcode.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_15() {
	$value = esc_attr( get_option( 'vsel-setting-15' ) );
	?>
	<input type='hidden' name='vsel-setting-15' value='no'>
	<label><input type='checkbox' name='vsel-setting-15' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Combine la date de début ainsi que la date de fin dans une seule étiquette.', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte pas les icônes de date.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_36() {
	$value = esc_attr( get_option( 'vsel-setting-36' ) );
 	?>
	<select id='vsel-setting-36' name='vsel-setting-36'>
		<option value='right'<?php echo ($value == 'right') ? 'selected' : ''; ?>><?php esc_attr_e( 'Alignement : droit', 'flying-bird' ); ?></option>
		<option value='left'<?php echo ($value == 'left') ? 'selected' : ''; ?>><?php esc_attr_e( 'Alignement : gauche', 'flying-bird' ); ?></option>
	</select>
	<?php
	printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), esc_attr__( 'Alignement : droit', 'flying-bird' ) );
}

function vsel_field_callback_30() {
	$value = esc_attr( get_option( 'vsel-setting-30' ) );
 	?>
	<select id='vsel-setting-30' name='vsel-setting-30'>
		<option value='post-thumbnail'<?php echo ($value == 'post-thumbnail') ? 'selected' : ''; ?>><?php esc_attr_e( 'Vignette des évènements', 'flying-bird' ); ?></option>
		<option value='large'<?php echo ($value == 'large') ? 'selected' : ''; ?>><?php esc_attr_e( 'Large', 'flying-bird' ); ?></option>
		<option value='medium'<?php echo ($value == 'medium') ? 'selected' : ''; ?>><?php esc_attr_e( 'Medium', 'flying-bird' ); ?></option>
		<option value='small'<?php echo ($value == 'small') ? 'selected' : ''; ?>><?php esc_attr_e( 'Small', 'flying-bird' ); ?></option>
	</select>
	<?php printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), esc_attr__( 'Vignette des évènements', 'flying-bird' ) ); ?>
	<p><i><?php esc_attr_e( 'Cette taille est utilisée comme source pour l\'image d\'entête.', 'flying-bird' ); ?></i></p>
	<p><i><?php esc_attr_e( 'La taille de la vignette de l\'évènement peut varier selon votre thème.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_53() {
	$value = esc_attr( get_option( 'vsel-setting-53' ) );
	$placeholder = '40';
	?>
	<label><input type='number' size='10' min='20' max='100' maxlength='3' name='vsel-setting-53' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' /> <?php printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), '40' ); ?></label>
	<p><i><?php esc_attr_e( 'Taille maximale de l\'image d\'entête.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_29() {
	$value = esc_attr( get_option( 'vsel-setting-29' ) );
	?>
	<input type='hidden' name='vsel-setting-29' value='no'>
	<label><input type='checkbox' name='vsel-setting-29' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Lien vers la page de l\'évènement.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_13() {
	$value = esc_attr( get_option( 'vsel-setting-13' ) );
	?>
	<input type='hidden' name='vsel-setting-13' value='no'>
	<label><input type='checkbox' name='vsel-setting-13' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Affiche le résumé plutôt que toutes les informations.', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte que les pages où vous avez ajouté un shortcode.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_44() {
	$value = esc_attr( get_option( 'vsel-setting-44' ) );
	?>
	<input type='hidden' name='vsel-setting-44' value='no'>
	<label><input type='checkbox' name='vsel-setting-44' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Lien vers la page des catégories.', 'flying-bird' ); ?></label>
	<p><i><?php printf( esc_attr__( 'La page %s n\'est pas générée par Flying Bird. Les événements ne sont pas classés par date d\'événement.', 'flying-bird' ), esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_64() {
	$value = esc_attr( get_option( 'vsel-setting-64' ) );
	?>
	<input type='hidden' name='vsel-setting-64' value='no'>
	<label><input type='checkbox' name='vsel-setting-64' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte que les pages où vous avez ajouté un shortcode.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_8() {
	$value = esc_attr( get_option( 'vsel-setting-8' ) );
	?>
	<input type='hidden' name='vsel-setting-8' value='no'>
	<label><input type='checkbox' name='vsel-setting-8' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_11() {
	$value = esc_attr( get_option( 'vsel-setting-11' ) );
	?>
	<input type='hidden' name='vsel-setting-11' value='no'>
	<label><input type='checkbox' name='vsel-setting-11' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_12() {
	$value = esc_attr( get_option( 'vsel-setting-12' ) );
	?>
	<input type='hidden' name='vsel-setting-12' value='no'>
	<label><input type='checkbox' name='vsel-setting-12' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_33() {
	$value = esc_attr( get_option( 'vsel-setting-33' ) );
	?>
	<input type='hidden' name='vsel-setting-33' value='no'>
	<label><input type='checkbox' name='vsel-setting-33' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_27() {
	$value = esc_attr( get_option( 'vsel-setting-27' ) );
	?>
	<input type='hidden' name='vsel-setting-27' value='no'>
	<label><input type='checkbox' name='vsel-setting-27' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_28() {
	$value = esc_attr( get_option( 'vsel-setting-28' ) );
	?>
	<input type='hidden' name='vsel-setting-28' value='no'>
	<label><input type='checkbox' name='vsel-setting-28' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_10() {
	$value = esc_attr( get_option( 'vsel-setting-10' ) );
	?>
	<input type='hidden' name='vsel-setting-10' value='no'>
	<label><input type='checkbox' name='vsel-setting-10' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_42() {
	$value = esc_attr( get_option( 'vsel-setting-42' ) );
	?>
	<input type='hidden' name='vsel-setting-42' value='no'>
	<label><input type='checkbox' name='vsel-setting-42' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte que les pages où vous avez ajouté un shortcode.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_51() {
	$value = esc_attr( get_option( 'vsel-setting-51' ) );
	?>
	<input type='hidden' name='vsel-setting-51' value='no'>
	<label><input type='checkbox' name='vsel-setting-51' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_16() {
	$placeholder = esc_attr__( 'Date: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-16' ) );
	?>
	<input type='text' size='40' name='vsel-setting-16' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_17() {
	$placeholder = esc_attr__( 'Date de départ: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-17' ) );
	?>
	<input type='text' size='40' name='vsel-setting-17' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date de départ', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_18() {
	$placeholder = esc_attr__( 'Date de fin: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-18' ) );
	?>
	<input type='text' size='40' name='vsel-setting-18' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date de fin', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_19() {
	$placeholder = esc_attr__( 'Heure: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-19' ) );
	?>
	<input type='text' size='40' name='vsel-setting-19' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Heure', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_20() {
	$placeholder = esc_attr__( 'Lieu: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-20' ) );
	?>
	<input type='text' size='40' name='vsel-setting-20' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Lieu', 'flying-bird' ) ); ?></i></p>
	<?php
}

// widget field callbacks
function vsel_field_callback_14() {
	$value = esc_attr( get_option( 'vsel-setting-14' ) );
	?>
	<input type='hidden' name='vsel-setting-14' value='no'>
	<label><input type='checkbox' name='vsel-setting-14' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Lien vers la page de l\'évènement.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_63() {
	$value = esc_attr( get_option( 'vsel-setting-63' ) );
	?>
	<input type='hidden' name='vsel-setting-63' value='no'>
	<label><input type='checkbox' name='vsel-setting-63' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Afficher une icône de date plutôt qu\'une étiquette.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_67() {
	$value = esc_attr( get_option( 'vsel-setting-67' ) );
	?>
	<input type='hidden' name='vsel-setting-67' value='no'>
	<label><input type='checkbox' name='vsel-setting-67' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Combine l\'icône de date et le titre.', 'flying-bird' ); ?></label>
	<p><strong><i><?php esc_attr_e( 'Les icônes de date doivent être actives.', 'flying-bird' ); ?></i></strong></p>
	<p><strong><i><?php esc_attr_e( 'Le titre et la date ne doivent pas être masqués.', 'flying-bird' ); ?></i></strong></p>
	<?php
}

function vsel_field_callback_21() {
	$value = esc_attr( get_option( 'vsel-setting-21' ) );
	?>
	<input type='hidden' name='vsel-setting-21' value='no'>
	<label><input type='checkbox' name='vsel-setting-21' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Combine la date de début ainsi que la date de fin dans une seule étiquette.', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte pas les icônes de date.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_37() {
	$value = esc_attr( get_option( 'vsel-setting-37' ) );
 	?>
	<select id='vsel-setting-37' name='vsel-setting-37'>
		<option value='right'<?php echo ($value == 'right') ? 'selected' : ''; ?>><?php esc_attr_e( 'Alignement : droit', 'flying-bird' ); ?></option>
		<option value='left'<?php echo ($value == 'left') ? 'selected' : ''; ?>><?php esc_attr_e( 'Alignement : gauche', 'flying-bird' ); ?></option>
	</select>
	<?php
	printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), esc_attr__( 'Alignement : droit', 'flying-bird' ) );
}

function vsel_field_callback_32() {
	$value = esc_attr( get_option( 'vsel-setting-32' ) );
 	?>
	<select id='vsel-setting-32' name='vsel-setting-32'>
		<option value='post-thumbnail'<?php echo ($value == 'post-thumbnail') ? 'selected' : ''; ?>><?php esc_attr_e( 'Vignette des évènements', 'flying-bird' ); ?></option>
		<option value='large'<?php echo ($value == 'large') ? 'selected' : ''; ?>><?php esc_attr_e( 'Large', 'flying-bird' ); ?></option>
		<option value='medium'<?php echo ($value == 'medium') ? 'selected' : ''; ?>><?php esc_attr_e( 'Moyen', 'flying-bird' ); ?></option>
		<option value='small'<?php echo ($value == 'small') ? 'selected' : ''; ?>><?php esc_attr_e( 'Petit', 'flying-bird' ); ?></option>
	</select>
	<?php printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), esc_attr__( 'Vignette des évènements', 'flying-bird' ) ); ?>
	<p><i><?php esc_attr_e( 'Cette taille est utilisée comme source pour l\'image d\'entête.', 'flying-bird' ); ?></i></p>
	<p><i><?php esc_attr_e( 'La taille de la vignette de l\'évènement peut varier selon le thème.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_54() {
	$value = esc_attr( get_option( 'vsel-setting-54' ) );
	$placeholder = '40';
	?>
	<label><input type='number' size='10' min='20' max='100' maxlength='3' name='vsel-setting-54' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' /> <?php printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), '40' ); ?></label>
	<p><i><?php esc_attr_e( 'Taille maximale de l\'image d\'entête.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_31() {
	$value = esc_attr( get_option( 'vsel-setting-31' ) );
	?>
	<input type='hidden' name='vsel-setting-31' value='no'>
	<label><input type='checkbox' name='vsel-setting-31' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Lien vers la page de l\'évènement.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_1() {
	$value = esc_attr( get_option( 'vsel-setting-1' ) );
	?>
	<input type='hidden' name='vsel-setting-1' value='no'>
	<label><input type='checkbox' name='vsel-setting-1' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Affiche le résumé plutôt que toutes les informations.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_45() {
	$value = esc_attr( get_option( 'vsel-setting-45' ) );
	?>
	<input type='hidden' name='vsel-setting-45' value='no'>
	<label><input type='checkbox' name='vsel-setting-45' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Lien vers la page des catégories.', 'flying-bird' ); ?></label>
	<p><i><?php printf( esc_attr__( 'La page %s n\'est pas générée par Flying Bird. Les événements ne sont pas classés par date d\'événement.', 'flying-bird' ), esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_65() {
	$value = esc_attr( get_option( 'vsel-setting-65' ) );
	?>
	<input type='hidden' name='vsel-setting-2' value='no'>
	<label><input type='checkbox' name='vsel-setting-65' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_2() {
	$value = esc_attr( get_option( 'vsel-setting-2' ) );
	?>
	<input type='hidden' name='vsel-setting-2' value='no'>
	<label><input type='checkbox' name='vsel-setting-2' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_3() {
	$value = esc_attr( get_option( 'vsel-setting-3' ) );
	?>
	<input type='hidden' name='vsel-setting-3' value='no'>
	<label><input type='checkbox' name='vsel-setting-3' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_4() {
	$value = esc_attr( get_option( 'vsel-setting-4' ) );
	?>
	<input type='hidden' name='vsel-setting-4' value='no'>
	<label><input type='checkbox' name='vsel-setting-4' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_34() {
	$value = esc_attr( get_option( 'vsel-setting-34' ) );
	?>
	<input type='hidden' name='vsel-setting-34' value='no'>
	<label><input type='checkbox' name='vsel-setting-34' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_5() {
	$value = esc_attr( get_option( 'vsel-setting-5' ) );
	?>
	<input type='hidden' name='vsel-setting-5' value='no'>
	<label><input type='checkbox' name='vsel-setting-5' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_7() {
	$value = esc_attr( get_option( 'vsel-setting-7' ) );
	?>
	<input type='hidden' name='vsel-setting-7' value='no'>
	<label><input type='checkbox' name='vsel-setting-7' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_6() {
	$value = esc_attr( get_option( 'vsel-setting-6' ) );
	?>
	<input type='hidden' name='vsel-setting-6' value='no'>
	<label><input type='checkbox' name='vsel-setting-6' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_52() {
	$value = esc_attr( get_option( 'vsel-setting-52' ) );
	?>
	<input type='hidden' name='vsel-setting-52' value='no'>
	<label><input type='checkbox' name='vsel-setting-52' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_22() {
	$placeholder = esc_attr__( 'Date: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-22' ) );
	?>
	<input type='text' size='40' name='vsel-setting-22' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_23() {
	$placeholder = esc_attr__( 'Date de départ: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-23' ) );
	?>
	<input type='text' size='40' name='vsel-setting-23' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date de départ', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_24() {
	$placeholder = esc_attr__( 'Date de fin: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-24' ) );
	?>
	<input type='text' size='40' name='vsel-setting-24' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date de fin', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_25() {
	$placeholder = esc_attr__( 'Heure: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-25' ) );
	?>
	<input type='text' size='40' name='vsel-setting-25' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Heure', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_26() {
	$placeholder = esc_attr__( 'Lieu: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-26' ) );
	?>
	<input type='text' size='40' name='vsel-setting-26' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Lieu', 'flying-bird' ) ); ?></i></p>
	<?php
}

// single event field callbacks
function vsel_field_callback_71() {
	$value = esc_attr( get_option( 'vsel-setting-71' ) );
	$placeholder = '36';
	?>
	<label><input type='number' size='10' min='20' max='60' maxlength='3' name='vsel-setting-71' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' /> <?php printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), '36' ); ?></label>
	<p><i><?php esc_attr_e( 'Taille de la section Meta des évènements.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_72() {
	$value = esc_attr( get_option( 'vsel-setting-72' ) );
 	?>
	<select id='vsel-setting-72' name='vsel-setting-72'>
		<option value='left'<?php echo ($value == 'left') ? 'selected' : ''; ?>><?php esc_attr_e( 'Alignement : gauche', 'flying-bird' ); ?></option>
		<option value='right'<?php echo ($value == 'right') ? 'selected' : ''; ?>><?php esc_attr_e( 'Alignement : droit', 'flying-bird' ); ?></option>
	</select>
	<?php
	printf( esc_attr__( 'Valeur par défaut : %s.', 'flying-bird' ), esc_attr__( 'Alignement : gauche', 'flying-bird' ) );
}

function vsel_field_callback_74() {
	$value = esc_attr( get_option( 'vsel-setting-74' ) );
	?>
	<input type='hidden' name='vsel-setting-74' value='no'>
	<label><input type='checkbox' name='vsel-setting-74' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Afficher une icône de date plutôt qu\'une étiquette.', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_75() {
	$value = esc_attr( get_option( 'vsel-setting-75' ) );
	?>
	<input type='hidden' name='vsel-setting-75' value='no'>
	<label><input type='checkbox' name='vsel-setting-75' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Combine la date de début ainsi que la date de fin dans une seule étiquette.', 'flying-bird' ); ?></label>
	<p><i><?php esc_attr_e( 'Cela n\'affecte pas les icônes de date.', 'flying-bird' ); ?></i></p>
	<?php
}

function vsel_field_callback_73() {
	$value = esc_attr( get_option( 'vsel-setting-73' ) );
	?>
	<input type='hidden' name='vsel-setting-73' value='no'>
	<label><input type='checkbox' name='vsel-setting-73' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Lien vers la page des catégories.', 'flying-bird' ); ?></label>
	<p><i><?php printf( esc_attr__( 'La page %s n\'est pas générée par Flying Bird. Les événements ne sont pas classés par date d\'événement.', 'flying-bird' ), esc_attr__( 'Catégorie de l\'évènement', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_86() {
	$value = esc_attr( get_option( 'vsel-setting-86' ) );
	?>
	<input type='hidden' name='vsel-setting-86' value='no'>
	<label><input type='checkbox' name='vsel-setting-86' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_76() {
	$value = esc_attr( get_option( 'vsel-setting-76' ) );
	?>
	<input type='hidden' name='vsel-setting-76' value='no'>
	<label><input type='checkbox' name='vsel-setting-76' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_77() {
	$value = esc_attr( get_option( 'vsel-setting-77' ) );
	?>
	<input type='hidden' name='vsel-setting-77' value='no'>
	<label><input type='checkbox' name='vsel-setting-77' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_78() {
	$value = esc_attr( get_option( 'vsel-setting-78' ) );
	?>
	<input type='hidden' name='vsel-setting-78' value='no'>
	<label><input type='checkbox' name='vsel-setting-78' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_79() {
	$value = esc_attr( get_option( 'vsel-setting-79' ) );
	?>
	<input type='hidden' name='vsel-setting-79' value='no'>
	<label><input type='checkbox' name='vsel-setting-79' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_80() {
	$value = esc_attr( get_option( 'vsel-setting-80' ) );
	?>
	<input type='hidden' name='vsel-setting-80' value='no'>
	<label><input type='checkbox' name='vsel-setting-80' <?php checked( $value, 'yes' ); ?> value='yes'> <?php esc_attr_e( 'Masquer', 'flying-bird' ); ?></label>
	<?php
}

function vsel_field_callback_81() {
	$placeholder = esc_attr__( 'Date: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-81' ) );
	?>
	<input type='text' size='40' name='vsel-setting-81' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_82() {
	$placeholder = esc_attr__( 'Date: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-82' ) );
	?>
	<input type='text' size='40' name='vsel-setting-82' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_83() {
	$placeholder = esc_attr__( 'Date de départ: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-83' ) );
	?>
	<input type='text' size='40' name='vsel-setting-83' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date de départ', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_84() {
	$placeholder = esc_attr__( 'Date de fin: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-84' ) );
	?>
	<input type='text' size='40' name='vsel-setting-84' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Date de fin', 'flying-bird' ) ); ?></i></p>
	<?php
}

function vsel_field_callback_85() {
	$placeholder = esc_attr__( 'Heure: %s', 'flying-bird' );
	$value = esc_attr( get_option( 'vsel-setting-85' ) );
	?>
	<input type='text' size='40' name='vsel-setting-85' placeholder='<?php echo $placeholder; ?>' value='<?php echo $value; ?>' />
	<p><i><?php printf( esc_attr__( 'Utiliser %1$s pour afficher la variable %2$s.', 'flying-bird' ), '%s', esc_attr__( 'Heure', 'flying-bird' ) ); ?></i></p>
	<?php
}

// display admin options page
function vsel_options_page() {
?>
<div class="wrap">
	<h1><?php esc_attr_e( 'Flying Bird', 'flying-bird' ); ?></h1>
	<?php
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'general_options';
	?>
	<h2 class="nav-tab-wrapper">
		<a href="?page=vsel&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Général', 'flying-bird' ); ?></a>
		<a href="?page=vsel&tab=page_options" class="nav-tab <?php echo $active_tab == 'page_options' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Page', 'flying-bird' ); ?></a>
		<a href="?page=vsel&tab=widget_options" class="nav-tab <?php echo $active_tab == 'widget_options' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Widget', 'flying-bird' ); ?></a>
		<a href="?page=vsel&tab=single_options" class="nav-tab <?php echo $active_tab == 'single_options' ? 'nav-tab-active' : ''; ?>"><?php esc_attr_e( 'Évènement unique', 'flying-bird' ); ?></a>
	</h2>
	<form action="options.php" method="POST">
		<?php if( $active_tab == 'general_options' ) {
			settings_fields( 'vsel-general-options' );
			do_settings_sections( 'vsel-general' );
		} elseif( $active_tab == 'page_options' ) {
			settings_fields( 'vsel-page-options' );
			do_settings_sections( 'vsel-page' );
		} elseif( $active_tab == 'widget_options' ) {
			settings_fields( 'vsel-widget-options' );
			do_settings_sections( 'vsel-widget' );
		} else {
			settings_fields( 'vsel-single-options' );
			do_settings_sections( 'vsel-single' );
		}
		submit_button(); ?>
	</form>
	<p><?php esc_attr_e( 'Davantage de personnalisations peuvent être effectuées en utilisant les attributs (shortcode).', 'flying-bird' ); ?></p>
	<?php $link_label = __( 'cliquez-ici', 'flying-bird' ); ?>
	<?php $link_wp = '<a href="https://github.com/BeruNoir/flying-bird#shortcode-attributes" target="_blank">'.$link_label.'</a>'; ?>
	<p><?php printf( esc_attr__( 'Pour information la liste des attributs est en ligne, %s.', 'flying-bird' ), $link_wp ); ?></p>
</div>
<?php
}
