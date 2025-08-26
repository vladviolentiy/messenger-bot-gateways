<?php

namespace VladViolentiy\VivaBotGates\Interfaces;

use VladViolentiy\VivaBotGates\Interfaces\Telegram\TelegramCallbackObject;
use VladViolentiy\VivaBotGates\Interfaces\Telegram\TelegramMessageObject;

abstract class TelegramRequestInterface
{
    public int $update_id;
    public ?TelegramCallbackObject $callback_query;
    public ?TelegramMessageObject $message;
}
