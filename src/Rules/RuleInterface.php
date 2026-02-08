<?php

namespace SmartValidator\Rules;

interface RuleInterface
{
    /**
     * Create a rule instance
     *
     * @param mixed $value
     */
    public function __construct($value = null);

    /**
     * Determine if the rule passes
     *
     * @param string $field
     * @param mixed  $value
     * @return bool
     */
    public function passes(string $field, $value): bool;

    /**
     * Get the validation error message
     *
     * @param string $field
     * @return string
     */
    public function message(string $field): string;
}
