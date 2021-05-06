<?php 

namespace Phell;

/**
 * 
 */
class Vmstat extends AbstractCommand
{
	protected $command = 'vmstat';

	protected function process($shell)
	{

		$shell = preg_split("/[\n]+/", $shell);
		array_shift($shell);
		array_shift($shell);
		array_pop($shell);

		$shell = preg_split("/[\s]+/", $shell[0]);
		array_shift($shell);

		$keys = [
			'processes_in_a_running_state',
			'processes_in_uninterruptible_sleep_state',
			'virtual_memory_used',
			'idle_memory',
			'memory_used_as_buffer',
			'memory_used_as_cache',
			'memory_swapped_in_from_disk',
			'memory_swapped_to_disk',
			'blocks_received_from_device',
			'blocks_sent_to_device',
			'interrupts_per_second',
			'context_switches_per_second',
			'time_spent_nonkernel_code',
			'time_spent_kernel_code',
			'time_spent_idle',
			'time_spent_io',
			'time_stolen_vm'
		];

		$shell = array_combine($keys, $shell);

		$this->data = $shell;
	}
}