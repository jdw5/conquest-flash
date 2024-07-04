<?php

namespace Conquest\Flash\Concerns;

trait HasFlashDuration
{
    protected static int $duration = 5000; // seconds

    public static function setGlobalFlashDuration(int $duration): void
    {
        static::$duration = $duration;
    }

    public function duration(int $duration): static
    {
        $this->setDuration($duration);

        return $this;
    }

    public function setDuration(?int $duration): void
    {
        if (is_null($duration)) {
            return;
        }
        $this->duration = $duration;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }
}
