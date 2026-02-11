<?php

namespace SmartValidator\Rules;

class Integer implements RuleInterface
{

    public function __construct($value = null)
    {
        // Integer rule has no parameters
    }

    public function passes(string $field, $value): bool
    {
        // Let 'required' handle empties
        if ($value === null || $value === '') {
            return true;
        }

        if (is_int($value)) {
            return true;
        }

        // Accept numeric strings that represent integers
        if (is_string($value) && preg_match('/^-?\d+$/', $value)) {
            return true;
        }

        return false;
    }

    public function message(string $field): string
    {
        return "{$field} must be an integer";
    }
}
