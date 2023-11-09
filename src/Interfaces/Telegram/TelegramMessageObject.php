<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramMessageObject
{
    /** @var positive-int  */
    public int $message_id;
    public TelegramFromObject $from;
    public TelegramChatObject $chat;
    public int $date;
    public ?string $text;
    public ?TelegramMessageObject $reply_to_message;
    /** @var TelegramPhotoObject[]|null */
    public ?array $photo;
    public ?TelegramFileObject $document;
    public ?TelegramVoiceObject $voice;
    public ?TelegramLocationObject $location;
}