<?php
/**
 * Created by PhpStorm.
 * User: magonxesp
 * Date: 3/04/18
 * Time: 9:59
 */
namespace App\Command;

use App\Sockets\Chat;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ChatCommand extends Command {

    protected function configure() {
        $this->setName('sockets:start-chat')
            ->setHelp("Start the chat proccess")
            ->setDescription("Starts the chat socket");
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln([
           "Chat Socket v1.0",
           "================",
           "Inicializando chat"
        ]);

        $chatServer = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ), 2020);

        $chatServer->run();
    }

}