<?php

// add tab for coming soon meta field in product add page

add_filter( 'woocommerce_product_data_tabs', 'hmwcs_product_data_tab' , 99 , 1 );
function hmwcs_product_data_tab( $product_data_tabs ) {
    $product_data_tabs['hm-custom-tab'] = array(
        'label' => __( 'Hm coming soon', 'hm-woo' ),
        'target' => 'comingsoon_product_data',
    );
    return $product_data_tabs;
}

// add meta filed for cooming soon product

add_action( 'woocommerce_product_data_panels', 'hmwcs_product_data_fields' );
function hmwcs_product_data_fields() {
    global $woocommerce, $post;
    ?>
    
    <div id="comingsoon_product_data" class="panel woocommerce_options_panel">
        <?php
        woocommerce_wp_checkbox( array( 
            'id'            => 'comingsoon_custom_field', 
            'wrapper_class' => 'comingsoon_field', 
            'label'         => __( 'Upcomeing Product', 'hm-woo' ),
            'description'   => __( 'Set coming soon prodduct','hm-woo' ),
            'default'       => '0',
            'desc_tip'      => false,
        ) );

         woocommerce_wp_text_input( array(
         	'id'           => 'comingsoon_available_on',
         	'label'        => __( 'Available On', 'hm-woo' ),
         	'wrapper_class'=> 'comingsoon_available',
         	'description'  => __( 'Insert product available date', 'hm-woo' ) ) );
        ?>

    </div>
    <?php
}


// save product meta field

add_action( 'woocommerce_process_product_meta', 'hmwcs_process_product_meta_fields' );
function hmwcs_process_product_meta_fields( $post_id ){

	// Checkbox
	$woocommerce_checkbox = isset( $_POST['comingsoon_custom_field'] ) ? 'yes' : 'no';
	update_post_meta( $post_id, 'comingsoon_custom_field', $woocommerce_checkbox );

	
    // Text Field
	$woocommerce_text_field = $_POST['comingsoon_available_on'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, 'comingsoon_available_on', esc_attr( $woocommerce_text_field ) );
}

