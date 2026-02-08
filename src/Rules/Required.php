<?php

namespace SmartValidator\Rules;

class Required implements RuleInterface
{
    public function __construct($value = null)
    {
        // required rule has no parameters
    }

    public function passes(string $field, $value): bool
    {
        if ($value === null) {
            return false;
        }

        if (is_string($value) && $value === '') {
            return false;
        }

        if (is_array($value) && empty($value)) {
            return false;
        }

        return true;
    }

    public function message(string $field): string
    {
        return "{$field} is required";
    }
}
