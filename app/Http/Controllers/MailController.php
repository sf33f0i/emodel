<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use function Sodium\compare;

class MailController extends Controller
{
    public function send(Order $id, Request $request){
        try {
            Mail::send(['text' => 'user.mail'], ['name' => $id], function ($message) use ($id) {
                $message->to("$id->email", "Клиент")->subject('E-model заказ номер ' . $id->id);
                $message->from('gunari.sergei@mail.ru', 'E-model заказ номер ' . $id->id);
            });
            return redirect(route('done_order'))->with('order_id', $id->id);
        }
        catch (\Exception $e){
            $id->delete();
            $request = $request->old();
            return redirect(route('order'))->with(['danger'=>'Введите почту корректно!', 'name'=>$request['name'], 'email'=>$request['email']]);
        }
    }

}
