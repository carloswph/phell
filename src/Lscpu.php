<?php 

namespace Phell;

/**
 * 
 */
class Lscpu extends AbstractCommand
{
	protected $command = 'lscpu';

	protected function process($shell)
	{
		$shell = preg_split("/[\n]+/", $shell);

		$i = 0;

		for ($i = 0; $i < count($shell) ; $i++) { 
			
			$separating = explode(':', $shell[$i]);
			$shell[$this->toSlug($separating[0])] = ltrim($separating[1]);
			unset($shell[$i]);
		}

		$this->data = $shell;
	}

	public function toSlug($string)
	{
        return strtolower(trim(preg_replace("/[^A-Za-z0-9-]+/", '_', $string), '_'));
    }
}