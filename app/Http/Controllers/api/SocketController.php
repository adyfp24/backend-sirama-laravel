<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

class SocketController extends Controller implements MessageComponentInterface
{
    protected $clients;
    public function __construct(){
        $this->clients = new \SplObjectStorage;
    }
    public function onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn);
    }
    public function onMessage(ConnectionInterface $from, $msg){

    }
    public function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);
    }
    public function onError(ConnectionInterface $conn, \Exception $e){
        echo "eror {$e->getMessage()}";
        $conn->close();
    }
}
