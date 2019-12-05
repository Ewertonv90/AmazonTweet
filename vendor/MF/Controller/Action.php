<?php
	
namespace MF\Controller;



abstract class Action{

	protected $view;

	public function __construct(){

		$this->view = new \stdClass();

	}

	protected function render($view , $layout ='layout'){

		$this->view->page = $view;

		if(file_exists("../App/Views/".$layout.".phtml")){

		    require_once "../App/Views/".$layout.".phtml";

		}else{

			$this->content();

		}

	}

	protected function content(){

    	$classe_atual = get_class($this);

    	$classe_atual = str_replace('App\\Controllers\\', '', $classe_atual);

        $classe_atual =  strtolower(str_replace('Controller', '', $classe_atual));

    	require_once "../App/views/".$classe_atual."/".$this->view->page.".phtml";

    }
}	

?>
