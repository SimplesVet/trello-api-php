<?php

/**
*
* API Reference: https://developers.trello.com/advanced-reference/label
*/
class TrelloLabel extends Trello
{
	/**
	 * The string of collection on Trello API.
	 * Will be used to generate the URLs for requests.
	 * @var string
	 */
	public $collection = "label";

	public $id = "";

}
