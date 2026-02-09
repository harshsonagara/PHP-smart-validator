<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use SmartValidator\RuleParser;
use SmartValidator\RuleEngine;

class RequiredRuleTest extends TestCase
{
    public function test_required_fails_on_null()
    {
        $rules = RuleParser::parse('required');
        $errors = RuleEngine::run('email', null, $rules);

        $this->assertNotEmpty($errors);
    }

    public function test_required_fails_on_empty_string()
    {
        $rules = RuleParser::parse('required');
        $errors = RuleEngine::run('email', '', $rules);

        $this->assertNotEmpty($errors);
    }

    public function test_required_passes_on_value()
    {
        $rules = RuleParser::parse('required');
        $errors = RuleEngine::run('email', 'test@example.com', $rules);

        $this->assertEmpty($errors);
    }
}
