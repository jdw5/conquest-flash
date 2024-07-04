<?php

namespace Conquest\Flash\Messages;

use Conquest\Flash\Concerns\HasFlashDuration;

class Toast extends Message
{
    use HasFlashDuration;

    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'duration' => $this->getDuration(),
        ]);
    }
}
