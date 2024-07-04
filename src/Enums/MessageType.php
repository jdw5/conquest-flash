<?php

namespace Conquest\Flash\Enums;

enum MessageType: string
{
    case INFO = 'info';
    case SUCCESS = 'success';
    case WARNING = 'warning';
    case ERROR = 'error';
}
