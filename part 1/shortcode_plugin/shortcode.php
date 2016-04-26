<?php 


// Plugin Name: Create Shortcode

function add_shortcode_for_our_plugin ($attr , $content = null ){
		extract(shortcode_atts(array(
			'post_type'=>'post',
			'posts_per_page'=>2,
			
			
		
		), $attr,'our_shortcode'  ));
	
	$query = new WP_Query(array(
		'post_type'=>$post_type,
		'posts_per_page'=>$posts_per_page,
	
	));
	
	if($query->have_posts()):
		$output = '<div class="recent_posts"><ul>';
		$i=0;
		while($query->have_posts()){
			
			$query->the_post();
			if($i == 0):
			$output .= '<li><a href="'.get_the_permalink().'" style="color:red;" >'.get_the_title().'</a></li>';
			else:
			$output .= '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
			endif;
			
			
		$i++; }
		wp_reset_postdata();
	$output .= '</ul></div>';
	return $output;
	else:
	 return 'no post found';
	
	endif;
	
	
	
	
	
	
}
add_shortcode('our_shortcode','add_shortcode_for_our_plugin');



function add_newshortcode($attr , $content = null){
	
	extract(shortcode_atts(array(
			
			'redirect_to'=> site_url()
			
			
		
		), $attr,'new_sht'  ));
	
	
	
	$form = '<form name="loginform" id="loginform" action="http://localhost/test/wp-login.php" method="post">
	<p>
		<label for="user_login">Username<br>
		<input type="text" name="log" id="user_login" aria-describedby="login_error" class="input" value="" size="20"></label>
	</p>
	<p>
		<label for="user_pass">Password<br>
		<input type="password" name="pwd" id="user_pass" aria-describedby="login_error" class="input" value="" size="20"></label>
	</p>
		<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In">
		<input type="hidden" name="redirect_to" value="'.$redirect_to.'">
		<input type="hidden" name="testcookie" value="1">
	</p>
</form>';
	return $form;
}

add_shortcode('new_sht','add_newshortcode');




