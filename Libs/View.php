<?php

class View {

	function __construct() {
		//echo 'this is the view';
	}
        
	public function render($name, $with_slider = false , $header = 'View/MyHeader.php' , $footer = 'View/MyFooter.php' , $menu = 'View/MyNav.php' )
	{                

                               
                        //echo 'Views/View/'.$header;

			if (file_exists('Views/'.$header)) require 'Views/'.$header;
			if (file_exists('Views/'.$menu))   require 'Views/'.$menu;
                        if (file_exists('Views/' . $name . '.php')) { require 'Views/' . $name . '.php';}
			if (file_exists('Views/'.$footer))   require 'Views/'.$footer;	

	}

}