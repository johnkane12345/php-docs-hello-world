<?php

// Enable loading of Composer dependencies
require_once realpath(__DIR__ . '/vendor/autoload.php');
require_once 'GraphHelper.php';

print('PHP Graph Tutorial'.PHP_EOL.PHP_EOL);

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['CLIENT_ID', 'TENANT_ID', 'GRAPH_USER_SCOPES']);

function initializeGraph(): void {
    GraphHelper::initializeGraphForUserAuth();
}

greetUser();

$choice = -1;

while ($choice != 0) {
    echo('Please choose one of the following options:'.PHP_EOL);
    echo('0. Exit'.PHP_EOL);
    echo('1. Display access token'.PHP_EOL);
    echo('2. List my inbox'.PHP_EOL);
    echo('3. Send mail'.PHP_EOL);
    echo('4. Make a Graph call'.PHP_EOL);

    $choice = (int)readline('');

    switch ($choice) {
        case 1:
            displayAccessToken();
            break;
        case 2:
            listInbox();
            break;
        case 3:
            sendMail();
            break;
        case 4:
            makeGraphCall();
            break;
        case 0:
        default:
            print('Goodbye...'.PHP_EOL);
    }
}

?>
