<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(! function_exists('create_menu')){
	
	function create_menu($menu){
			$nav = '';
			foreach ($menu as $key => $value) {
				if(is_array($value)){
					$nav .= '<li class="has-dropdown"><a href="#">'.$key.'</a>'.PHP_EOL;
					$nav .= '<ul class="dropdown">'.PHP_EOL.create_menu($value).PHP_EOL.'</ul>';
					$nav .= '</li>'.PHP_EOL;
				}else{
					$nav .= '<li'.active_link($key).'><a href="'.site_url($key).'">'.$value.'</a></li>'.PHP_EOL;
				}
			}
			return $nav;
	}

}



if(! function_exists('active_link')){

	function active_link($link){
        $ci =& get_instance();
        $class = $ci->router->fetch_class();
		$class .= '/';
        $class .= $ci->router->fetch_method();
 
        return ($class === $link) ? ' class="active"' : '';
    }

}