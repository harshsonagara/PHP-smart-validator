<?php

namespace SmartValidator\Rules;

class Max implements RuleInterface
{
    protected int $max;

    public function __construct($value = null)
    {
        $this->max = (int) $value;
    }

    public function passes(string $field, $value): bool
    {
        // Let required rule handle empty cases
        if ($value === null || $value === '') {
            return true;
        }

        if (is_string($value)) {
            return mb_strlen($value) <= $this->max;
        }

        if (is_numeric($value)) {
            return $value <= $this->max;
        }

        if (is_array($value)) {
            return count($value) <= $this->max;
        }

        // Unsupported type → fail safe
        return false;
    }

    public function message(string $field): string
    {
        return "{$field} must be at least {$this->max}";
    }
}
