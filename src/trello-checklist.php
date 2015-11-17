<?php

/**
*
* API Reference: https://developers.trello.com/advanced-reference/checklist
*/
class TrelloChecklist extends Trello
{
	/**
	 * The string of collection on Trello API.
	 * Will be used to generate the URLs for requests.
	 * @var string
	 */
	public $collection = "checklist";

	public $id = "";

}
