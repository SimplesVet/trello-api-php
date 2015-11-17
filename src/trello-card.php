<?php

/**
*
* API Reference: https://developers.trello.com/advanced-reference/card
*/
class TrelloCard extends Trello
{
	/**
	 * The string of collection on Trello API.
	 * Will be used to generate the URLs for requests.
	 * @var string
	 */
	public $collection = "cards";

	public $id = "";

	/**
	 * Archive a Trello Card
	 * @param  string $cardID 	ID of the card that will be archived
	 * @return object          	Response of Trello API
	 */
	public function archive ($cardID) {
		$data = array("value" => true);
		$this->put($cardID, $data, "closed");
		return $this->curl->response;
	}

	/**
	 * Remove a Trello Card from Archive to your last list
	 * @param  string $cardID 	ID of the card that will be removed from archive
	 * @return object          	Response of Trello API
	 */
	public function unarchive ($cardID) {
		$data = array("value" => false);
		$this->put($cardID, $data, "closed");
		return $this->curl->response;
	}

	/**
	 * Comment a Trello Card
	 * @param  string $cardID  	ID of the card that will be commented
	 * @param  string $comment 	Comment text
	 * @return object          	Response of Trello API
	 */
	public function comment ($cardID, $comment) {
		$data = array("text" => $comment);
		$this->post($data, "actions/comments", $cardID);
		return $this->curl->response;
	}

	public function moveToList ($cardID, $listID) {
		$data = array("value" => $listID);
		$this->put($cardID, $data, "idList");
	}
}
