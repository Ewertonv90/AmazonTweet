<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

	public function timeline(){

	

		$this->validaAutenticacao();
		
			// recuperar tweets
			$tweet = Container::getModel('Tweet');
			$tweet->__set('id_usuario', $_SESSION['id']);
			$tweets = $tweet->getAll();

			$this->view->tweets = $tweets;

			$usuario = Container::getModel('usuario');
			$usuario->__set('id', $_SESSION['id']);

			$this->view->total_tweets = $usuario->getTotalTweets();
			$this->view->total_seguindo = $usuario->getTotalSeguindo();
			$this->view->total_seguidores = $usuario->getTotalSeguidores();
			$this->render('timeline');

	}


	public function tweet(){

		$this->validaAutenticacao();

			$tweet = Container::getModel('tweet');
			$tweet->__set('tweet', $_POST['tweet']);
			$tweet->__set('id_usuario', $_SESSION['id']);
			
			$tweet->salvar();

			header('Location: /timeline');	
	
	}

	public function validaAutenticacao(){

		session_start();

		if(!isset($_SESSION['id']) || $_SESSION['id'] == '' && !isset($_SESSION['nome']) ||$_SESSION['nome'] == ''){

			header('Location: /?login=naoautenticado');
		}

	}

	public function quemSeguir(){
		
		$this->validaAutenticacao();

		$pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor']  : '';

		$usuarios = array();

		if($pesquisarPor != ''){
			$usuario = Container::getModel('Usuario');
			$usuario->__set('nome', $pesquisarPor);
			$usuario->__set('id', $_SESSION['id']);	
			$usuarios = $usuario->getAll();	
		}

		$this->view->usuarios = $usuarios;

		$usuario = Container::getModel('usuario');
			$usuario->__set('id', $_SESSION['id']);

			$this->view->total_tweets = $usuario->getTotalTweets();
			$this->view->total_seguindo = $usuario->getTotalSeguindo();
			$this->view->total_seguidores = $usuario->getTotalSeguidores();
		$this->render('quemSeguir');

	}

	public function acao(){

		 $this->validaAutenticacao();

		 $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
		 $id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

		 $usuario = Container::getModel('usuario');
		 $usuario->__set('id', $_SESSION['id']);

			
		if($acao == 'seguir'){

			$usuario->seguirUsuario($id_usuario_seguindo);

				

		}else if($acao == 'deixar_de_seguir'){

			$usuario->deixarSeguirUsuario($id_usuario_seguindo);

			
		}	

		header('Location: /quem_seguir');
	}

	public function deleteTweet(){

		$this->validaAutenticacao();

		 $tweetdelete = Container::getModel('Tweet');
		  $tweetdelete->__set('id', $_GET['deletetweet']);

		  $tweetdelete->deleteTweet();

		  header('Location: /timeline');

		
	}
}


?>