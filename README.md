# Semgrep Rules - burrito

This branch contains custom Semgrep rules for detecting:

## 1. XSS via unsanitized echo
File: rules/xss.yaml  
Detects direct echo of user-controlled input.

## 2. SQL Injection via string concatenation
File: rules/sql.yaml  
Detects insecure SQL concatenation in PHP code.

## Tests
Located in /tests to show positive and negative examples.

Run Semgrep:

