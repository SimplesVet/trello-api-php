<?php

/**
*
* API Reference: https://developers.trello.com/advanced-reference/action
*/
class TrelloAction extends Trello
{
	/**
	 * The string of collection on Trello API.
	 * Will be used to generate the URLs for requests.
	 * @var string
	 */
	public $collection = "action";

	public $id = "";

}
