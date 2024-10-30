<?php 


// shop page view//////////////////////////////////////////////////////////////////////
  add_action( 'woocommerce_before_shop_loop_item', 'hmwcs_shop_page_view'  );

     function hmwcs_shop_page_view(){
        global $post;
        
       $_available_on = get_post_meta( $post->ID, 'comingsoon_available_on', true );
       $timezone_format = _x('m/d/Y H:i', 'hm-woo');
        $today =date_i18n( $timezone_format ) ;
        
        if ( WC_Admin_Settings::get_option( 'wc_settings_hm_hide_pricing_shop','no') == 'yes' && hmwcs_comingsoon() ) {
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        } else {
            add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        }
        if (WC_Admin_Settings::get_option( 'wc_settings_hm_hide_cart_button_shop','no') == 'yes' && hmwcs_comingsoon() ) {
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        } else {
            add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        }

        if(strtotime($today)>=strtotime($_available_on) && hmwcs_comingsoon()){
            remove_action( 'woocommerce_after_shop_loop_item', 'hmwcs_upcoming_shop_page_view', 7 );
            remove_filter( 'the_title', 'hmwcs_coming_product_title', 2, 10);
          }
    }


// single page view//////////////////////////////////////////////////////////////////////

     add_action( 'woocommerce_before_single_product', 'hmwcs_single_page_view'  );


       function hmwcs_single_page_view(){ 
         global $post;
        
       $_available_on = get_post_meta( $post->ID, 'comingsoon_available_on', true );
       $timezone_format = _x('m/d/Y H:i', 'hm-woo');
        $today =date_i18n( $timezone_format ) ;
        
        // single page view
        if ( hmwcs_comingsoon()) {

          if( WC_Admin_Settings::get_option( 'wc_settings_hm_hide_pricing_single') == 'yes'){
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
            
          }
          

          if( WC_Admin_Settings::get_option( 'wc_settings_hm_hide_cart_button_single') == 'yes'){
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
          }
           
            
        }

        if( WC_Admin_Settings::get_option( 'wc_settings_hm_display_autocart_single','no') == 'yes'){

          if(strtotime($today)>=strtotime($_available_on)){
            add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
            remove_action( 'woocommerce_single_product_summary', 'hmwcs_display_timer', 15);
            remove_filter( 'the_title', 'hmwcs_coming_product_title', 2, 10);
          }
      }

    }

 
//  add View  Product Button///////////////////////////


add_action( 'woocommerce_after_shop_loop_item', 'hmwcs_view_product_button', 10);
 
function hmwcs_view_product_button() {
    global $product;

    $link = $product->get_permalink();
    if(WC_Admin_Settings::get_option( 'wc_settings_hm_display_view_shop','yes') == 'yes'  && hmwcs_comingsoon()){

      echo '<a href="'.$link.'" class="button addtocartbutton">View Product</a>';

    }


}
 
// add Coming Soon text with title////////////////////

add_filter( 'the_title', 'hmwcs_coming_product_title', 2, 10);

 function hmwcs_coming_product_title( $title, $id )
    {
        if ( is_admin() ) {
            return $title;
        }
        $label     = WC_Admin_Settings::get_option( 'wc_settings_hm_title',esc_html__( 'coming soon', ' hm-woo' ) );
        if ( 'product' == get_post_type( $id ) && hmwcs_comingsoon() && WC_Admin_Settings::get_option( 'hm_enable_coming_soon', 'yes' ) == 'yes' ) {
            $title .= '<br><span class="soon" style="color:'.WC_Admin_Settings::get_option( 'wc_settings_hm_Color_Set','#000').'">(' . esc_html($label) . ')</span>';
        }

        
        return $title;
    }




