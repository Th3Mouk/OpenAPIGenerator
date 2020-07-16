Open API Generator
==================

This PHP library allows you to cut and organize your __HUGE__ `openapi.yml` file, into small slices.

Versioning and deploy your OpenAPI documentation become easier.

[![Latest Stable Version](https://poser.pugx.org/th3mouk/openapi-generator/v/stable)](https://packagist.org/packages/th3mouk/openapi-generator)
[![Latest Unstable Version](https://poser.pugx.org/th3mouk/openapi-generator/v/unstable)](https://packagist.org/packages/th3mouk/openapi-generator)
[![Total Downloads](https://poser.pugx.org/th3mouk/openapi-generator/downloads)](https://packagist.org/packages/th3mouk/openapi-generator)
[![License](https://poser.pugx.org/th3mouk/openapi-generator/license)](https://packagist.org/packages/th3mouk/openapi-generator)

[![Build Status](https://travis-ci.org/th3mouk/openapigenerator.svg?branch=master)](https://travis-ci.org/th3mouk/openapigenerator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/th3mouk/openapigenerator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/th3mouk/openapigenerator/?branch=master)

## Installation

`composer require th3mouk/openapi-generator`

## Usage

Inside your project you can now run additional commands:

 - `vendor/bin/openapi scaffold`
 - `vendor/bin/openapi generate`

### Scaffold

To prepare your project, run the first command `scaffold`.

It will create new folders.
```txt
specs
├── components
│   ├── schemas
│   ├── responses
│   ├── parameters
│   ├── examples
│   ├── requestBodies
│   ├── headers
│   ├── securitySchemes
│   ├── links
│   └── callbacks
└── paths
```

### Add your schema

I personnaly use [Swagger OpenAPI specifications](https://swagger.io/specification/) to write my schema.

One example of organization can be :
```txt
specs
├── components
└── paths
    ├── authentication
    │   ├── login.yaml
    │   └── register.yaml
    └── unicorn
        ├── list.yaml
        └── detail.yaml
```

### Generate

The command `vendor/bin/openapi generate` take arguments and options to generate the `openapi.yml` file.

You can add a path like this `vendor/bin/openapi generate /in-this-folder/sub`

And it exists a `--pretty-json` or `-p` option to obtain a human readable file.

## Please

Feel free to improve this library.
