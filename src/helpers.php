<?php

use Conquest\Flash\Enums\MessageType;
use Conquest\Flash\Flash;
use Conquest\Flash\Messages\Message;

if (!function_exists('flash')) {
    /**
     * Flash a message to the session.
     *
     * @param string|null $title
     * @param string|null $description
     * @param string|MessageType|null $type
     * @param bool $toast
     * @return Flash
     */
    function flash(
        ?string $title = null, 
        ?string $description = null,
        string|MessageType|null $type = null,
        bool $toast = true,
    ): Flash {
        $flash = app(Flash::class);

        if (!is_null($title)) {
            $flash->flash($title, $description, $type, $toast);
        }

        return $flash;
    }
}