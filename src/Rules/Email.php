<?php

namespace SmartValidator\Rules;

class Email implements RuleInterface
{
    public function __construct($value = null)
    {
        // email rule has no parameters
    }

    public function passes(string $field, $value): bool
    {
        // Let required rule handle empty cases
        if ($value === null || $value === '') {
            return true;
        }

        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function message(string $field): string
    {
        return "{$field} must be a valid email address";
    }
}
