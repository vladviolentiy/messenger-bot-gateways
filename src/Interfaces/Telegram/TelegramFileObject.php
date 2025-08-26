<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramFileObject
{
    public string $file_name;
    public string $mime_type;
    public string $file_id;
    public string $file_unique_id;
    public int $file_size;
}
