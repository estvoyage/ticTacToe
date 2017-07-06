<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\{ condition, block };

class ifTrueElse
	implements
		condition
{
	private
		$true,
		$false,
		$arguments
	;

	function __construct(block $true, block $false, array $arguments = [])
	{
		$this->true = $true;
		$this->false = $false;
		$this->arguments = $arguments;
	}

	function nbooleanIs(bool $bool) :void
	{
		($bool ? $this->true : $this->false)->blockArgumentsAre(... $this->arguments);
	}
}
