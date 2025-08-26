<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Viber;

abstract class ViberMessageFile
{
    public string $type = 'file';
    public string $media;
    public string $file_name;
    public int $size;
}
