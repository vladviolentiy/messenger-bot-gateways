<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramFromObject
{
    public int $id;
    public bool $is_bot;
    public ?bool $is_premium;
    public string $first_name;
    public string $username;
    public string $language_code;
}