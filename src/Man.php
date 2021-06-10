<?php 

namespace Phell;

/**
 * Class to manage Bash manual command Man and retrieve multi-format results
 *
 * @param  string  $bashCommand  Bash command to access the manual about
 * @since  1.3.0
 * @author  WP Helpers | Carlos Matos
 */
class Man extends AbstractCommand
{

	protected $command;

	protected $searched;

	public function __construct(string $bashCommand)
	{
		$this->command = 'man ' . $bashCommand;
		$this->searched = $bashCommand;
		$this->execute();		
	}

	protected function process($shell)
	{
		$shell = preg_split("/[\n]+/", $shell);

		$titles = ['NAME', 'SYNOPSIS', 'DESCRIPTION','AUTHOR','REPORTING BUGS', 'COPYRIGHT','SEE ALSO'];

		$content = [];

		foreach ($shell as $line) {
			if(in_array($line, $titles)) {
				$now = $line;
			} else {
				if(!is_null($now)) {
					$content[$now][] = $line;
				}
			}
		}

		$this->data = $content;
	}

	public function toHtml()
	{
		$content = '<div class="phell-box">';
		$keys = array_keys($this->data);

		foreach ($keys as $key) {
			
			$content .= '<pre><h2 class="phell-title">' . $key . '</h2></pre>';

			foreach ($this->data[$key] as $value) {
				$identation = strlen($value)-strlen(ltrim($value));
				if($identation == 0) {
					$content .= '<pre><h4 class="phell-subtitle">' . $value . '</h4></pre>';
				} elseif($identation == 3) {
					$content .= '<pre><strong>' . $value . '</strong></pre>';
				} else {
					$content .= '<pre style="font-family: inherit;">' . $value . '</pre>';
				}
			}
		}

		$content .= '</div>';

		return $content;
	}

	public function toArray()
	{
		$content = $this->data;
		$titles = ['NAME', 'SYNOPSIS', 'DESCRIPTION','AUTHOR','REPORTING BUGS', 'COPYRIGHT','SEE ALSO'];

		for($i = 0; $i < count($titles); $i++) {
			$content[$titles[$i]] = implode(' ', $content[$titles[$i]]);
		}

		return $content;
	}

	public function toXml()
	{

	}
}