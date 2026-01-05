<?php
declare(strict_types=1);

final class ValidationError
{
    public function __construct(
        public readonly string $field,
        public readonly string $message
    ) {}
}
