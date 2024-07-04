<?php

namespace Conquest\Flash;

use Conquest\Flash\Enums\MessageType;
use Conquest\Flash\Messages\Banner;
use Conquest\Flash\Messages\Message;
use Conquest\Flash\Messages\Toast;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Traits\Macroable;

class Flash
{
    use Macroable;

    protected Session $session;

    public const TOAST_KEY = 'flash.toast';

    public const BANNER_KEY = 'flash.banner';

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function flash(
        string|Message $message,
        ?string $description = null,
        string|MessageType|null $type = null,
        bool $toast = true,
    ): void {
        match (true) {
            $message instanceof Banner => $this->banner($message),
            $message instanceof Message => $this->toast($message),
            $toast => $this->toast($message, $description, $type),
            default => $this->banner($message, $description, $type),
        };
    }

    public function toast(
        string|Message $message,
        ?string $description = null,
        string|MessageType|null $type = null,
    ): static {
        $this->flashMessage($message instanceof Message ? $message : Toast::make($message, $description, $type));

        return $this;
    }

    public function banner(
        string|Message $message,
        ?string $description = null,
        string|MessageType|null $type = null,
    ): static {
        $this->flashMessage($message instanceof Message ? $message : Banner::make($message, $description, $type));

        return $this;
    }

    public function flashMessage(Message $message): void
    {
        match (true) {
            $message instanceof Banner => $this->session->flash(self::BANNER_KEY, $message),
            default => $this->session->flash(self::TOAST_KEY, $message),
        };
    }
}
