<?php 

namespace Phell;

/**
 * 
 */
class ApacheCtl extends AbstractCommand
{
	protected $command = 'apachectl';

	protected function process($shell)
	{
		$data = [
			'total_accesses' => intval(Helpers::between($shell, 'accesses: ', ' -'));
			'total_duration' => intval(Helpers::between($shell, 'Duration: ', ''));
		];
	}

}