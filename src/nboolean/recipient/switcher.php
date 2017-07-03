<?php namespace estvoyage\ticTacToe\nboolean\recipient;

use estvoyage\ticTacToe\nboolean;

class switcher
	implements
		nboolean\recipient
{
	private
		$true,
		$false
	;

	function __construct(callable $true, callable $false)
	{
		$this->true = $true;
		$this->false = $false;
	}

	function nbooleanIs(bool $bool) :void
	{
		call_user_func($bool ? $this->true : $this->false);
	}
}
