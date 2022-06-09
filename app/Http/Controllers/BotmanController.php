<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            $message = mb_strtolower($message);
            if ($message == 'доставка'||$message == 'получение товара'||$message == 'как я получу товар'||$message == 'как получить товар'||$message == 'как происходит доставка') {
                $this->dostavka($botman);
            }elseif($message == 'часы работы'|| $message == 'время работы'||$message == 'как работайте'||$message == 'время'){
                $this->time_raboti($botman);
            }
            else{
                $botman->reply("Извините я вас не понимаю");
            }

        });

        $botman->listen();
    }
    public function dostavka($botman){
        $botman->reply('Стоимость доставки можно уточнить по телефону +7 (982) 762-15-56 или при личной встрече по адресу: г.Екатеринбург, ул.Новостроя, 1А.');
    }
    public function time_raboti($botman){
        $botman->reply('Пн - Пт: 8:00 - 19:00 <br>
Суббота - Воскресенье');
    }
    public function delivery($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }
}