add_action( 'woocommerce_after_shop_loop_item', 'hmwcs_upcoming_shop_page_view', 7 );



      function hmwcs_upcoming_shop_page_view() {
        

            if ( hmwcs_comingsoon() ) {

            global $post;
      
            $_available_on = get_post_meta( $post->ID, 'comingsoon_available_on', true );

            $timezone_format = _x('m/d/Y H:i', 'hm-woo');
            $today =date_i18n( $timezone_format ) ;
            $son=strtotime($today );
            $mtodaytime= date_i18n(get_option('date_format'),  $son) .' @ '. date_i18n(get_option('time_format'),  $son);
                        ;

                ?>
                <div class="upcoming">
                    <?php _e( 'Available: ', 'hm-woo' );

                    if ( $_available_on == '' ) {
                        ?>
                        <strong>
                            <?php _e( 'Date not yet set.', 'hm-woo' ); ?>
                        </strong>
                        <?php
                    }else {
                        
                        $unixtimestamp    = strtotime($_available_on);
                        $main_time= date_i18n(get_option('date_format'), $unixtimestamp) .' @ '. date_i18n(get_option('time_format'), $unixtimestamp);
                        ;
                        
                        ?>
                        <strong>
                         
                        <?php if( WC_Admin_Settings::get_option( 'wc_settings_hm_display_date_shop', 'yes' ) == 'yes'){
                              echo $main_time;

                        }else{

                          echo __('Coming Soon','hm-woo');
                        }


                         ?>

                        </strong>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
        
    }


// Display Countdown Timer on single page

function hmwcs_display_timer() {
         global $post;
         $_available_on = get_post_meta( $post->ID, 'comingsoon_available_on', true );


         ?>
          <style>
            #theme-1 li{

              background:<?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme1_color_set','rgba(255, 0, 0, 0.46)'); ?>;


              color:<?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme1_font_color','#000'); ?>;
            }
            .time_circles .font-headlines,.time_circles span{
              color:<?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme2_font_color','#000'); ?>;
            }
            .colorDefinition {
              background: <?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme3_back_color','#000'); ?>;
              border-color:<?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme3_border_color','#f0068e'); ?>;
              color: <?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme3_font_color','#fff'); ?>;
            }
            #theme-4 {
              color: <?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme4_font_color',';#00bf96'); ?>;;
  
            }
            #theme-4 > div {
              background: <?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme4_back_color',';#00bf96'); ?>;
              
            }

            #theme-5{
              background: <?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme5_back_color','#000'); ?>;
              border-color:<?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme5_border_color','#f0068e'); ?>;
              color: <?php echo WC_Admin_Settings::get_option( 'wc_settings_hm_theme5_font_color','#fff'); ?>;

            }
 

          </style>


         <?php
       
        
        if(hmwcs_comingsoon() && WC_Admin_Settings::get_option( 'wc_settings_hm_display_date_single','yes') == 'yes'){

             if ( WC_Admin_Settings::get_option( 'wc_settings_hm_theme_set', 'theme1' ) == 'theme1' ) {

                include HM_FILES_DIR . '/templates/hm_comingsoon_theme1.php';

             }
             if ( WC_Admin_Settings::get_option( 'wc_settings_hm_theme_set', 'theme1' ) == 'theme2' ) {

                include HM_FILES_DIR . '/templates/hm_comingsoon_theme2.php';

             }
             if ( WC_Admin_Settings::get_option( 'wc_settings_hm_theme_set', 'theme1' ) == 'theme3' ) {

                include HM_FILES_DIR . '/templates/hm_comingsoon_theme3.php';

             }
             if ( WC_Admin_Settings::get_option( 'wc_settings_hm_theme_set', 'theme1' ) == 'theme4' ) {

                include HM_FILES_DIR . '/templates/hm_comingsoon_theme4.php';

             }
             if ( WC_Admin_Settings::get_option( 'wc_settings_hm_theme_set', 'theme1' ) == 'theme5' ) {

                include HM_FILES_DIR . '/templates/hm_comingsoon_theme5.php';

             }
              

        }


  }     
add_action( 'woocommerce_single_product_summary', 'hmwcs_display_timer',15 ); 
