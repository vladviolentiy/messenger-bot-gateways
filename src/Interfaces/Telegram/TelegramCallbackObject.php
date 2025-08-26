<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramCallbackObject
{
    public int $id;
    public TelegramFromObject $from;
    public TelegramMessageObject $message;
    public string $chat_instance;
    public string $data;
}
