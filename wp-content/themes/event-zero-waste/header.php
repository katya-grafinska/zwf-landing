<?php
/**
 * Displays the header content
 *
 * @package Theme Freesia
 * @subpackage Event
 * @since Event 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $event_settings = event_get_theme_options(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <!-- Masthead ============================================= -->
        <header id="masthead" class="site-header" role="banner">
            <?php
            if($event_settings['event_header_image_display'] =='top'){
                do_action('event_header_image');
            }?>
            <div class="top-header">
                <div class="container clearfix">
                    <?php
                    if( is_active_sidebar( 'event_header_info' )) {
                        dynamic_sidebar( 'event_header_info' );
                    }
                    if($event_settings['event_top_social_icons'] == 0):
                        echo '<div class="header-social-block">';
                            do_action('event_social_links');
                        echo '</div>'.'<!-- end .header-social-block -->';
                    endif; ?>
                </div> <!-- end .container -->
            </div> <!-- end .top-header -->

            <?php
            if($event_settings['event_header_image_display'] =='bottom'){
                do_action('event_header_image');
            }?>

            <?php do_action('event_site_branding'); ?>
                <?php
                $enable_slider = $event_settings['event_enable_slider'];
                if ($enable_slider=='frontpage'|| $enable_slider=='enitresite'){
                    if(is_front_page() && ($enable_slider=='frontpage') ) {
                        if($event_settings['event_slider_type'] == 'default_slider') {
                                event_sticky_post_sliders();
                        }else{
                            if(class_exists('Event_Plus_Features')):
                                do_action('event_image_sliders');
                            endif;
                        }
                    }
                    if($enable_slider=='enitresite'){
                        if($event_settings['event_slider_type'] == 'default_slider') {
                                event_sticky_post_sliders();
                        }else{
                            if(class_exists('Event_Plus_Features')):
                                do_action('event_image_sliders');
                            endif;
                        }
                    }
                } ?>

                <?php
                    if($event_settings['event_display_book_appoinment'] ==0){
                        $i =1;
                        $event_booking_appointment	= array();
                        $event_booking_appointment	=	array_merge( $event_booking_appointment, array( $event_settings['event_title'] ) );
                        $event_get_booking_posts 		= new WP_Query(array(
                                                'posts_per_page'      	=> $event_settings['event_title'],
                                                'post_type'           	=> array('page'),
                                                'post__in'            	=> $event_booking_appointment,
                                                'orderby'             	=> 'post__in',
                                            ));
                                    if($event_settings['event_date_time'] !='' || $event_settings['event_date_time'] !='' || $event_settings['event_venue'] !='' || $event_settings['event_book_appointment'] !=''){
                                    echo '<!-- Single Event ============================================= -->'; ?>
                                    <div class="single-event-info clearfix">
                                        <div class="container">
                                            <ul class="date-info">
                                            <?php if($event_get_booking_posts->have_posts()):$event_get_booking_posts->the_post();
                                                if($i==1 &&  $event_settings['event_title'] !=''){
                                                    $event_booking_title_attribute = apply_filters('the_title', get_the_title($post->ID)); ?>
                                                    <li><i class="fa fa-calendar"></i><?php echo esc_attr($event_booking_title_attribute); ?></li>
                                                    <?php $i++;
                                                }
                                            endif;
                                                if($event_settings['event_date_time'] !=''){
                                                    echo '<li>'.esc_attr($event_settings['event_date_picker']).'&nbsp;&nbsp;&nbsp;'.esc_attr($event_settings['event_date_time']).'</li>';
                                                }
                                                if($event_settings['event_venue'] !=''){
                                                    echo '<li>'.esc_attr($event_settings['event_venue']).'</li>';
                                                } ?>
                                            </ul>
                                            <?php if($event_settings['event_book_appointment'] !=''){ ?>
                                            <div class="alignright">
                                            <?php if($event_settings['event_book_appointment_url']!=''){ ?>
                                                <a class="appointment-btn btn-eff" href="<?php echo esc_url_raw($event_settings['event_book_appointment_url']); ?>"><i class="fa fa-pencil-square-o"></i><?php echo esc_attr($event_settings['event_book_appointment']); ?></a>
                                            <?php }else{ ?>
                                                <a class="appointment-btn btn-eff" href="<?php the_permalink(); ?>"><i class="fa fa-pencil-square-o"></i><?php echo esc_attr($event_settings['event_book_appointment']); ?></a>
                                            <?php } ?>
                                            </div>
                                            <?php  } ?>
                                        </div>
                                    </div> 	<!-- end .single-event-info -->
                                    <?php }
                        wp_reset_postdata();
                    }
                ?>
        </header> <!-- end #masthead -->

        <!-- Main Page Start ============================================= -->
        <div id="content">
            <?php if(!is_page_template('page-templates/event-corporate.php') ){ ?>
                <div class="container clearfix">
             <?php }

            if(!(is_front_page() || is_page_template('page-templates/event-corporate.php') ) ){
                $custom_page_title = apply_filters( 'event_filter_title', '' ); ?>
                    <div class="page-header">
                    <?php if(is_home() ){ ?>
                        <h2 class="page-title"><?php  echo event_title(); ?></h2>
                    <?php }else{ ?>
                        <h1 class="page-title"><?php  echo event_title(); ?></h1>
                    <?php } ?>
                        <!-- .page-title -->
                        <?php event_breadcrumb(); ?>
                        <!-- .breadcrumb -->
                    </div>
                    <!-- .page-header -->
            <?php }

            if(is_page_template('upcoming-event-template.php') || is_page_template('program-schedule-template.php') ){
                echo '</div><!-- end .container -->';
            }