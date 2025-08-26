<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Viber;

abstract class ViberMessageImage
{
    public string $type = 'picture';
    public string $media;
    public string $thumbnail;
    public string $file_name;
    public int $size;
}
