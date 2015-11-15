<?php 

/**
*
* API Reference: https://developers.trello.com/advanced-reference/board
*/
class TrelloBoard extends Trello
{
	public function get($boardId, $complement = '', $arguments = array()) {
		try {
			$authParam = $this->getAuthParam();
			$url = $this->getUrl();

			$argumentsParam = '';
			if(!empty($arguments)){
				$argumentsParam = '&' . http_build_query($arguments);
			}

			$this->curl->get($url . 'boards/' . $boardId . '/' . $complement . $authParam . $argumentsParam);
			return $this->curl->response;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
}