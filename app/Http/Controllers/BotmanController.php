<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {
            $message = mb_strtolower($message);
            if (preg_match('/доставк*/i', $message)) {
                $this->dostavka($botman);
            } elseif (preg_match('/часы работы/i', $message)||preg_match('/время работы/i', $message)||preg_match('/закрывайтесь/i', $message)||preg_match('/открывайтесь/i', $message)) {
                $this->time_raboti($botman);
            } elseif (preg_match('/телефон*/i', $message)||preg_match('/контакты/i', $message)||preg_match('/номер/i', $message)||preg_match('/где/i', $message)) {
                $this->contact($botman);
            } elseif (preg_match('/срок*/i', $message)||preg_match('/изготовлени*/i', $message)) {
                $this->dones($botman);
            } elseif (preg_match('/цен*/i', $message)||preg_match('/актуальн*/i', $message)||preg_match('/стоимость/i', $message)) {
                $this->price($botman);
            } else {
                $botman->reply("Извините я вас не понимаю");
            }

        });

        $botman->listen();
    }

    public function contact($botman)
    {
        $botman->reply('Наш номер телефона +7 (982) 762-15-56 <br> Адрес: г.Екатеринбург, ул.Новостроя, 1А');
    }

    public function dostavka($botman)
    {
        $botman->reply('Стоимость доставки можно уточнить по телефону +7 (982) 762-15-56 или при личной встрече по адресу: г.Екатеринбург, ул.Новостроя, 1А.');
    }

    public function time_raboti($botman)
    {
        $botman->reply('Пн - Пт: 8:00 - 19:00 <br>
Суббота - Воскресенье');
    }
    public function price($botman)
    {
        $botman->reply('Цены на все товары являются актуальными.');
    }
    public function dones($botman)
    {
        $botman->reply('Сборка товара осуществляется от 2-х дней.');
    }

    public function delivery($botman)
    {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you ' . $name);
        });
    }
}
