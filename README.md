# Pipe

Pipe is a utility class for fluent string manipulation.

## Requirements

- PHP >= 8

## Installation

Using [composer](https://getcomposer.org)

```shell
composer require xtompie/pipe
```

## Doc

### Basic example

```php
<?php

use Xtompie\Pipe\Pipe;

$result = Pipe::new('  <h1>Hello World</h1>  ')
    ->trim()
    ->lower()
    ->ucfirst()
    ->htmlspecialchars()
    ->get();

echo $result;
```

The output will be: `Hello world`

Available methods

- addslashes() - Adds slashes before characters that need to be escaped in a string.
- explode(string $delimiter) - Splits the string by the specified delimiter.
- htmlspecialchars() - Converts special characters to HTML entities.
- implode(string $glue = ‘’) - Joins array elements into a string using the specified glue.
- lower() - Converts all alphabetic characters to lowercase.
- map(callable $callback) - Applies the callback function to the current value and returns a new Pipe object with the transformed value.
- md5() - Calculates the MD5 hash of a string.
- nl2br() - Inserts HTML line breaks before all newlines in a string.
- object(string $type) - Converts the current value into a specified object.
- replace(string $search, string $replace) - Replaces occurrences of the search string with the replacement string.
- reverse() - Reverses the string.
- sha1() - Calculates the SHA-1 hash of a string.
- length() - Returns the length of the string.
- slice() - Extract a slice of the array
- strpos(string $needle) - Finds the position of the first occurrence of a substring.
- stripTags() - Strips HTML and PHP tags from a string.
- substr(int $start, int $length = null) - Returns part of a string.
- trim() - Strips whitespace from the beginning and end of the string.
- ucfirst() - Capitalizes the first letter of the string.
- ucwords() - Capitalizes the first letter of each word in a string.
- upper() - Converts all alphabetic characters to uppercase.

Creating a specific transformation pipeline

You can extend the Pipe class to create a specific pipeline with custom methods.

```php
<?php

use Xtompie\Pipe\Pipe;

class CustomPipe extends Pipe
{
    public function reverseAndUpper(): static
    {
        return $this->reverse()->upper();
    }
}

$result = CustomPipe::new('Hello World')
    ->reverseAndUpper()
    ->get();

echo $result;
```

The output will be: `DLROW OLLEH`
