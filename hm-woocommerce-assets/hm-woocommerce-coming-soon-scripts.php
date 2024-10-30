<?php


if ( ! function_exists('hm_enqueue_woo_scripts') ) {
	function hm_enqueue_woo_scripts() {
		

			

			
			wp_register_script('ui-datepicker-js', HM_FILES_URI . '/admin/js/jquery-ui-timepicker-addon.min.js', array('jquery'), HM_VERSION, true);
			wp_enqueue_script('ui-datepicker-js');
			
			wp_register_script('hm-admin-js', HM_FILES_URI . '/admin/js/admin_custom_js.js', array('jquery'), HM_VERSION, true);
			wp_enqueue_script('hm-admin-js');

			wp_register_style('ui-datepicker', HM_FILES_URI . '/admin/css/jquery-ui-timepicker-addon.min.css',' ', HM_VERSION, 'all');
			wp_enqueue_style('ui-datepicker');

	
			
	}
	add_action( 'admin_enqueue_scripts', 'hm_enqueue_woo_scripts' ); 
}
if ( ! function_exists('hm_enqueue_fontend_scripts') ) {
	function hm_enqueue_fontend_scripts() {
		wp_enqueue_style('TimeCircles', HM_FILES_URI . '/assets/css/TimeCircles.css',' ', HM_VERSION, 'all');
		wp_enqueue_style('countdownTimer', HM_FILES_URI . '/assets/css/countdownTimer.css',' ', HM_VERSION, 'all');
		wp_enqueue_style('hm-woo-custom-style', HM_FILES_URI . '/assets/css/cumtom-style.css',' ', HM_VERSION, 'all');
		
			
			

		wp_register_script('countdownTimer-js', HM_FILES_URI . '/assets/js/jquery.countdownTimer.js', array('jquery'), HM_VERSION, true);
		wp_enqueue_script('countdownTimer-js');

		
		wp_register_script('timer-js', HM_FILES_URI . '/assets/js/TimeCircles.js', array('jquery'), HM_VERSION, false);
		wp_enqueue_script('timer-js');
		
		
		
		wp_register_script('hm-frontend-js', HM_FILES_URI . '/assets/js/custom_script.js', array('jquery'), HM_VERSION, true);
		wp_enqueue_script('hm-frontend-js');
		global $post;

		
    	$_available_on = get_post_meta( $post->ID, 'comingsoon_available_on', true );
    	wp_localize_script( 'hm-frontend-js', 'available_on', array(

    		'date'=>$_available_on,
    		'back_color'=>WC_Admin_Settings::get_option( 'wc_settings_hm_theme2_back_color','#495055'),
    		'day_color'=>WC_Admin_Settings::get_option( 'wc_settings_hm_theme2_day_color','#FC6'),
    		'hour_color'=>WC_Admin_Settings::get_option( 'wc_settings_hm_theme2_hour_color','#9CF'),
    		'min_color'=>WC_Admin_Settings::get_option( 'wc_settings_hm_theme2_minute_color','#BFB'),
    		'sec_color'=>WC_Admin_Settings::get_option( 'wc_settings_hm_theme2_second_color','#F99'),


    		 ));

			

			

			
			
			
	}
	add_action( 'wp_enqueue_scripts', 'hm_enqueue_fontend_scripts' ); 
}



