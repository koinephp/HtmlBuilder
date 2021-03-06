Koine Html Builder
--------------------

Work in progress

Code information:

[![Build Status](https://travis-ci.org/koinephp/HtmlBuilder.png?branch=master)](https://travis-ci.org/koinephp/HtmlBuilder)
[![Coverage Status](https://coveralls.io/repos/koinephp/HtmlBuilder/badge.png)](https://coveralls.io/r/koinephp/HtmlBuilder)
[![Code Climate](https://codeclimate.com/github/koinephp/HtmlBuilder.png)](https://codeclimate.com/github/koinephp/HtmlBuilder)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/koinephp/HtmlBuilder/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/koinephp/HtmlBuilder/?branch=master)

Package information:

[![Latest Stable Version](https://poser.pugx.org/koine/html-builder/v/stable.svg)](https://packagist.org/packages/koine/html-builder)
[![Total Downloads](https://poser.pugx.org/koine/html-builder/downloads.svg)](https://packagist.org/packages/koine/html-builder)
[![Latest Unstable Version](https://poser.pugx.org/koine/html-builder/v/unstable.svg)](https://packagist.org/packages/koine/html-builder)
[![License](https://poser.pugx.org/koine/html-builder/license.svg)](https://packagist.org/packages/koine/html-builder)
[![Dependency Status](https://gemnasium.com/koinephp/HtmlBuilder.png)](https://gemnasium.com/koinephp/HtmlBuilder)

### Usage

TODO

### Installing

#### Via Composer
Append the lib to your requirements key in your composer.json.

```javascript
{
    // composer.json
    // [..]
    require: {
        // append this line to your requirements
        "koine/html-builder": "dev-master"
    }
}
```

### Alternative install
- Learn [composer](https://getcomposer.org). You should not be looking for an alternative install. It is worth the time. Trust me ;-)
- Follow [this set of instructions](#installing-via-composer)

### Issues/Features proposals

[Here](https://github.com/koinephp/html-builder/issues) is the issue tracker.

### Contributing

Only TDD code will be accepted. Please follow the [PSR-2 code standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

### How to run the tests:

```bash
phpunit --configuration tests/phpunit.xml
```

### To check the code standard run:

```bash
phpcs --standard=PSR2 lib
phpcs --standard=PSR2 tests
```

### Lincense
[MIT](MIT-LICENSE)

### Authors

- [Marcelo Jacobus](https://github.com/mjacobus)
