<?php

namespace SmartValidator;

use SmartValidator\Result;
use SmartValidator\RuleParser;
use SmartValidator\RuleEngine;

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
     * Run validation and return Result
     */
    public function validate(): Result
    {
        $allErrors = [];

        foreach ($this->rules as $field => $ruleString) {
            // Get value or null if missing
            $value = $this->data[$field] ?? null;

            // Parse rules string
            $parsedRules = RuleParser::parse($ruleString);

            // Run rules for this field
            $fieldErrors = RuleEngine::run($field, $value, $parsedRules);

            // Collect errors
            if (!empty($fieldErrors)) {
                $allErrors[$field] = $fieldErrors;
            }
        }

        return new Result($allErrors);
    }
}
