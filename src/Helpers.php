<?php 

namespace Phell;

class Helpers
{
	/**
	 * Grab a substring between two different segments of an existent string.
	 *
	 * @since  1.0.1
	 * @param  $string  string  Entire string to parse.
	 * @param  $from string  Initial substring.
	 * @param  $to  string  Final substring.
	 *
	 * @return  $between  string  Substring between the two segments submitted.
	 */
	public static function between(string $string, string $from, string $to)
	{
		$sub = substr($string, strpos($string,$from) + strlen($from),strlen($string));
		$between = substr($sub,0,strpos($sub,$to));

		return $between;
	}
}