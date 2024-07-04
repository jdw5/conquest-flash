<?php

namespace Conquest\Flash\Concerns;

trait HasFlashDuration
{
    private static int $globalDuration = 5000; // milliseconds
    protected ?int $duration = null;

    public static function setGlobalFlashDuration(int $duration): void
    {
        static::$globalDuration = $duration;
    }

    public function duration(int $duration): static
    {
        $this->setDuration($duration);
        return $this;
    }

    public function setDuration(?int $duration): void
    {
        $this->duration = $duration;
    }

    public function getDuration(): int
    {
        return $this->duration ?? static::$globalDuration;
    }
}