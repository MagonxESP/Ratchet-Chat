<?php
/**
 * Created by PhpStorm.
 * User: magonxesp
 * Date: 3/04/18
 * Time: 9:24
 */

namespace App\Sockets;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class Chat implements MessageComponentInterface {

    private $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Nueva conexion! {$conn->resourceId}\n";
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "{$conn->resourceId} se ha desconectado\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo $msg;
        foreach($this->clients as $client) {
            $client->send($msg);
        }
    }

}