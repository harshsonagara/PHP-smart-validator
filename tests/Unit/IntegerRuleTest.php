<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use SmartValidator\RuleParser;
use SmartValidator\RuleEngine;

class IntegerRuleTest extends TestCase
{
    public function test_integer_passes_for_int()
    {
        $rules = RuleParser::parse('integer');
        $errors = RuleEngine::run('age', 10, $rules);

        $this->assertEmpty($errors);
    }

    public function test_integer_passes_for_numeric_string()
    {
        $rules = RuleParser::parse('integer');
        $errors = RuleEngine::run('age', '25', $rules);

        $this->assertEmpty($errors);
    }

    public function test_integer_fails_for_float()
    {
        $rules = RuleParser::parse('integer');
        $errors = RuleEngine::run('age', 10.5, $rules);

        $this->assertNotEmpty($errors);
    }

    public function test_integer_fails_for_non_numeric_string()
    {
        $rules = RuleParser::parse('integer');
        $errors = RuleEngine::run('age', 'abc', $rules);

        $this->assertNotEmpty($errors);
    }
}
