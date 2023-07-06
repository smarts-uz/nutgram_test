<?php

namespace App\Http\Controllers;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;
use Illuminate\Http\Request;
use SergiX44\Nutgram\RunningMode\Polling;

class NutController extends Controller
{

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function show(){

        $bot = new Nutgram($_ENV['TELEGRAM_TOKEN']);
        $bot->setRunningMode(Polling::class);
        $bot->onCommand('start', function(Nutgram $bot) {
            $bot->sendMessage('Ciao!');
        });

        $bot->onText('My name is {name}', function(Nutgram $bot, string $name) {
            $bot->sendMessage("Hi $name");
        });

        $bot->run();

    }


//    public function ChooseColorMenu(){
//        return
//    }
}
