<?php

namespace VladViolentiy\VivaBotGates\Interfaces\Viber;

abstract class ViberSenderObject
{
    /** @var non-empty-string  */
    public string $id;
    /** @var non-empty-string */
    public string $name;
    public string $avatar;
    public string $language;
    public string $country;
    public string $api_version;
}
