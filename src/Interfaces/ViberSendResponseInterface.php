<?php

namespace VladViolentiy\VivaBotGates\Interfaces;

abstract class ViberSendResponseInterface
{
    public int $status;
    public string $status_message;
    public int $message_token;
    public string $chat_hostname;
    public int $billing_status;

}
