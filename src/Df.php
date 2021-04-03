<?php 

namespace Phell;

/**
 * 
 */
class Df extends AbstractCommand
{
	protected $command = 'df';

	protected function process($shell)
	{
		$shell = shell_exec("df -h");
		$shell = explode("\n", $shell);
		
		$colNames = [
			'filesystem', 
			'blocks/size', 
			'used', 
			'available', 
			'use_percentage', 
			'mounted_on'];

		array_shift($shell);

		for ($i=0; $i < (count($shell) - 1); $i++) { 
			$shell[$i] = preg_split("/[\s]+/", $shell[$i]);
			for ($j=0; $j < (count($shell[$i])); $j++) { 
				$shell[$i][$colNames[$j]] = $shell[$i][$j];
				unset($shell[$i][$j]);
			}
		}

		$this->data = $shell;
	}
}