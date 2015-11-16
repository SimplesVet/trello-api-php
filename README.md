# trello-api-php
PHP SDK to use Trello Api

## Authentication
```php
$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$token = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
```
[See how to get API Key and Token](get-key-token.md)

## Boards
```php

$trelloBoard = new TrelloBoard($key, $token);
$boardId = 'xxxxxxxxxxxxxxxxxxxxxxxx';

// Getting board info
$return = $trelloBoard->get($boardId);

// Getting list of members from board
$return = $trelloBoard->get($boardId, 'members');

// Getting list of cards from board
$arguments = array('fields' => 'id,name,idList');
$return = $trelloBoard->get($boardId, 'cards', $arguments);
```

[See `Boards` in API Reference](https://developers.trello.com/advanced-reference/board)

## Cards
```php
$trelloCard = new TrelloCard($key, $token);
$cardId = 'xxxxxxxxxxxxxxxxxxxxxxxx';

// Getting Card Info
$return = $trelloCard->get($cardId);

// Getting Card Actions
$return = $trelloCard->get($cardId, 'actions');

// Creating a Card
$data = array(
    'name' => 'Test card',
    'desc' => 'This is a test card',
    'due' => null,
    'idList' => 'xxxxxxxxxxxxxxxxxxxxxxxx',
    'urlSource' => null
);
$return = $trelloCard->post($data);
```

[See `Cards` in API Reference](https://developers.trello.com/advanced-reference/card)
