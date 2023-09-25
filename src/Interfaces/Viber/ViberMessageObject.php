<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Viber;

abstract class ViberMessageObject
{
    public ?string $text;
    public string $type = "text";

}