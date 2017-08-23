<?php namespace estvoyage\ticTacToe\condition;

use estvoyage\ticTacToe\condition;

class not
	implements
		condition
{
	private
		$condition
	;

	function __construct(condition $condition)
	{
		$this->condition = $condition;
	}

	function nbooleanIs(bool $nboolean) :void
	{
		$this->condition->nbooleanIs(! $nboolean);
	}
}
