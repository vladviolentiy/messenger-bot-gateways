<?php

namespace VladViolentiy\VivaBotGates;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use VladViolentiy\VivaBotGates\Exceptions\BotGateException;

class Viber extends Metacore
{
    /**
     * @param non-empty-string $method
     * @param array $params
     * @return string
     * @throws GuzzleException
     */
    private function sendViberRequest(string $method, array $params):string{
        return $this->postQuery("https://chatapi.viber.com/pa/$method",$params,[
            "X-Viber-Auth-Token"=>$this->botId
        ]);
    }

    /**
     * @param non-empty-string[] $buttons
     * @return array{Type:string,DefaultHeight:bool,Buttons:list<array{Columns:positive-int,Rows:positive-int,ActionType:string,ActionBody:string,Silent:bool,Text:string}>}
     */
    private function simpleButtonMapper(array $buttons):array{
        $buttons = array_map(function ($item){
            return [
                "Columns"=>6,
                "Rows"=>1,
                "ActionType"=>"reply",
                "ActionBody"=>$item,
                "Silent"=>true ,
                "Text"=>$item
            ];
        },$buttons);
        return [
            "Type" => "keyboard",
            "DefaultHeight" => false,
            "Buttons" => $buttons
        ];
    }

    /**
     * @param non-empty-string $userId
     * @param non-empty-string $link
     * @param non-empty-string[] $buttons
     * @param non-empty-string|null $description
     * @return string
     * @throws BotGateException
     */
    public function sendImage(string $userId, string $link, array $buttons = [], ?string $description = null):string{
        $data = [
            "receiver"=>$userId,
            "min_api_version"=>6,
            "type"=>"picture",
            "media"=>$link,
        ];
        if($description!==null) $data['text'] = $description;

        if(count($buttons)>0) $data['keyboard'] = $this->simpleButtonMapper($buttons);
        return $this->sendViberRequest("send_message",$data);
    }

    /**
     * @param non-empty-string $userId
     * @param non-empty-string $link
     * @param positive-int $filesize
     * @param non-empty-string $fileName
     * @param non-empty-string[] $buttons
     * @return string
     */
    public function sendFile(string $userId, string $link, int $filesize, string $fileName, array $buttons = []):string{
        $data = [
            "receiver"=>$userId,
            "min_api_version"=>6,
            "type"=>"file",
            "media"=>$link,
            "size"=>$filesize,
            "file_name"=>$fileName
        ];

        if(count($buttons)>0) $data['keyboard'] = $this->simpleButtonMapper($buttons);

        return $this->sendViberRequest("send_message",$data);
    }
}