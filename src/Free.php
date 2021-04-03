<?php 

namespace Phell;

/**
 * 
 */
class Free extends AbstractCommand
{
	protected $command = 'free';

	protected function process($shell)
	{
		$shell = preg_split("/[\s]+/", $shell);
		array_shift($shell);
		array_pop($shell);

		$columns = array_slice($shell, 0, 6);
		$memPosition = array_search('Mem:', $shell);
		$swapPosition = array_search('Swap:', $shell) - count($shell);

		$firstLine = array_slice($shell, $memPosition + 1, array_search('Swap:', $shell) - $memPosition - 1);
		$lastLine = array_slice($shell, $swapPosition + 1);

		$memory = [];

		for ($i=0; $i < count($columns) ; $i++) { 
			$memory[$columns[$i]]['memory'] = $firstLine[$i];
			$memory[$columns[$i]]['swap'] = $secondLine[$i];
		}

		$this->data = $memory;
	}
}