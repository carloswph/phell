# Phell

Linux system monitor utilities offer a comprehensive way of checking and monitoring any server. However, not everyone wants or is able to be checking the command line all times. Also, as those commands use to return unformatted strings, it becomes challenging to process or store such data in a more friendly way.

This wrapper offers classes to execute and retrieve common shell system commands and return data in a PHP-friendly way.

# Installing

This package can be installed using Composer `composer require carloswph/phell`

# Usage

Using Composer, you need to use the classes correspondent to the shell commands you want data to be gotten and parsed. Additionally, you may want to use the enum class Params(), which provides constants to modify and apply parameters to the shell commands you are working with.

```php
use Phell\Df;
use Phell\Params;

require __DIR__ . '/vendor/autoload.php';

$df = new Df([
	Params::HUMAN_READABLE
]);
var_dump($df->get()); // Getting a parsed array of results for the shell command
```

## Commands available

This package in a work in progress, so new commands will be added eventually. Keep checking the README file and updating the package to get access to all of them. 

**Available commands:**  df, free

**Underway:** iostat, vmstat, uptime, groups