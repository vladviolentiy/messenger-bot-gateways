<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramChatObject
{
    /** @var non-zero-int  */
    public int $id;
    public string $first_name;
    public string $type;
}