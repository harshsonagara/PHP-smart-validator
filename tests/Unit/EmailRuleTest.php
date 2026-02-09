<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use SmartValidator\RuleParser;
use SmartValidator\RuleEngine;

class EmailRuleTest extends TestCase
{
    public function test_email_passes_on_empty()
    {
        $rules = RuleParser::parse('email');
        $errors = RuleEngine::run('email', '', $rules);

        $this->assertEmpty($errors);
    }

    public function test_email_fails_on_invalid_email()
    {
        $rules = RuleParser::parse('email');
        $errors = RuleEngine::run('email', 'abc', $rules);

        $this->assertNotEmpty($errors);
    }

    public function test_email_passes_on_valid_email()
    {
        $rules = RuleParser::parse('email');
        $errors = RuleEngine::run('email', 'test@example.com', $rules);

        $this->assertEmpty($errors);
    }
}
