<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Messaging;

require dirname(__DIR__) . '/vendor/autoload.php';


$wsServer = new WsServer(new Messaging());
$httpServer = new HttpServer($wsServer);
$port = 8080;

$server = IoServer::factory($httpServer,$port);

$server->run();
