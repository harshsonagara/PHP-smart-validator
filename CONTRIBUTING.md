
# Contributing to PHP SmartValidator

Thanks for your interest in contributing! 🎉  
This document explains **how to work on this repository safely and correctly**.

---

## Basic Rules

- ❌ Do NOT push directly to `main`
- ✅ Always work on a feature branch
- ✅ Open a Pull Request (PR)
- ✅ All tests must pass before merging

The `main` branch is protected.

---

## Development Setup

### Requirements

- PHP >= 8.1
- Composer

### Install dependencies

```bash
composer install
````

### Run tests

```bash
vendor/bin/phpunit
```

All tests must pass before opening a PR.

---

## Branch Workflow

1. Make sure `main` is up to date:

```bash
git checkout main
git pull
```

2. Create a new branch:

```bash
git checkout -b feature/your-feature-name
```

3. Make your changes and commit:

```bash
git add .
git commit -m "Describe your change clearly"
```

4. Push your branch:

```bash
git push origin feature/your-feature-name
```

5. Open a Pull Request on GitHub.

---

## Pull Request Rules

* CI (GitHub Actions) must be **green**
* Code should be readable and clean
* Small, focused PRs are preferred
* One feature or fix per PR

---

## Commit Messages

Use clear, meaningful commit messages:

✅ Good:

```
Add max validation rule
Fix email rule edge case
Improve validation error handling
```

❌ Bad:

```
fix
update
working
```

---

## Code Style Guidelines

* Follow existing project structure
* Keep logic simple and readable
* Do not add unnecessary dependencies
* Avoid breaking existing APIs

---

## Reporting Issues

If you find a bug:

* Open a GitHub Issue
* Include steps to reproduce
* Include PHP version and error output if possible

---

## Questions

If anything is unclear, open a discussion or issue.
We prefer **clear communication over silent confusion**.

Happy coding 🚀


