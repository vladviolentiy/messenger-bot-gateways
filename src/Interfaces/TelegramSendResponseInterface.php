<?php

namespace VladViolentiy\VivaBotGates\Interfaces;

use VladViolentiy\VivaBotGates\Interfaces\Telegram\TelegramMessageObject;

abstract class TelegramSendResponseInterface
{
    public bool $ok;
    public TelegramMessageObject $result;
}