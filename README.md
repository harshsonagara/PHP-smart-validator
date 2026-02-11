# PHP SmartValidator

[![Tests](https://github.com/harshsonagara/php-smart-validator/actions/workflows/tests.yml/badge.svg)](https://github.com/harshsonagara/php-smart-validator/actions/workflows/tests.yml)

A lightweight, framework-agnostic validation library for PHP.

SmartValidator provides a clean, Laravel-like validation experience without
depending on any framework. It is suitable for plain PHP projects, APIs,
microservices, and legacy applications.

---

## Requirements

- PHP >= 8.1
- Composer

---

## Installation

Install via Composer:

```bash
composer require harsh/php-smart-validator
```

---

## Basic Usage

```php
use SmartValidator\Validator;

$data = [
    'email' => '',
    'age'   => 16,
];

$rules = [
    'email' => 'required|email',
    'age'   => 'min:18',
];

$result = Validator::make($data, $rules)->validate();

if ($result->fails()) {
    print_r($result->errors());
}
```

### Output

```php
Array
(
    [email] => Array
        (
            [0] => email is required
        )

    [age] => Array
        (
            [0] => age must be at least 18
        )
)
```

---

## Validation State

```php
$result->passes(); // true if no validation errors
$result->fails();  // true if validation errors exist
```

---

## Available Rules

| Rule     | Description                              |
| -------- | ---------------------------------------- |
| required | Field must be present and not empty      |
| email    | Must be a valid email address            |
| min:x    | Minimum length (string), value, or count |

---

## Optional vs Required Fields

```php
$rules = [
    'email' => 'email'
];
```

- Empty value → passes
- Invalid email → fails

To enforce presence:

```php
'email' => 'required|email'
```

---

## API / JSON Example

```php
if ($result->fails()) {
    echo json_encode([
        'status' => false,
        'errors' => $result->errors()
    ]);
    exit;
}
```

---

## Testing

Run the test suite:

```bash
vendor/bin/phpunit
```

---

## Versioning

SmartValidator uses **Git tags** for versioning (Semantic Versioning).

Example:

```bash
git tag v0.1.0
git push origin v0.1.0
```

---

## License

MIT License




