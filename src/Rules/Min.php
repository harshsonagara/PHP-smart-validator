<?php

namespace SmartValidator\Rules;

class Min implements RuleInterface
{
    protected int $min;

    public function __construct($value = null)
    {
        $this->min = (int) $value;
    }

    public function passes(string $field, $value): bool
    {
        // Let required rule handle empty cases
        if ($value === null || $value === '') {
            return true;
        }

        if (is_string($value)) {
            return mb_strlen($value) >= $this->min;
        }

        if (is_numeric($value)) {
            return $value >= $this->min;
        }

        if (is_array($value)) {
            return count($value) >= $this->min;
        }

        // Unsupported type → fail safe
        return false;
    }

    public function message(string $field): string
    {
        return "{$field} must be at least {$this->min}";
    }
}
