<?php
/**
 * Social Widget
 *
 * @package Esfahan
 */

if( ! class_exists( 'Esfahan_Social' ) ) {

    class Esfahan_Social extends WP_Widget {

        /**
         * Sets up the Author widgets name etc
         */
        public function __construct() {

           $widget_ops = array(
               'classname'     => 'esfahan_social_widget',
               'description'   => esc_html__( 'A widget that displays your social icons', 'esfahan' ),
           );
           parent::__construct(
               'esfahan_social_widget',
               esc_html__( 'Esfahan : Social Icons', 'esfahan' ),
               $widget_ops
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
        public function widget( $args , $instance ) {

            $title       = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            $facebook    = !empty( $instance['facebook'] ) ? $instance['facebook'] : '';
            $twitter     = !empty( $instance['twitter'] ) ? $instance['twitter'] : '';
            $youtube     = !empty( $instance['youtube'] ) ? $instance['youtube'] : '';
            $pinterest   = !empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
            $instagram   = !empty( $instance['instagram'] ) ? $instance['instagram'] : '';
            $pinterest   = !empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
            $vimeo       = !empty( $instance['vimeo'] ) ? $instance['vimeo'] : '';

            ?>
            <!-- Widget : Follow Us -->
            <aside class="widget esfahan_widget_social">
               <?php if( !empty( $title ) ) : ?>
                <h3 class="widget-title"><?php echo esc_html( $title ); ?></h3>
                <?php endif; ?>
                <ul>
                   <?php if( !empty( $facebook ) ) : ?>
                    <li><a href="<?php echo esc_url( $facebook ); ?>" title="<?php esc_attr_e( 'Facebook', 'esfahan' ); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php endif; ?>

                    <?php if( !empty( $twitter ) ) : ?>
                    <li><a href="<?php echo esc_url( $twitter ); ?>" title="<?php esc_attr_e( 'Twitter', 'esfahan' ); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php endif; ?>

                    <?php if( !empty( $youtube ) ) : ?>
                    <li><a href="<?php echo esc_url( $youtube ); ?>" title="<?php esc_attr_e( 'Youtube', 'esfahan' ); ?>"><i class="fa fa-youtube-play"></i></a></li>
                    <?php endif; ?>

                    <?php if( !empty( $instagram ) ) : ?>
                    <li><a href="<?php echo esc_url( $instagram ); ?>" title="<?php esc_attr_e( 'instagram', 'esfahan' ); ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php endif; ?>

                    <?php if( !empty( $pinterest ) ) : ?>
                    <li><a href="<?php echo esc_url( $pinterest ); ?>" title="<?php esc_attr_e( 'Pinterest', 'esfahan' ); ?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php endif; ?>

                    <?php if( !empty( $vimeo ) ) : ?>
                    <li><a href="<?php echo esc_url( $vimeo ); ?>" title="<?php esc_attr_e( 'Vimeo', 'esfahan' ); ?>"><i class="fa fa-vimeo"></i></a></li>
                    <?php endif; ?>
                </ul>
            </aside><!-- Widget : Follow Us /- -->
            <?php
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
                'title'             => '',
                'facebook'          => '',
                'twitter'           => '',
                'youtube'           => '',
                'instagram'         => '',
                'pinterest'         => '',
                'vimeo'             => '',
            );

            $instance = wp_parse_args( (array) $instance , $defaults );

            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                    <strong><?php esc_html_e( 'Title' , 'esfahan' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>">
                    <strong><?php esc_html_e( 'Facebook Link' , 'esfahan' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['facebook'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>">
                    <strong><?php esc_html_e( 'Twitter Link' , 'esfahan' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['twitter'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>">
                    <strong><?php esc_html_e( 'Youtube Link' , 'esfahan' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['youtube'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>">
                    <strong><?php esc_html_e( 'Instagram Link' , 'esfahan' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>">
                    <strong><?php esc_html_e( 'Pinterest Link' , 'esfahan' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>">
                    <strong><?php esc_html_e( 'Vimeo Link' , 'esfahan' ); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" />
            </p>

            <?php
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
        public function update( $new_instance , $old_instance ) {

            $instance = $old_instance;

            $instance['title']                 = sanitize_text_field( $new_instance['title'] );

            $instance['facebook']              = esc_url_raw( $new_instance['facebook'] );

            $instance['twitter']               = esc_url_raw( $new_instance['twitter'] );

            $instance['youtube']               = esc_url_raw( $new_instance['youtube'] );

            $instance['instagram']             = esc_url_raw( $new_instance['instagram'] );

            $instance['pinterest']             = esc_url_raw( $new_instance['pinterest'] );

            $instance['vimeo']                 = esc_url_raw( $new_instance['vimeo'] );

            return $instance;
        }
    }
}
