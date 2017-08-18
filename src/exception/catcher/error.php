<?php namespace estvoyage\ticTacToe\exception\catcher;

use estvoyage\ticTacToe\block;

class error
{
	private
		$error
	;

	function __construct(\error $error)
	{
		$this->error = $error;
	}

	function blockIs(block $block) :void
	{
		try
		{
			$block->blockArgumentsAre();
		}
		catch (\error $error)
		{
			throw $this->error;
		}
	}
}
