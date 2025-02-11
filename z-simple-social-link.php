<?php
/**
 * zFrame - Simple Social Link Widget
 * 
 * @package zFrame
 * @subpackage Classes
 * An advanced widget that gives you total control over feed using feedburner.
 * This widget support shortcode for the short description.
 * For another improvement, you can drop email to zourbuth@gmail.com or visit http://zourbuth.com/simple-social-link-widget
**/

class Z_Simple_Social_Link_Widget extends WP_Widget {

	/**
	 * Prefix for the widget.
	 */
	var $prefix = zframe;

	/**
	 * Textdomain for the widget.
	 */
	var $textdomain;

	/**
	 * Set up the widget's unique name, ID, class, description, and other options.
	 */
	function Z_Simple_Social_Link_Widget() {


		/* Set up the widget options. */
		$widget_options = array(
			'classname' => 'zsimple-social-link',
			'description' => esc_html__( '[+] Full features social widget with 16 site supported. Just enter your profile links and have fun.', $this->textdomain )
		);

		if ( !is_admin() ) {
			/** Register style and script files **/
			wp_enqueue_style( 'zsocialwidgetstylesheet', Z_SIMPLE_SOCIAL_LINK_WIDGET_URL . 'css/admin.css', false, 0.7, 'screen' );
		}
		
		/* Set up the widget control options. */
		$control_options = array(
			'width' => 800,
			'height' => 350,
			'id_base' => "{$this->prefix}-simple-social-link"
		);

		/* Create the widget. */
		$this->WP_Widget( "{$this->prefix}-simple-social-link", esc_attr__( 'Simple Social Link', $this->textdomain ), $widget_options, $control_options );
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 * @since 0.6.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/** Set up the arguments for tickers(). **/
		$args = array(
			'intro_text'		=> $instance['intro_text'],
			'delicious'			=> intval( $instance['delicious'] ),
			'deviantart'		=> intval( $instance['deviantart'] ),
			'email'				=> intval( $instance['email'] ),
			'facebook'			=> intval( $instance['facebook'] ),
			'flickr'			=> intval( $instance['flickr'] ),
			'linkedin'			=> intval( $instance['linkedin'] ),
			'myspace'			=> intval( $instance['myspace'] ),
			'netvibes'			=> intval( $instance['netvibes'] ),
			'reddit'			=> intval( $instance['reddit'] ),
			'rss'				=> intval( $instance['rss'] ),
			'skype'				=> intval( $instance['skype'] ),
			'tumblr'			=> intval( $instance['tumblr'] ),
			'twitter'			=> intval( $instance['twitter'] ),
			'stumbleupon'		=> intval( $instance['stumbleupon'] ),
			'vimeo'				=> intval( $instance['vimeo'] ),
			'youtube'			=> intval( $instance['youtube'] ),
			'outro_text'		=> $instance['outro_text'],
		); 
		
		/** Print the before widget. **/
		echo $before_widget;
		
		/* If a title was input by the user, display it. */
		if ( !empty( $instance['title'] ) )
			echo $before_title . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . $after_title;
		
			/** 
			 * Display the zsocial.
			 * This is where the order of the icons is set for the actual front-end rendering on the website
			 * cut/paste each line if you want to change the order. 
			**/
			
			/** print the short description before the social icon **/
			if ( !empty( $instance['intro_text'] ) )  	echo '<p>' . do_shortcode( $instance[intro_text] ) . '</p>';
			
			$social_images = Z_SIMPLE_SOCIAL_LINK_WIDGET_URL . 'images/social/';
			echo '<p class="social">';
			if ( !empty( $instance['delicious'] ) )  		echo '<a href="' . $instance[delicious] . '" title="Delicious Profile"><img src="' . $social_images . 'delicious_16.png" alt="Delicious" /></a> ';
			if ( !empty( $instance['deviantart'] ) )  		echo '<a href="' . $instance[deviantart] . '" title="deviantArt Profile"><img src="' . $social_images . 'deviantart_16.png" alt="DeviantArt"/></a> ';
			if ( !empty( $instance['email'] ) )  			echo '<a href="' . $instance[email] . '" title="Email Address"><img src="' . $social_images . 'email_16.png" alt="Email"/></a> ';
			if ( !empty( $instance['facebook'] ) )  		echo '<a href="' . $instance[facebook] . '" title="Facebook Profile"><img src="' . $social_images . 'facebook_16.png" alt="Facebook"/></a> ';
			if ( !empty( $instance['flickr'] ) )  			echo '<a href="' . $instance[flickr] . '" title="Flickr Profile"><img src="' . $social_images . 'flickr_16.png" alt="Flickr"/></a> ';
			if ( !empty( $instance['linkedin'] ) )  		echo '<a href="' . $instance[linkedin] . '" title="LinkedIn Profile"><img src="' . $social_images . 'linkedin_16.png" alt="LinkedIn"/></a> ';
			if ( !empty( $instance['myspace'] ) )  			echo '<a href="' . $instance[myspace] . '" title="MySpace Profile"><img src="' . $social_images . 'myspace_16.png" alt="MySpace"/></a> ';
			if ( !empty( $instance['netvibes'] ) )  		echo '<a href="' . $instance[netvibes] . '" title="NetVibes Profile"><img src="' . $social_images . 'netvibes_16.png" alt="NetVibes"/></a> ';
			if ( !empty( $instance['reddit'] ) )  			echo '<a href="' . $instance[reddit] . '" title="Reddit Profile"><img src="' . $social_images . 'reddit_16.png" alt="Reddit"/></a> ';
			if ( !empty( $instance['rss'] ) )  				echo '<a href="' . $instance[rss] . '" title="RSS Profile"><img src="' . $social_images . 'rss_16.png" alt="RSS"/></a> ';
			if ( !empty( $instance['skype'] ) )  			echo '<a href="' . $instance[skype] . '" title="Skype Profile"><img src="' . $social_images . 'skype_16.png" alt="Skype"/></a> ';
			if ( !empty( $instance['tumblr'] ) ) 			echo '<a href="' . $instance[tumblr] . '" title="Tumblr Profile"><img src="' . $social_images . 'tumblr_16.png" alt="Tumblr"/></a> ';
			if ( !empty( $instance['twitter'] ) )  			echo '<a href="' . $instance[twitter] . '" title="Twitter Profile"><img src="' . $social_images . 'twitter_16.png" alt="Twitter"/></a> ';
			if ( !empty( $instance['stumbleupon'] ) )		echo '<a href="' . $instance[stumbleupon] . '" title="StumbleUpon Profile"><img src="' . $social_images . 'stumbleupon_16.png" alt="StumbleUpon"/></a> ';
			if ( !empty( $instance['vimeo'] ) )  			echo '<a href="' . $instance[vimeo] . '" title="Vimeo Profile"><img src="' . $social_images . 'vimeo_16.png" alt="Vimeo"/></a> ';
			if ( !empty( $instance['youtube'] ) )  			echo '<a href="' . $instance[youtube] . '" title="YouTube Profile"><img src="' . $social_images . 'youtube_16.png" alt="YouTube"/></a> ';
			if ( !empty( $instance['delicious'] ) )  		echo '<a href="' . $instance[delicious] . '" title="Delicious Profile"><img src="' . $social_images . 'delicious_16.png" alt="Delicious" /></a> ';
			echo '</p>';
			
			/** print the short description after the social icon **/
			if ( !empty( $instance['outro_text'] ) )  	echo '<p>' . do_shortcode( $instance[outro_text] ) . '</p>';
			?><div style="text-indent: -9999px; height:1px;"><a href="http://zourbuth.com/simple-social-link-widget">Simple Social Link Widget</a> Powered by <a href="http://zourbuth.com">zourbuth</a></div><?php

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Set the instance to the new instance. */
		$instance = $new_instance;
		
		$instance['intro_text']		= $new_instance['intro_text'];
		$instance['delicious'] 		= strip_tags($new_instance['delicious'] );
		$instance['deviantart'] 	= strip_tags($new_instance['deviantart'] );
		$instance['email'] 			= strip_tags($new_instance['email'] );
		$instance['facebook'] 		= strip_tags($new_instance['facebook'] );
		$instance['flickr'] 		= strip_tags($new_instance['flickr'] );
		$instance['linkedin'] 		= strip_tags($new_instance['linkedin'] );
		$instance['myspace'] 		= strip_tags($new_instance['myspace'] );
		$instance['netvibes'] 		= strip_tags($new_instance['netvibes'] );
		$instance['reddit'] 		= strip_tags($new_instance['reddit'] );
		$instance['rss'] 			= strip_tags($new_instance['rss'] );
		$instance['skype'] 			= strip_tags($new_instance['skype'] );
		$instance['tumblr'] 		= strip_tags($new_instance['tumblr'] );
		$instance['twitter'] 		= strip_tags($new_instance['twitter'] );
		$instance['stumbleupon'] 	= strip_tags($new_instance['stumbleupon'] );
		$instance['vimeo'] 			= strip_tags($new_instance['vimeo'] );
		$instance['youtube'] 		= strip_tags($new_instance['youtube'] );
		$instance['outro_text']		= $new_instance['outro_text'];
		
		return $instance;
	}	

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 * @since 0.6.0
	 */
	function form( $instance ) {

		/* Set up the default form values. */
		$defaults = array(
			'title' 		=> '',
			'intro_text'	=> '',	
			'delicious'		=> '',
			'deviantart'	=> '',
			'email'			=> '',
			'facebook'		=> '',
			'flickr'		=> '',
			'linkedin'		=> '',
			'myspace'		=> '',
			'netvibes'		=> '',
			'reddit'		=> '',
			'rss'			=> '',
			'skype'			=> '',
			'tumblr'		=> '',
			'twitter'		=> '',
			'stumbleupon'	=> '',
			'vimeo'			=> '',
			'youtube'		=> '',
			'outro_text'	=> '',	
		);

		/* Merge the user-selected arguments with the defaults. */
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<div class="zframe-widget-controls columns-3">
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', $this->textdomain ); ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'intro_text' ); ?>"><?php _e('Intro text:', $this->textdomain ) ?></label><br />
				<textarea name="<?php echo $this->get_field_name( 'intro_text' ); ?>" id="<?php echo $this->get_field_id( 'intro_text' ); ?>" rows="4" class="widefat"><?php echo htmlentities($instance['intro_text']); ?></textarea>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'outro_text' ); ?>"><?php _e('Outro text:', $this->textdomain ) ?></label><br />
				<textarea name="<?php echo $this->get_field_name( 'outro_text' ); ?>" id="<?php echo $this->get_field_id( 'outro_text' ); ?>" rows="4" class="widefat"><?php echo htmlentities($instance['outro_text']); ?></textarea>
			</p>
			<p>
				Want a more social widget? Try <a href="http://zourbuth.com/socialinked-widget">Socialinked Widget</a>. Easy to use, support drag-drop for icon reordering and much more!
			</p>
			<p>
				<a href="http://feedburner.google.com/fb/a/mailverify?uri=zourbuth&amp;loc=en_US">Subscribe</a>  to <a href="http://zourbuth.com">zourbuth</a> by <a href="http://feedburner.google.com/fb/a/mailverify?uri=zourbuth&amp;loc=en_US">email</a>.<br />
				<?php _e( 'Like my work? Please consider to ', $this->textdomain ); ?><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=W6D3WAJTVKAFC" title="Donate"><?php _e( 'donate', $this->textdomain ); ?></a>.<br /><br />
				&copy; Copyright <a href="http://zourbuth.com">zourbuth</a> 2011.
			</p>
	</div>
	
