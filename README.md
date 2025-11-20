# Semgrep Security Rules – Burrito

This branch contains custom Semgrep rules created to detect security vulnerabilities inside the Mutillidae codebase.  
The focus is on two main vulnerability classes:

- Cross-Site Scripting (XSS)
- SQL Injection (SQLi)

Both issues were identified during code review and reproduced inside the Mutillidae environment.

---

## Project Structure

```
semgrep-burrito/
│
├── rules/
│   ├── xss.yaml
│   └── sql.yaml
│
├── tests/
│   ├── xss-positive.php
│   └── xss-negative.php
│
└── semgrep.yml
```

---

## 1. XSS Detection Rule

File: `rules/xss.yaml`  
This rule detects unsanitized user input being directly echoed in PHP code.

### Logic
It looks for patterns where PHP echoes `$_REQUEST`, `$_GET`, or `$_POST` directly without sanitization.

Example vulnerable code:
```php
<?php echo $_REQUEST["page"]; ?>
```

---

## 2. SQL Injection Detection Rule

File: `rules/sql.yaml`  
This rule identifies SQL queries built using unsafe string concatenation.

### Logic
It detects queries like:
```php
$query = "SELECT * FROM users WHERE id=" . $_GET['id'];
```

---

## Test Cases

Tests are stored in the `tests` directory to ensure rules are accurate.

### Positive Example (should be flagged)
`tests/xss-positive.php`:
```php
<?php echo $_REQUEST["page"]; ?>
```

### Negative Example (should NOT be flagged)
`tests/xss-negative.php`:
```php
<?php echo htmlspecialchars($_GET["page"]); ?>
```

---

## Running Semgrep

To scan the Mutillidae codebase using these custom rules:

```bash
semgrep --config semgrep.yml .
```

---

## Expected Output

- XSS rule flags unsafe echoes such as: `echo $_REQUEST[…]`
- SQL Injection rule flags unsafe string concatenation inside SQL queries

The results will appear under:

```
rules.unsanitized-echo
rules.insecure-sql-concat
```

---

## Limitations

- Simple patterns may miss multi-line SQL query construction.
- XSS rule only detects direct `echo` of raw input.
- Rules may require tuning depending on coding structure.

---

## Author

**Burrito**  
Cybersecurity Student – Semgrep Lab

---

## Notes

This branch is prepared for Lab 4 deliverables and contains:
- Semgrep custom rules  
- Test cases  
- Config file  
- Clean commit history

