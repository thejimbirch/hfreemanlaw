<?php
/**
 * WPSEO plugin file.
 *
 * @package WPSEO\Admin
 */

/**
 * Exposes shortlinks in a global, so that we can pass them to our Javascript components.
 */
class WPSEO_Expose_Shortlinks implements WPSEO_WordPress_Integration {

	/**
	 * @var array Array containing the keys and shortlinks.
	 */
	private $shortlinks = array(
		'shortlinks.focus_keyword_info'                             => 'https://yoa.st/focus-keyword',
		'shortlinks.snippet_preview_info'                           => 'https://yoa.st/snippet-preview',
		'shortlinks.cornerstone_content_info'                       => 'https://yoa.st/1i9',
		'shortlinks.upsell.sidebar.focus_keyword_synonyms_link'     => 'https://yoa.st/textlink-synonyms-popup-sidebar',
		'shortlinks.upsell.sidebar.focus_keyword_synonyms_button'   => 'https://yoa.st/keyword-synonyms-popup-sidebar',
		'shortlinks.upsell.sidebar.focus_keyword_additional_link'   => 'https://yoa.st/textlink-keywords-popup-sidebar',
		'shortlinks.upsell.sidebar.focus_keyword_additional_button' => 'https://yoa.st/add-keywords-popup-sidebar',
		'shortlinks.upsell.sidebar.additional_link'                 => 'https://yoa.st/textlink-keywords-sidebar',
		'shortlinks.upsell.sidebar.additional_button'               => 'https://yoa.st/add-keywords-sidebar',
		'shortlinks.upsell.metabox.go_premium'                      => 'https://yoa.st/pe-premium-page',
		'shortlinks.upsell.metabox.focus_keyword_synonyms_link'     => 'https://yoa.st/textlink-synonyms-popup-metabox',
		'shortlinks.upsell.metabox.focus_keyword_synonyms_button'   => 'https://yoa.st/keyword-synonyms-popup',
		'shortlinks.upsell.metabox.focus_keyword_additional_link'   => 'https://yoa.st/textlink-keywords-popup-metabox',
		'shortlinks.upsell.metabox.focus_keyword_additional_button' => 'https://yoa.st/add-keywords-popup',
		'shortlinks.upsell.metabox.additional_link'                 => 'https://yoa.st/textlink-keywords-metabox',
		'shortlinks.upsell.metabox.additional_button'               => 'https://yoa.st/add-keywords-metabox',
		'shortlinks.readability_analysis_info'                      => 'https://yoa.st/readability-analysis',
		'shortlinks.activate_premium_info'                          => 'https://yoa.st/activate-subscription',
		'shortlinks.recalibration_beta_metabox'                     => 'https://yoa.st/recalibration-beta-metabox',
	);

	/**
	 * Registers all hooks to WordPress.
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_filter( 'wpseo_admin_l10n', array( $this, 'expose_shortlinks' ) );
	}

	/**
	 * Adds shortlinks to the passed array.
	 *
	 * @param array $input The array to add shortlinks to.
	 *
	 * @return array The passed array with the additional shortlinks.
	 */
	public function expose_shortlinks( $input ) {
		foreach ( $this->shortlinks as $key => $shortlink ) {
			$input[ $key ] = WPSEO_Shortlinker::get( $shortlink );
		}

		$input['default_query_params'] = WPSEO_Shortlinker::get_query_params();

		return $input;
	}
}
