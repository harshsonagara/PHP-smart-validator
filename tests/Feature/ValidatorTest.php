<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use SmartValidator\Validator;

class ValidatorTest extends TestCase
{
    public function test_validator_returns_errors_for_invalid_data()
    {
        $data = [
            'email' => '',
            'age' => 16
        ];

        $rules = [
            'email' => 'required|email',
            'age' => 'min:18'
        ];

        $result = Validator::make($data, $rules)->validate();

        $this->assertTrue($result->fails());
        $this->assertArrayHasKey('email', $result->errors());
        $this->assertArrayHasKey('age', $result->errors());
    }

    public function test_validator_passes_for_valid_data()
    {
        $data = [
            'email' => 'test@example.com',
            'age' => 21
        ];

        $rules = [
            'email' => 'required|email',
            'age' => 'min:18'
        ];

        $result = Validator::make($data, $rules)->validate();

        $this->assertTrue($result->passes());
        $this->assertEmpty($result->errors());
    }
}
