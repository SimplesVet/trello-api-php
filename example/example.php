<?php 

header('Content-Type: text/html; charset=utf-8');

require '../src/trello.php';

$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$token = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

try {
	echo '<pre>';

	// -----
	// BOARD
	// -----
	// API Reference: https://developers.trello.com/advanced-reference/board
	echo '<h1>Board</h1>';

	$trelloBoard = new TrelloBoard($key, $token);
	$boardId = 'xxxxxxxxxxxxxxxxxxxxxxxx';

	// Getting board info
	$return = $trelloBoard->get($boardId);
	print_r($return);
	echo '<hr>';

	// Getting list members from board
	$return = $trelloBoard->get($boardId, 'members');
	print_r($return);
	echo '<hr>';

	// Getting list cards from board
	$arguments = array('fields' => 'id,name,idList');
	$return = $trelloBoard->get($boardId, 'cards', $arguments);
	print_r($return);
	echo '<hr>';

	// ----
	// CARD
	// ----
	// API Reference: https://developers.trello.com/advanced-reference/card
	echo '<h1>Card</h1>';

	$trelloCard = new TrelloCard($key, $token);
	$cardId = 'xxxxxxxxxxxxxxxxxxxxxxxx';

	// Getting Card Info
	$return = $trelloCard->get($cardId);
	print_r($return);
	echo '<hr>';

	// Getting Card Actions
	$return = $trelloCard->get($cardId, 'actions');
	print_r($return);
	echo '<hr>';

	// Creating a Card
	$data = array(
		'name' => 'Teste card ' . rand(),
		'desc' => 'This is a test card',
		'due' => null,
		'idList' => 'xxxxxxxxxxxxxxxxxxxxxxxx',
		'urlSource' => null
	);
	$return = $trelloCard->post($data);
	print_r($return);
	echo '<hr>';

} catch (Exception $e) {
	echo $e->getMessage();
}
