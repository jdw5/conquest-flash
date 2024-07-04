<?php

use Conquest\Flash\Enums\MessageType;
use Conquest\Flash\Flash;

if (! function_exists('flash')) {
    /**
     * Flash a message to the session.
     */
    function flash(
        ?string $message = null,
        ?string $description = null,
        string|MessageType|null $type = null,
        bool $toast = true,
    ): Flash {
        $flash = app(Flash::class);

        if (! is_null($message)) {
            $flash->flash($message, $description, $type, $toast);
        }

        return $flash;
    }
}
