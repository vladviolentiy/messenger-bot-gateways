<?php

namespace VladViolentiy\VivaBotGates\Methods;

use VladViolentiy\VivaBotGates\Exceptions\DecodeException;
use VladViolentiy\VivaBotGates\Interfaces\TelegramRequestInterface;

class Telegram
{
    /**
     * @param TelegramRequestInterface $query
     * @return array{clientId:non-zero-int,text:string,messageId:positive-int,type:"callback"|"text",fName:string}
     */
    public static function getBasicUserInfo($query):array{
        if(isset($query->callback_query)){
            return [
                "type"=>'callback',
                'clientId'=>$query->callback_query->message->chat->id,
                'messageId'=>$query->callback_query->message->message_id,
                'text'=>$query->callback_query->data,
                'fName'=>$query->callback_query->from->first_name,
            ];
        } else if (isset($query->message)) {
            return [
                'type'=>"text",
                'clientId'=>$query->message->chat->id,
                'text'=>$query->message->text??"",
                'messageId'=>$query->message->message_id,
                'fName'=>$query->message->from->first_name,
            ];
        }
        throw new DecodeException();
    }
}