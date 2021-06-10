# Phell

Linux system monitor utilities offer a comprehensive way of checking and monitoring any server. However, not everyone wants or is able to be checking the command line all times. Also, as those commands use to return unformatted strings, it becomes challenging to process or store such data in a more friendly way.

This wrapper offers classes to execute and retrieve common shell system commands and return data in a PHP-friendly way. Available classes/commands:

* df
* man
* free
* lscpu
* lsmem
* vmstat (no arguments)

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

/*
RESULTS:

array(10) {
  [0]=>
  array(6) {
    ["filesystem"]=>
    string(4) "udev"
    ["blocks/size"]=>
    string(4) "1.9G"
    ["used"]=>
    string(1) "0"
    ["available"]=>
    string(4) "1.9G"
    ["use_percentage"]=>
    string(2) "0%"
    ["mounted_on"]=>
    string(4) "/dev"
  }
  [1]=>
  array(6) {
    ["filesystem"]=>
    string(5) "tmpfs"
    ["blocks/size"]=>
    string(4) "382M"
    ["used"]=>
    string(4) "1.8M"
    ["available"]=>
    string(4) "380M"
    ["use_percentage"]=>
    string(2) "1%"
    ["mounted_on"]=>
    string(4) "/run"
  }
  [2]=>
  array(6) {
    ["filesystem"]=>
    string(9) "/dev/sda3"
    ["blocks/size"]=>
    string(4) "449G"
    ["used"]=>
    string(3) "31G"
    ["available"]=>
    string(4) "395G"
    ["use_percentage"]=>
    string(2) "8%"
    ["mounted_on"]=>
    string(1) "/"
  }
  [3]=>
  array(6) {
    ["filesystem"]=>
    string(5) "tmpfs"
    ["blocks/size"]=>
    string(4) "1.9G"
    ["used"]=>
    string(4) "156M"
    ["available"]=>
    string(4) "1.8G"
    ["use_percentage"]=>
    string(2) "9%"
    ["mounted_on"]=>
    string(8) "/dev/shm"
  }
  [4]=>
  array(6) {
    ["filesystem"]=>
    string(5) "tmpfs"
    ["blocks/size"]=>
    string(4) "5.0M"
    ["used"]=>
    string(4) "4.0K"
    ["available"]=>
    string(4) "5.0M"
    ["use_percentage"]=>
    string(2) "1%"
    ["mounted_on"]=>
    string(9) "/run/lock"
  }
  [5]=> ... and so on...
}

*/

```
# Using 'man' command

Using the command 'man' is somewhat different than using all the others. As per getting a response, one must provide the bash command for which the manual is required. So, while instantiating the class, you must pass the bash command as parameter.

```php
use Phell\Man;
use Phell\Params;

require __DIR__ . '/vendor/autoload.php';


$cpu = new Man('dir');
echo $cpu->toHtml(); // Generate the response in readable HTML
var_dump($cpu->get()); // Regular response in JSON
var_dump($cpu->toArray()); // Parsed response in PHP array, in which subtitles of the manual are keys
```

# Adding a new command

Of course you can use the main abstract class to manage any other shell command and add new classes. For such, the only mandatory method will be process(), using the protected visibility, and the sole necessary property being $command, in which you will declare your new shell command, like this:

```php
namespace Phell;

/**
 * 
 */
class NewCommand extends AbstractCommand
{
	protected $command = 'newcommand';

	protected function process($shell)
	{
		// Process and parsing
	}
}
```
Additionally, even though you can always find another way of processing additional parameters in your new command, we encourage you to use the enum class Params to do that - as some of the necessary parameters could be possibly around there yet.

## Commands available

This package in a work in progress, so new commands will be added eventually. Keep checking the README file and updating the package to get access to all of them. 

**Available commands:**  df, free, lscpu, lsmem, vmstat

**Underway:** iostat, uptime, groups