<?php namespace estvoyage\ticTacToe\nboolean\recipient;

use estvoyage\ticTacToe\{ nboolean, block };

class ifTrue extends ifTrueElse
	implements
		nboolean\recipient
{
	function __construct(block $block, array $arguments = [])
	{
		parent::__construct($block, new block\blackhole, $arguments);
	}
}
