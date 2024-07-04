<?php

namespace Conquest\Flash\Messages;

use Conquest\Core\Concerns\HasDescription;
use Conquest\Core\Concerns\HasLabel;
use Conquest\Core\Concerns\HasType;
use Conquest\Core\Primitive;
use Conquest\Flash\Enums\MessageType;

abstract class Message extends Primitive
{
    use HasLabel;
    use HasDescription;
    use HasType;

    public function __construct(
        string $message,
        ?string $description = null,
        string|MessageType|null $type = null
    )
    {
        if ($type instanceof MessageType) $type = $type->value;
        $this->setLabel($message);
        $this->setDescription($description);
        $this->setType($type);
    }

    public static function make(string $message, ?string $description = null, string|MessageType|null $type = null,
    ): static {
        return resolve(static::class, ...func_get_args());
    }

    public function toArray()
    {
        return [
            'label' => $this->getLabel(),
            'description' => $this->getdescription(),
            'type' => $this->getType()
        ];
    }
}