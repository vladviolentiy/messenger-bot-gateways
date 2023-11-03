<?php

namespace VladViolentiy\VivaBotGates;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Telegram extends Metacore
{
    /**
     * @param non-empty-string $method
     * @param array $params
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function tgQuery(string $method, array $params):string{
        return $this->postQuery("https://api.telegram.org/".$this->botId."/$method",$params);
    }

    /**
     * @param non-zero-int $chatId
     * @param positive-int $messageId
     * @param non-empty-string $text
     * @param string $inlineInfo
     * @return string
     * @throws GuzzleException
     */
    public function editMessage(int $chatId, int $messageId, string $text, string $inlineInfo=""):string{
        $arr = [
            "text"=>$text,
            "chat_id"=>$chatId,
            "message_id"=>$messageId,
            "parse_mode"=>"markdown"
        ];
        if($inlineInfo!="") {
            $arr["reply_markup"] =$inlineInfo;
        }
        return $this->tgQuery("editMessageText",$arr);
    }

    /**
     * @param positive-int $callback_message_id
     * @return void
     * @throws GuzzleException
     */
    public function callBackAnswer(int $callback_message_id):void{
        $this->tgQuery("answerCallbackQuery",[
            "callback_query_id"=>$callback_message_id
        ]);
    }

    /**
     * @param positive-int $callbackQueryId
     * @param non-empty-string $text
     * @return string
     * @throws GuzzleException
     */
    public function answerInlineQuery(int $callbackQueryId, string $text):string{
        return $this->tgQuery("answerCallbackQuery",[
            "text"=>$text,
            "callback_query_id"=>$callbackQueryId
        ]);
    }

    /**
     * @param non-zero-int $userId
     * @param non-empty-string $imgUrl
     * @param string $text
     * @param string $inlineInfo
     * @return string
     * @throws GuzzleException
     */
    public function sendPhoto(int $userId , string $imgUrl, string $text = "", string $inlineInfo = ""):string{
        $params = [
            "photo"=>$imgUrl,
            "chat_id" => $userId
        ];
        if($text!=='') $params['caption'] = $text;
        if($inlineInfo!="") $params['reply_markup'] = $inlineInfo;
        return $this->tgQuery("sendPhoto", $params);
    }

    /**
     * @param non-zero-int $userId
     * @param non-empty-string $text
     * @param array|null $buttons
     * @param bool $inlineMode
     * @return string
     * @throws GuzzleException
     */
    public function sendMessage(int $userId, string $text, ?array $buttons = [], bool $inlineMode = false):string{
        $params = [
            "text" => $text,
            "chat_id" => $userId,
            "parse_mode" => "markdown",
        ];
        if($buttons!==null){
            if($inlineMode){
                /** @var string $encoded */
                $encoded = json_encode([
                    "inline_keyboard"=>$buttons
                ]);
            } else {
                /** @var string $encoded */
                $encoded = json_encode([
                    "keyboard"=>$buttons,
                    "resize_keyboard"=>true
                ]);
            }

            $params['reply_markup'] = $encoded;
        }

        return $this->tgQuery("sendMessage", $params);
    }

    /**
     * @param non-empty-string $fileId
     * @return string
     * @throws GuzzleException
     */
    public function getFile(string $fileId):string{
        $postData = $this->tgQuery("getFile", [
            "file_id"=>$fileId
        ]);
        $decodedData = json_decode($postData);
        return "https://api.telegram.org/file/" . $this->botId . "/".$decodedData->result->file_path;
    }
}