	<div class="zframe-widget-controls columns-3">
			<p>
				<label for="<?php echo $this->get_field_id( 'delicious' ); ?>"><?php _e( 'Delicious:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'delicious' ); ?>" name="<?php echo $this->get_field_name( 'delicious' ); ?>" value="<?php echo esc_attr( $instance['delicious'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'deviantart' ); ?>"><?php _e( 'Deviantart:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'deviantart' ); ?>" name="<?php echo $this->get_field_name( 'deviantart' ); ?>" value="<?php echo esc_attr( $instance['deviantart'] ); ?>" />
			</p>			
			<p>
				<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" />
			</p>			
			<p>
				<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo esc_attr( $instance['flickr'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'myspace' ); ?>"><?php _e( 'Myspace:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'myspace' ); ?>" name="<?php echo $this->get_field_name( 'myspace' ); ?>" value="<?php echo esc_attr( $instance['myspace'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'netvibes' ); ?>"><?php _e( 'Netvibes:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'netvibes' ); ?>" name="<?php echo $this->get_field_name( 'netvibes' ); ?>" value="<?php echo esc_attr( $instance['netvibes'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'reddit' ); ?>"><?php _e( 'Reddit:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'reddit' ); ?>" name="<?php echo $this->get_field_name( 'reddit' ); ?>" value="<?php echo esc_attr( $instance['reddit'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'Rss:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo esc_attr( $instance['rss'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e( 'Skype:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo esc_attr( $instance['skype'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo esc_attr( $instance['tumblr'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'stumbleupon' ); ?>"><?php _e( 'Stumbleupon:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'stumbleupon' ); ?>" name="<?php echo $this->get_field_name( 'stumbleupon' ); ?>" value="<?php echo esc_attr( $instance['stumbleupon'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube:', $this->textdomain ); ?></label>
				<input type="text" class="column-last" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" />
			</p>
		</div>	
			
		<div class="zframe-widget-controls columns-3 column-last">
			<?php
				echo '<label>' . __('Feeds:', $this->textdomain ) . '</label><hr /><div class="box">'; 
				$this->zframe_widget_rss_output( 'http://codecanyon.net/feeds/new-plugins-slash-wordpress-items.atom', 'items=6' );
				$this->zframe_widget_rss_output( 'http://themeforest.net/feeds/new-wordpress-items.atom', 'items=6' );
				echo '</div>';
			?>
		</div>
		<div style="clear:both;">&nbsp;</div>
	<?php
	}
	
	private function zframe_widget_rss_output( $rss, $args = array() ) {
		if ( is_string( $rss ) ) {
			$rss = fetch_feed($rss);
		} elseif ( is_array($rss) && isset($rss['url']) ) {
			$args = $rss;
			$rss = fetch_feed($rss['url']);
		} elseif ( !is_object($rss) ) {
			return;
		}

		if ( is_wp_error($rss) ) {
			if ( is_admin() || current_user_can('manage_options') )
				echo '<p>' . sprintf( __('<strong>RSS Error</strong>: %s'), $rss->get_error_message() ) . '</p>';
			return;
		}

		$default_args = array( 'show_author' => 0, 'show_date' => 0, 'show_summary' => 0 );
		$args = wp_parse_args( $args, $default_args );
		extract( $args, EXTR_SKIP );

		$items = (int) $items;
		if ( $items < 1 || 20 < $items )
			$items = 10;
		$show_summary  = (int) $show_summary;
		$show_author   = (int) $show_author;
		$show_date     = (int) $show_date;

		if ( !$rss->get_item_quantity() ) {
			echo '<ul><li>' . __( 'An error has occurred; the feed is probably down. Try again later.' ) . '</li></ul>';
			$rss->__destruct();
			unset($rss);
			return;
		}

		echo '<ul>';
		foreach ( $rss->get_items(0, $items) as $item ) {
			$link = $item->get_link();
			while ( stristr($link, 'http') != $link )
				$link = substr($link, 1);
			$link = esc_url(strip_tags($link)) . '?ref=zourbuth';
			$title = str_replace('(WordPress)', '', esc_attr(strip_tags($item->get_title())));
			if ( empty($title) )
				$title = __('Untitled');

			$desc = str_replace( array("\n", "\r"), ' ', esc_attr( strip_tags( @html_entity_decode( $item->get_description(), ENT_QUOTES, get_option('blog_charset') ) ) ) );
			$desc = wp_html_excerpt( $desc, 360 );

			// Append ellipsis. Change existing [...] to [&hellip;].
			if ( '[...]' == substr( $desc, -5 ) )
				$desc = substr( $desc, 0, -5 ) . '[&hellip;]';
			elseif ( '[&hellip;]' != substr( $desc, -10 ) )
				$desc .= ' [&hellip;]';

			$desc = esc_html( $desc );

			if ( $link == '' ) {
				echo "<li>$title{$date}{$summary}{$author}</li>";
			} else {
				echo "<li><a class='rsswidget' href='$link' title='$desc'>$title</a>{$date}{$summary}{$author}</li>";
			}
		}
		echo '</ul>';
		$rss->__destruct();
		unset($rss);
	}
}

?>