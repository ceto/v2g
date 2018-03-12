<?php
/**
 * Plugin Name: TVA Icon Text Widget
 * Widget URI: http://themes.tienvooracht.nl
 * Description: Add a text width width matching icon to your widgetized areas.
 * Version: 1.0.0
 * Author: Tienvooracht
 * Author URI: http://www.tienvooracht.nl
 */


// Exit when cheating!
if( ! defined( 'ABSPATH' ) ) exit;


// Widget Class
class TVA_Icon_Text_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct(
 
			'tva_icon_text_widget', __( 'Icon + Text', 'tva' ), array(

				'description'	=> __( 'Add a textwidget with matching icon to your widgetized areas.', 'tva' ),

			)

		);
	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */

	public function widget( $args, $instance ) {

		extract( $args );
		
		$defaults = array(

			'icon'		=> '',
			'title' 	=> '', 
			'text'		=> '',
			'autop'		=> '',

		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		// Begin
		echo $before_widget;

		if( ! empty( $instance['title'] ) ) :

			echo '<i class="icon ' . esc_attr( $instance['icon'] ) . '"></i>';

		endif;

		if( ! empty( $instance['title'] ) ) :

			echo $before_title . esc_attr( $instance['title'] ) . $after_title;

		endif; ?>

		<?php if( ! empty( $instance['text'] ) ) : ?>

		<div class="textwidget">

			<?php $text = ( $instance['autop'] ) ? wpautop( $instance['text'] ) : $instance['text']; echo wp_kses_post( $text ); ?>

		</div><!-- END .icon-textwidget -->

		<?php endif; ?>

		<?php

		echo $after_widget;

	}


	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */

	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['icon']		= strip_tags( $new_instance['icon'] );
		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['text']		= $new_instance['text'];
		$instance['autop']		= strip_tags( $new_instance['autop'] );

		return $instance;

	}


	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */

	public function form( $instance ) {

		$defaults = array(

			'icon'		=> '',
			'title' 	=> '', 
			'text'		=> '',
			'autop'		=> '',

		);

		$instance = wp_parse_args( (array) $instance, $defaults );

	?>

	<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_attr_e( 'Icon', 'tva' ); ?></label> 
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['icon'] ); ?>" />
	<?php printf( '<span class="description">%1$s</span><a href="%2$s">%3$s</a>',
		esc_attr( 'e.g. "ion-heart".', 'tva' ),
		esc_url( 'http://ionicons.com/' ),
		esc_attr( 'Availible icons', 'tva' )
	); ?>
	</p>

	<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'tva' ); ?></label> 
	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	</p>

	<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_attr_e( 'Text:', 'tva' ); ?></label> 
	<textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"><?php echo wp_kses_post( $instance['text'] ); ?></textarea>
	</p>

	<p>
	<input id="<?php echo esc_attr( $this->get_field_id( 'autop' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'autop' ) ); ?>" type="checkbox" value="1" <?php checked( '1', esc_attr( $instance['autop'] ) ); ?> />
	<label for="<?php echo esc_attr( $this->get_field_id( 'autop' ) ); ?>"><?php esc_attr_e( 'Automatically add paragraphs', 'tva' ); ?></label>
	</p>


	<?php }

}

add_action( 'widgets_init', create_function( '', 'register_widget("TVA_Icon_Text_Widget");' ) );