<?php

namespace SmartValidator;

class RuleParser
{
    /**
     * Parse rule string into structured rules
     *
     * @param string $rules
     * @return array
     */
    
    public static function parse(string $rules): array
    {
        $parsed = [];

        // Split rules by pipe: required|min:8|email
        $ruleParts = explode('|', $rules);

        foreach ($ruleParts as $rule) {
            // Check if rule has parameters (min:8)
            if (str_contains($rule, ':')) {
                [$name, $value] = explode(':', $rule, 2);
                $parsed[] = [$name, $value];
            } else {
                $parsed[] = [$rule, null];
            }
        }

        return $parsed;
    }
}
