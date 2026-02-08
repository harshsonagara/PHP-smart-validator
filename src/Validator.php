<?php

namespace SmartValidator;

use SmartValidator\Result;

class Validator
{
    protected array $data;
    protected array $rules;

    /**
     * Private constructor to force static make() usage
     */
    private function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    /**
     * Entry point for validation
     */
    public static function make(array $data, array $rules): self
    {
        return new self($data, $rules);
    }

    /**
     * Run validation (logic will come later)
     */
    public function validate(): Result
    {
        // no real validation yet
        return new Result([]);
    }
}
