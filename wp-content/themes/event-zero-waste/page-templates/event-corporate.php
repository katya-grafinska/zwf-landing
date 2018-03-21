<?php
/**
 * Template Name: Event Corporate Template
 *
 * Displays Corporate template.
 *
 * @package Theme Freesia
 * @subpackage Event
 * @since Event 1.0.1
 */
get_header();
$event_settings = event_get_theme_options();
/********************************************************************/
?>
<div id="main" class="clearfix">
<?php

/********************************************************************/
if($event_settings['event_our_speaker_section'] =='above_front_page_feature'){
	do_action('event_display_our_speaker');
}
if($event_settings['event_program_schedule_section'] =='above_front_page_feature'){
	do_action('event_display_program_schedule');
}
if($event_settings['event_our_gallery_section'] =='above_front_page_feature'){
	do_action('event_display_our_gallery');
}
if($event_settings['event_our_testimonial_section'] =='above_front_page_feature'){
	do_action('event_display_our_testimonial');
}
if($event_settings['event_front_page_section'] =='default'){
	do_action('event_display_front_page_features');
}
/********************************************************************/
if($event_settings['event_our_testimonial_section'] =='above_upcoming_event'){
	do_action('event_display_our_testimonial');
}
if($event_settings['event_upcoming_event_section'] =='default'){
	do_action('event_display_upcoming_box');
}
if($event_settings['event_program_schedule_section'] =='above_upcoming_event'){
	do_action('event_display_program_schedule');
}
if($event_settings['event_our_gallery_section'] =='above_upcoming_event'){
	do_action('event_display_our_gallery');
}
if($event_settings['event_front_page_section'] =='below_upcoming_event'){
	do_action('event_display_front_page_features');
}
/*****************************************************************/
if($event_settings['event_our_testimonial_section'] =='above_our_speaker'){
	do_action('event_display_our_testimonial');
}
if($event_settings['event_our_speaker_section'] =='default'){
	do_action('event_display_our_speaker');
}
if($event_settings['event_our_gallery_section'] =='above_our_speaker'){
	do_action('event_display_our_gallery');
}
if($event_settings['event_front_page_section'] =='above_our_speaker'){
	do_action('event_display_front_page_features');
}
if($event_settings['event_upcoming_event_section'] =='below_our_speaker'){
	do_action('event_display_upcoming_box');
}
/*****************************************************************/
if($event_settings['event_our_testimonial_section'] =='above_program_schedule_event'){
	do_action('event_display_our_testimonial');
}
if($event_settings['event_program_schedule_section'] =='default'){
	do_action('event_display_program_schedule');
}
if($event_settings['event_front_page_section'] =='below_program_schedule'){
	do_action('event_display_front_page_features');
}
if($event_settings['event_upcoming_event_section'] =='below_program_schedule'){
	do_action('event_display_upcoming_box');
}
if($event_settings['event_our_speaker_section'] =='below_program_schedule'){
	do_action('event_display_our_speaker');
}
/*****************************************************************/
if(class_exists('Event_Plus_Features')):
	do_action('event_display_timeline');
endif;
/*****************************************************************/
if(class_exists('Event_Plus_Features')):
	do_action('event_display_blog');
endif;
/*****************************************************************/
if($event_settings['event_our_testimonial_section'] =='above_our_gallery'){
	do_action('event_display_our_testimonial');
}
if($event_settings['event_our_gallery_section'] =='default'){
	do_action('event_display_our_gallery');
}
if($event_settings['event_front_page_section'] =='below_our_gallery'){
	do_action('event_display_front_page_features');
}
if($event_settings['event_upcoming_event_section'] =='below_our_gallery'){
	do_action('event_display_upcoming_box');
}
if($event_settings['event_our_speaker_section'] =='below_our_gallery'){
	do_action('event_display_our_speaker');
}
if($event_settings['event_program_schedule_section'] =='below_our_gallery'){
	do_action('event_display_program_schedule');
}

/*****************************************************************/
if($event_settings['event_our_testimonial_section'] =='default'){
	do_action('event_display_our_testimonial');
}
if($event_settings['event_front_page_section'] =='below_our_testimonial'){
	do_action('event_display_front_page_features');
}
if($event_settings['event_upcoming_event_section'] =='below_our_testimonial'){
	do_action('event_display_upcoming_box');
}
if($event_settings['event_our_speaker_section'] =='below_our_testimonial'){
	do_action('event_display_our_speaker');
}
if($event_settings['event_program_schedule_section'] =='below_our_testimonial'){
	do_action('event_display_program_schedule');
}
if($event_settings['event_our_gallery_section'] =='below_our_testimonial'){
	do_action('event_display_our_gallery');
}
?>
</div>
<!-- end #main -->
<?php get_footer();