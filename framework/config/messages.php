<?php

return array(

	////////////////////////////////////////
	// Localized JS Message Configuration //
	////////////////////////////////////////

	/**
	 * Validation Messages
	 */
	'validation' => array(
		'alphabet'     => __('Value needs to be Alphabet', 'alaya'),
		'alphanumeric' => __('Value needs to be Alphanumeric', 'alaya'),
		'numeric'      => __('Value needs to be Numeric', 'alaya'),
		'email'        => __('Value needs to be Valid Email', 'alaya'),
		'url'          => __('Value needs to be Valid URL', 'alaya'),
		'maxlength'    => __('Length needs to be less than {0} characters', 'alaya'),
		'minlength'    => __('Length needs to be more than {0} characters', 'alaya'),
		'maxselected'  => __('Select no more than {0} items', 'alaya'),
		'minselected'  => __('Select at least {0} items', 'alaya'),
		'required'     => __('This is required', 'alaya'),
	),

	/**
	 * Import / Export Messages
	 */
	'util' => array(
		'import_success'    => __('Import succeed, option page will be refreshed..', 'alaya'),
		'import_failed'     => __('Import failed', 'alaya'),
		'export_success'    => __('Export succeed, copy the JSON formatted options', 'alaya'),
		'export_failed'     => __('Export failed', 'alaya'),
		'restore_success'   => __('Restoration succeed, option page will be refreshed..', 'alaya'),
		'restore_nochanges' => __('Options identical to default', 'alaya'),
		'restore_failed'    => __('Restoration failed', 'alaya'),
	),

	/**
	 * Control Fields String
	 */
	'control' => array(
		// select2 select box
		'select2_placeholder' => __('Select option(s)', 'alaya'),
		// fontawesome chooser
		'fac_placeholder'     => __('Select an Icon', 'alaya'),
	),

);

/**
 * EOF
 */