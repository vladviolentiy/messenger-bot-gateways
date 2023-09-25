<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramChatObject
{
    public int $id;
    public string $first_name;
    public string $type;
}