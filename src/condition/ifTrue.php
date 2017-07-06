<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\{ condition, block };

class ifTrue extends ifTrueElse
{
	function __construct(block $block, array $arguments = [])
	{
		parent::__construct($block, new block\blackhole, $arguments);
	}
}
