<?php
namespace App\RealTime;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Messager implements MessageComponentInterface
{
    protected $clients;
    protected $container;

    // TODO : action queue !

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n",
        $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        // 1. Parse message
        $action = new Action($msg);

        // 2. Execute corresponding action
        try
        {
            $result = (new Router($this->container))->execute($action);

            // 3. Push result to clients
            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    // The sender is not the receiver, send to each client connected
                    $client->send($result);
                }
            }
        }
        catch(\Exception $e)
        {
            echo "An error has occurred: {$e->getMessage()}\n";
            $err = \json_encode(array("data" => "Une erreur s'est produite."));
            $from->send($err);
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}