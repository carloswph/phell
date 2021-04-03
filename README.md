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
  [5]=>
  array(6) {
    ["filesystem"]=>
    string(5) "tmpfs"
    ["blocks/size"]=>
    string(4) "1.9G"
    ["used"]=>
    string(1) "0"
    ["available"]=>
    string(4) "1.9G"
    ["use_percentage"]=>
    string(2) "0%"
    ["mounted_on"]=>
    string(14) "/sys/fs/cgroup"
  }
  [6]=>
  array(6) {
    ["filesystem"]=>
    string(9) "/dev/sda1"
    ["blocks/size"]=>
    string(4) "285M"
    ["used"]=>
    string(4) "7.9M"
    ["available"]=>
    string(4) "277M"
    ["use_percentage"]=>
    string(2) "3%"
    ["mounted_on"]=>
    string(9) "/boot/efi"
  }
  [7]=>
  array(6) {
    ["filesystem"]=>
    string(5) "tmpfs"
    ["blocks/size"]=>
    string(4) "382M"
    ["used"]=>
    string(3) "44K"
    ["available"]=>
    string(4) "382M"
    ["use_percentage"]=>
    string(2) "1%"
    ["mounted_on"]=>
    string(14) "/run/user/1000"
  }
  [8]=>
  array(6) {
    ["filesystem"]=>
    string(10) "/dev/loop0"
    ["blocks/size"]=>
    string(4) "100M"
    ["used"]=>
    string(4) "100M"
    ["available"]=>
    string(1) "0"
    ["use_percentage"]=>
    string(4) "100%"
    ["mounted_on"]=>
    string(16) "/snap/core/10908"
  }
  [9]=>
  string(0) ""
}

*/
```

## Commands available

This package in a work in progress, so new commands will be added eventually. Keep checking the README file and updating the package to get access to all of them. 

**Available commands:**  df, free

**Underway:** iostat, vmstat, uptime, groups