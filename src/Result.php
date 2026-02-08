<?php

namespace SmartValidator;

class Result
{
    protected array $errors = [];

    public function __construct(array $errors = [])
    {
        $this->errors = $errors;
    }

    /**
     * Did validation fail?
     */
    public function fails(): bool
    {
        return !empty($this->errors);
    }

    /**
     * Did validation pass?
     */
    public function passes(): bool
    {
        return empty($this->errors);
    }

    /**
     * Get all errors
     */
    public function errors(): array
    {
        return $this->errors;
    }
}
