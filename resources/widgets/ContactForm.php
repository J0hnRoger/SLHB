<?php
/*
Plugin Name: Club Contact Form Plugin
Plugin URI: http://example.com
Description: Wordpress Contact Form
Version: 1.0
Author: Agbonghama Collins
Author URI: http://w3guy.com
*/

class ContactForm_Widget extends WP_Widget
{
    public function __construct()
    {
        $params = [
            'description'   => 'Affiche le formulaire de contact',
            'name'          => 'Formulaire de Contact du club'
        ];
        parent::__construct('ContactForm_Widget', '', $params);

        add_shortcode('ClubContactForm', array($this, 'shortcode'));

    }

    public function shortcode($atts)
    {
        // extract the attributes into variables
        // extract(shortcode_atts(array(
        //     'images' => 3,
        //     'width' => 50,
        //     'height' => 50,
        //     'caption' => true,
        // ), $atts));

        // pass the attributes to getImages function and render the images
        $this->deliver_mail();
        return $this->renderForm();
    }

    public function widget( $args, $instance ) {
      $this->renderForm();
    }

    public function renderForm()
    {
       echo '<div class="contact mdl-card mdl-shadow--6dp">'
    			.'<div class="mdl-card__title mdl-color--primary mdl-color-text--white">'
    			.	'<h2 class="mdl-card__title-text">Pour toute demande sur le club, les entrainements ou les inscriptions.</h2>'
    		.	'</div>'
    	  .	'<div class="mdl-card__supporting-text">'
    			.	'<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">'
          .	'<div class="mdl-textfield mdl-js-textfield">'
            .	'<input class="mdl-textfield__input" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40"  />'
            .	'<label class="mdl-textfield__label" for="cf-name">Nom *</label>'
        .	'	</div>'
        .		'<div class="mdl-textfield mdl-js-textfield">'
        .			'<input class="mdl-textfield__input" name="cf-email" type="text" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" id="usermail" size="40" />'
        .			'<label class="mdl-textfield__label" for="cf-email">Mail *</label>'
        .		'</div>'
        .		'<div class="mdl-textfield mdl-js-textfield">'
        .			'<input class="mdl-textfield__input" name="cf-subject"pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />'
        .			'<label class="mdl-textfield__label" for="cf-subject">Sujet *</label>'
        .		'</div>'
          .'<div class="mdl-textfield mdl-js-textfield">'
            .  '<textarea class="mdl-textfield__input" type="text" rows= "3" name="cf-message" id="cf-message" >'
             . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' )
            . '</textarea>'
            .  '<label class="mdl-textfield__label" for="cf-message">Votre question...</label>'
            .'</div>'
    			.	'</form>'
    		.	'</div>'
    	.	'	<div class="mdl-card__actions mdl-card--border">'
    		.	'	<input type="submit" name="cf-submitted" value="Send" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Envoyer</button>'
    		.	'</div>'
    	.	'</div>';
      // echo 'Your Name (required) <br/>';
      // echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
      // echo '</p>';
      // echo '<p>';
      // echo 'Your Email (required) <br/>';
      // echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
      // echo '</p>';
      // echo '<p>';
      // echo 'Subject (required) <br/>';
      // echo '<input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />';
      // echo '</p>';
      // echo '<p>';
      // echo 'Your Message (required) <br/>';
      // echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
      // echo '</p>';
      // echo '<p><input type="submit" name="cf-submitted" value="Send"></p>';
      // echo '</form>';
    }

    function deliver_mail() {
    	// if the submit button is clicked, send the email
    	if ( isset( $_POST['cf-submitted'] ) ) {

    		// sanitize form values
    		$name    = sanitize_text_field( $_POST["cf-name"] );
    		$email   = sanitize_email( $_POST["cf-email"] );
    		$subject = sanitize_text_field( $_POST["cf-subject"] );
    		$message = esc_textarea( $_POST["cf-message"] );

    		// get the blog administrator's email address
    		$to = get_option( 'admin_email' );

    		$headers = "From: $name <$email>" . "\r\n";

    		// If email has been process for sending, display a success message
    		if ( wp_mail( $to, $subject, $message, $headers ) ) {
    			echo '<div>';
    			echo '<p>Thanks for contacting me, expect a response soon.</p>';
    			echo '</div>';
    		} else {
    			echo 'An unexpected error occurred';
    		}
    	}
    }
}
?>
