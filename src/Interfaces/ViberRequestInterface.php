<?php

namespace VladViolentiy\VivaBotGates\Interfaces;

use VladViolentiy\VivaBotGates\Interfaces\Viber\ViberMessageFile;
use VladViolentiy\VivaBotGates\Interfaces\Viber\ViberMessageImage;
use VladViolentiy\VivaBotGates\Interfaces\Viber\ViberMessageObject;
use VladViolentiy\VivaBotGates\Interfaces\Viber\ViberSenderObject;

abstract class ViberRequestInterface
{
    public string $event;
    public int $timestamp;
    public string $chat_hostname;
    /** @var non-empty-string|null  */
    public ?string $user_id;
    public int $message_token;
    /**
     * @var ViberMessageObject|ViberMessageImage|ViberMessageFile
     */
    public $message;
    public ?ViberSenderObject $sender;
    public ?ViberSenderObject $user;
    public bool $silent;
}
