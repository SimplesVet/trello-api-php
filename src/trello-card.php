<?php 

/**
*
* API Reference: https://developers.trello.com/advanced-reference/card
*/
class TrelloCard extends Trello
{
	public function get($cardId, $complement = '', $arguments = array()) {
		try {
			$authParam = $this->getAuthParam();
			$url = $this->getUrl();

			$argumentsParam = '';
			if(!empty($arguments)){
				$argumentsParam = '&' . http_build_query($arguments);
			}

			$this->curl->get($url . 'cards/' . $cardId . '/' . $complement . $authParam . $argumentsParam);
			return $this->curl->response;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function post($data, $complement = '', $arguments = array()) {
		try {
			$authParam = $this->getAuthParam();
			$url = $this->getUrl();

			$this->curl->post($url . 'cards/' . $complement . $authParam, $data);
			return $this->curl->response;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
}