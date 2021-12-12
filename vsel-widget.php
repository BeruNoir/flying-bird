<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class vsel_widget extends WP_Widget {
	// constructor
	public function __construct() {
		$widget_ops = array( 'classname' => 'vsel-widget', 'description' => esc_attr__('Display your events in a widget.', 'flying-bird') );
		parent::__construct( 'vsel_widget', esc_attr__('Flying Bird', 'flying-bird'), $widget_ops );
	}

	// set widget in dashboard
	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'vsel_title' => '',
			'vsel_text' => '',
			'vsel_shortcode' => '',
			'vsel_attributes' => '',
			'vsel_all_events_link' => '',
			'vsel_all_events_label' => ''
		));
		$vsel_title = !empty( $instance['vsel_title'] ) ? $instance['vsel_title'] : __('Flying Bird', 'flying-bird');
		$vsel_text = $instance['vsel_text'];
		$vsel_shortcode = $instance['vsel_shortcode'];
		$vsel_attributes = $instance['vsel_attributes'];
		$vsel_all_events_link = $instance['vsel_all_events_link'];
		$vsel_all_events_label = $instance['vsel_all_events_label'];

		// widget input fields
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'vsel_title' ); ?>"><?php esc_attr_e('Title', 'flying-bird'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'vsel_title' ); ?>" name="<?php echo $this->get_field_name( 'vsel_title' ); ?>" type="text" value="<?php echo esc_attr( $vsel_title ); ?>">
 		</p>
		<p>
		<label for="<?php echo $this->get_field_id('vsel_text'); ?>"><?php esc_attr_e('Text above event list', 'flying-bird'); ?>:</label>
		<textarea class="widefat monospace" rows="6" cols="20" id="<?php echo $this->get_field_id('vsel_text'); ?>" name="<?php echo $this->get_field_name('vsel_text'); ?>"><?php echo wp_kses_post( $vsel_text ); ?></textarea>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'vsel_shortcode' ); ?>"><?php esc_attr_e( 'List', 'flying-bird' ); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id( 'vsel_shortcode' ); ?>" name="<?php echo $this->get_field_name( 'vsel_shortcode' ); ?>">
			<option value='upcoming'<?php echo ($vsel_shortcode == 'upcoming')?'selected':''; ?>><?php esc_attr_e( 'Upcoming events', 'flying-bird' ); ?></option>
			<option value='future'<?php echo ($vsel_shortcode == 'future')?'selected':''; ?>><?php esc_attr_e( 'Future events', 'flying-bird' ); ?></option>
			<option value='current'<?php echo ($vsel_shortcode == 'current')?'selected':''; ?>><?php esc_attr_e( 'Current events', 'flying-bird' ); ?></option>
			<option value='past'<?php echo ($vsel_shortcode == 'past')?'selected':''; ?>><?php esc_attr_e( 'Past events', 'flying-bird' ); ?></option>
			<option value='all'<?php echo ($vsel_shortcode == 'all')?'selected':''; ?>><?php esc_attr_e( 'All events', 'flying-bird' ); ?></option>
		</select>
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'vsel_attributes' ); ?>"><?php esc_attr_e('Attributes', 'flying-bird'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'vsel_attributes' ); ?>" name="<?php echo $this->get_field_name( 'vsel_attributes' ); ?>" type="text" placeholder="<?php esc_attr_e( 'Example: posts_per_page=&quot;2&quot;', 'flying-bird' ); ?>" value="<?php echo esc_attr( $vsel_attributes ); ?>">
 		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'vsel_all_events_link' ); ?>"><?php esc_attr_e('Link to all events', 'flying-bird'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'vsel_all_events_link' ); ?>" name="<?php echo $this->get_field_name( 'vsel_all_events_link' ); ?>" type="text" placeholder="<?php esc_attr_e( 'Example: www.your-domain.com/events', 'flying-bird' ); ?>" value="<?php echo esc_url( $vsel_all_events_link ); ?>">
 		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'vsel_all_events_label' ); ?>"><?php esc_attr_e('Link label', 'flying-bird'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'vsel_all_events_label' ); ?>" name="<?php echo $this->get_field_name( 'vsel_all_events_label' ); ?>" type="text" placeholder="<?php esc_attr_e( 'Example: All events', 'flying-bird' ); ?>" value="<?php echo esc_attr( $vsel_all_events_label ); ?>">
 		</p>
		<?php $link_label = __( 'click here', 'flying-bird' ); ?>
		<?php $link_wp = '<a href="https://wordpress.org/plugins/flying-bird" target="_blank">'.$link_label.'</a>'; ?>
		<?php $link_settings = '<a href="'.admin_url( 'options-general.php?page=vsel' ).'">'.$link_label.'</a>'; ?>
		<p><?php printf( esc_attr__( 'For info, available attributes and support %s.', 'flying-bird' ), $link_wp ); ?></p>
		<p><?php printf( esc_attr__( 'For plugin settings %s.', 'flying-bird' ), $link_settings ); ?></p>
		<?php
	}

	// update widget
	function update( $new_instance, $old_instance ) {
		$instance = array();

		// sanitize input
		$instance['vsel_title'] = sanitize_text_field( $new_instance['vsel_title'] );
		$instance['vsel_text'] = wp_kses_post( $new_instance['vsel_text'] );
		$instance['vsel_shortcode'] = sanitize_text_field( $new_instance['vsel_shortcode'] );
		$instance['vsel_attributes'] = sanitize_text_field( $new_instance['vsel_attributes'] );
		$instance['vsel_all_events_link'] = esc_url_raw( $new_instance['vsel_all_events_link'] );
		$instance['vsel_all_events_label'] = sanitize_text_field( $new_instance['vsel_all_events_label'] );

		return $instance;
	}

	// display widget with event list in frontend
	function widget( $args, $instance ) {
		if ( empty( $instance['vsel_all_events_label'] ) ) {
			$instance['vsel_all_events_label'] = __( 'All events', 'flying-bird' );
		}

		echo $args['before_widget'];

		if ( !empty( $instance['vsel_title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', esc_attr($instance['vsel_title']) ). $args['after_title'];
		}

		if ( !empty( $instance['vsel_text'] ) ) {
			echo '<div class="vsel-widget-text">'.wpautop( wp_kses_post($instance['vsel_text']).'</div>');
		}

		if ( $instance['vsel_shortcode'] == 'future' ) {
			$content = '[vsel-widget-future-events ';
		} else if ( $instance['vsel_shortcode'] == 'current' ) {
			$content = '[vsel-widget-current-events ';
		} else if ( $instance['vsel_shortcode'] == 'past' ) {
			$content = '[vsel-widget-past-events ';
		} else if ( $instance['vsel_shortcode'] == 'all' ) {
			$content = '[vsel-widget-all-events ';
		} else {
			$content = '[vsel-widget ';
		}
		if ( !empty( $instance['vsel_attributes'] ) ) {
			$content .= wp_strip_all_tags($instance['vsel_attributes']);
		}
		$content .= ']';
		echo do_shortcode( $content );

		if ( !empty( $instance['vsel_all_events_link'] ) ) {
			echo '<div class="vsel-widget-link">' . sprintf( '<a href="%1$s">%2$s</a>', esc_url($instance['vsel_all_events_link']), esc_attr($instance['vsel_all_events_label']) ) . '</div>';
		}

		echo $args['after_widget'];
	}
}
