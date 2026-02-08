<?php

namespace SmartValidator;

use SmartValidator\Rules\RuleInterface;

class RuleEngine
{
    /**
     * Run rules for a single field
     *
     * @param string $field
     * @param mixed  $value
     * @param array  $rules
     * @return array
     */
    public static function run(string $field, $value, array $rules): array
    {
        $errors = [];

        foreach ($rules as [$ruleName, $ruleValue]) {
            $ruleClass = self::resolveRule($ruleName);

            if (!$ruleClass) {
                continue; // unknown rule, ignore for now
            }

            $rule = new $ruleClass($ruleValue);

            if (!$rule->passes($field, $value)) {
                $errors[] = $rule->message($field);
            }
        }

        return $errors;
    }

    /**
     * Resolve rule name to class
     */
    protected static function resolveRule(string $rule): ?string
    {
        $class = 'SmartValidator\\Rules\\' . ucfirst($rule);

        return class_exists($class) ? $class : null;
    }
}
