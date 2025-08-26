<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramVoiceObject
{
    public int $duration;
    public string $mime_type;
    public string $file_id;
    public string $file_unique_id;
    public int $file_size;
}
