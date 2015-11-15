<?php 
require 'curl.php';
require 'trello-board.php';
require 'trello-card.php';

use Curl\Curl;
/**
* 
*/
class Trello  
{
	private $key;
	private $token;
	private $apiUrl = 'https://api.trello.com/';
	private $apiVersion = '1';
	protected $curl;

	function __construct($key, $token){
		$this->key = $key;
		$this->token = $token;

		$this->curl = new Curl();
	}

	public function getAuthParam(){
		return '?key=' . $this->key . '&token=' . $this->token;
	}

	public function getUrl(){
		return $this->apiUrl . $this->apiVersion . '/';
	}
}
