<?php

namespace App;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use SplObjectStorage;

class Messaging implements MessageComponentInterface {
    
    public $connections;

    public function __construct()
    {
        $this->connections = new SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $connection) {
        $this->connections->attach($connection);

        echo "Received New Connection " . $connection->resourceId;
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Received New Message " . $msg . " \nfrom " . $from;
    }

    public function onClose(ConnectionInterface $conn) {
        echo "Connection closed for " . $conn->resourceId;
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Connection Error occured " . $e;
    }
}

