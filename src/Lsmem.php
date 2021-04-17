<?php 

namespace Phell;

/**
 * 
 */
class Lsmem extends AbstractCommand
{
	protected $command = 'lsmem';

	protected function process($shell)
	{
		$shell = preg_split("/[\n]+/", $shell);
		array_shift($shell);
		array_pop($shell);

		$findBlockSize = $this->finder('Memory block', $shell);
		$blockSize = preg_replace("/[\s]+/", '', $shell[$findBlockSize]);
		$blockSize = str_replace('Memoryblocksize:', '', $blockSize);

		$findOnlineMem = $this->finder('online memory', $shell);
		$onlineMem = preg_replace("/[\s]+/", '', $shell[$findOnlineMem]);
		$onlineMem = str_replace('Totalonlinememory:', '', $onlineMem);

		$findOfflineMem = $this->finder('offline memory', $shell);
		$offlineMem = preg_replace("/[\s]+/", '', $shell[$findOfflineMem]);
		$offlineMem = str_replace('Totalofflinememory:', '', $offlineMem);


		$data = [];

		for ($i = 0; $i < $findBlockSize ; $i++) { 
			$split = preg_split("/[\s]+/", $shell[$i]);
			$data['cards'][] = [
				'range' => $split[0],
				'size' => $split[1],
				'state' => $split[2],
				'is_removable' => $split[3],
				'block' => $split[4]
			];
		}

		$data['memory_block_size'] = $blockSize;
		$data['total_online_memory'] = $onlineMem;
		$data['total_offline_memory'] = $offlineMem;

		$this->data = $data;

	}

	public function finder(string $segment, array $array)
	{
		foreach ($array AS $key => $value) {

			if (stristr($value, $segment) === false) {

				continue;
			} else {

				return $key;
			}
		}
	}
}