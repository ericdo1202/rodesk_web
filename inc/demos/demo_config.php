<?php
// Disable regenerating images while importing media
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

// Change some options for the jQuery modal window
function quiety_ocdi_confirmation_dialog_options ( $options ) {
    return array_merge( $options, array(
        'width'       => 400,
        'dialogClass' => 'wp-dialog',
        'resizable'   => false,
        'height'      => 'auto',
        'modal'       => true,
    ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'quiety_ocdi_confirmation_dialog_options', 10, 1 );

function quiety_ocdi_intro_text_( $default_text ) {
    $default_text .= '<div class="ocdi_custom-intro-text notice notice-info inline">';
    $default_text .= sprintf (
        '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        esc_html__( 'Install and activate all ', 'quiety' ),
        get_admin_url(null, 'themes.php?page=tgmpa-install-plugins' ),
        esc_html__( 'required plugins', 'quiety' ),
        esc_html__( 'before you click on the "Import" button.', 'quiety' )
    );
    $default_text .= sprintf (
        ' %1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        esc_html__( 'You will find all the pages in ', 'quiety' ),
        get_admin_url(null, 'edit.php?post_type=page' ),
        esc_html__( 'Pages.', 'quiety' ),
        esc_html__( 'Other pages will be imported along with the main Homepage.', 'quiety' )
    );
    $default_text .= '<br>';
    $default_text .= sprintf (
        '%1$s <a href="%2$s" target="_blank">%3$s</a>',
        esc_html__( 'If you fail to import the demo data, follow the alternative way', 'quiety' ),
        'https://bit.ly/3j3Eo84',
        esc_html__( 'here.', 'quiety' )
    );
    $default_text .= '</div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'quiety_ocdi_intro_text_' );



// OneClick Demo Importer
add_filter( 'pt-ocdi/import_files', 'quiety_import_files' );
function quiety_import_files() {
    return array (

        array(
            'import_file_name'             => esc_html__( 'Saas Company 1', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/1_saas_company.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Saas Company 2', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/2_saas_company_2.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-saas-two/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Desktop App', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/3_desktop_home.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-desktop-app/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'App Landing', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/4_app_landing.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-app-landing/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Software Application', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/5_software_application.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-software-application/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Startup Agency', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/6_startup_agency.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-startup-agency/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Data Analysis', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/7_data_analysis.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-data-analysis/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'App Landing Two', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/8_app_landing_2.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-app-landing-two/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'IT Solution', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/9_it_solution.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-it-solution/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Cyber Security', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/10_cyber_security.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/cyber-security/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Crypto Currency', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/11_crypto_currency.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/home-crypto-currency/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Game Solutions', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/12_game_solutions.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/game-solutions/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Payment Gateway', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/13_payment_getaway.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/payment-getaway/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Digital Marketing', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/14_digital-marketing.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/digital-marketing/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Conference & Event', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/15_conference_event.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/conference-event/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Quiety Insurance', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/16_quiety_insurance.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/quiety-insurance/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__( 'Sass Marketing', 'quiety' ),
            'import_file_url'              => 'https://quiety-wp.themetags.com/file/demo-data/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demos/all/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'inc/demos/img/17_saas_marketing.jpg',
            'preview_url'                  => 'https://quiety-wp.themetags.com/sass-marketing/',
            'local_import_json'            => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demos/all/theme_settings.json',
                    'option_name' => 'tt_framework',
                ),
            ),
        ),


    );
}


function quiety_after_import_setup($selected_import) {

    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array (
            'primary' => $main_menu->term_id,
        )
    );

    // Disable Elementor's Default Colors and Default Fonts
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_global_image_lightbox', '' );

	// Assign front page and posts page (blog page).
	if ( 'Saas Company 1' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home' );
	}

	if ( 'Saas Company 2' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home Saas Two' );
	}

	if ( 'Desktop App' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home Desktop App' );
	}

	if ( 'App Landing' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home App Landing' );
	}

	if ( 'Software Application' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home Software Application' );
	}

	if ( 'Startup Agency' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home Startup Agency' );
	}

	if ( 'Data Analysis' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home Data Analysis' );
	}

	if ( 'App Landing Two' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home App Landing Two' );
	}

	if ( 'IT Solution' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home IT Solution' );
	}

	if ( 'Cyber Security' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home - Cyber Security' );
	}

	if ( 'Crypto Currency' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home Crypto Currency' );
	}

	if ( 'Game Solutions' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home - Game Solutions' );
	}

	if ( 'Payment Gateway' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home - Payment Getaway' );
	}

	if ( 'Digital Marketing' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home - Digital Marketing' );
	}

	if ( 'Conference & Event' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home - Conference & Event' );
	}

	if ( 'Quiety Insurance' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Quiety Insurance' );
	}

	if ( 'Sass Marketing' == $selected_import['import_file_name'] ) {
		$front_page_id = get_page_by_title( 'Home - Sass Marketing' );
	}


    $blog_page_id  = get_page_by_title( 'Blog' );

    // Set the home page and blog page
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}

add_action( 'pt-ocdi/after_import', 'quiety_after_import_setup' );