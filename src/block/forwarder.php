<?php namespace estvoyage\ticTacToe\block;

use estvoyage\ticTacToe\block;

class forwarder extends proxy
{
	private
		$arguments
	;

	function __construct(block $block, ... $arguments)
	{
		parent::__construct($block);

		$this->arguments = $arguments;
	}

	function blockArgumentsAre(... $arguments) :void
	{
		parent::blockArgumentsAre(... array_merge($this->arguments, $arguments));
	}
}
