<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramMessageObject
{
    public int $message_id;
    public TelegramFromObject $from;
    public TelegramChatObject $chat;
    public int $date;
    public ?string $text;
    public ?TelegramMessageObject $reply_to_message;
    /** @var TelegramPhotoObject[] */
    public ?array $photo;
    public ?TelegramFileObject $document;
    public ?TelegramVoiceObject $voice;
    public ?TelegramLocationObject $location;
}