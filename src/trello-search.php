<?php

/**
*
* API Reference: https://developers.trello.com/advanced-reference/search
*/
class TrelloSearch extends Trello
{
	/**
	 * The string of collection on Trello API.
	 * Will be used to generate the URLs for requests.
	 * @var string
	 */
	public $collection = "search";

	/**
	 * Perform a search on a Trello org
	 * @param  string $query       Query to be searched
	 * @param  string $orgID       ID of organization
	 * @param  string $types       Type filter list, comma-sepparated (e.g. "cards,actions")
	 * @param  string $boardID     ID of a specific board to search
	 * @param  array  $moreFilters An array key-value to use another filters as described on Trello API. Keys need to be valid arguments to API.
	 * @return object              The response from Trello API
	 */
	public function find($query, $orgID, $types = "", $boardID = "", $moreFilters = array()) {
		try {
			$arguments = array(
				"query" => $query,
				"idOrganizations", $orgID,
			);
			(!empty($types)) ? $arguments['modelTypes'] = $types : '';
			(!empty($boardID)) ? $arguments['idBoards'] = $boardID : '';
			if (!empty($moreFilters)) {
				foreach ($moreFilters as $key => $value) {
					$arguments[$key] = $value;
				}
			}
			$authParam = $this->getAuthParam();
			$url = $this->getUrl();

			$argumentsParam = '';
			if(!empty($arguments)){
				$argumentsParam = '&' . http_build_query($arguments);
			}

			$this->curl->get($url . 'search' . $authParam . $argumentsParam);
			$this->id = $this->curl->response->id;
			return $this->curl->response;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
}
