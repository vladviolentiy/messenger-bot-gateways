<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Telegram;

abstract class TelegramPhotoObject
{
    public string $file_id;
    public string $file_unique_id;
    public int $file_size;
    public int $width;
    public int $height;

}
