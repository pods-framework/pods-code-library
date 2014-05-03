<?php
  /**
   * Function to attach Pods Template to $content
   *
   * @param string 	$template_name 	The name of a Pods Template to load.
   * @param string	$content		Post content
   * @param object	$pods			Current Pods object.
   *
   * @return string $content with Pods Template appended if template exists
   *
   * @see http://pods.io/tutorials/creating-pods-plugins/creating-automatic-template-plugin/
   *
   * @since 0.0.1
   */
	add_action( 'the_content', 'slug_load_template' );
	function slug_load_template( $template_name, $content, $pods  ) {
		//get the template
		$template = $pods->template( $template_name );

		//check if we got a valid template
		if ( !is_null( $template ) ) {
			$content = $content . $template;
		}

		return $content;
	}
