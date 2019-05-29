cs:
	vendor/bin/phpcs

fix_cs:
	vendor/bin/phpcbf

stan:
	vendor/bin/phpstan analyse

ci: cs stan
