<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use SmartValidator\RuleParser;
use SmartValidator\RuleEngine;

class MaxRuleTest extends TestCase
{
    public function test_max_fails_for_long_string()
    {
        $rules = RuleParser::parse('max:3');
        $errors = RuleEngine::run('name', 'abcd', $rules);

        $this->assertNotEmpty($errors);
    }

    public function test_max_passes_for_short_string()
    {
        $rules = RuleParser::parse('max:3');
        $errors = RuleEngine::run('name', 'abc', $rules);

        $this->assertEmpty($errors);
    }

    public function test_max_fails_for_large_number()
    {
        $rules = RuleParser::parse('max:10');
        $errors = RuleEngine::run('age', 15, $rules);

        $this->assertNotEmpty($errors);
    }

    public function test_max_passes_for_valid_number()
    {
        $rules = RuleParser::parse('max:10');
        $errors = RuleEngine::run('age', 5, $rules);

        $this->assertEmpty($errors);
    }
}
