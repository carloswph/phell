<?php 

namespace Phell;

/**
 * Abstract class to be extended by new commands
 * Uses parameters from enum class Phell\Params
 *
 * @since  1.0.0
 * @author  WP Helpers | Carlos Matos
 */
abstract class AbstractCommand implements \Countable
{
	protected $command;

	public $data;

	public function __construct(array $params = null)
	{
		foreach ($params as $key => $value) {
			$this->command = $this->command . $value;
		}
		$this->execute();
	}
	/**
	 * Executes the child class particular shell command
	 * 
	 * @since  1.0.0
	 * @return  $this->process()
	 */
	protected function execute()
	{
		$shell = shell_exec($this->command);
		return $this->process($shell);
	}
	/**
	 * Process the string retrieved by the shell command.
	 * 
	 * @since  1.0.0
	 */
	abstract protected function process($shell);
	/**
	* Processed array getter.
	*
	* @since  1.0.0
	* @return  $this->data  array   Processed shell command results.
	*/
	public function get()
	{
		return $this->data;
	}

	public function count()
	{
		return count($this->data);
	}
}