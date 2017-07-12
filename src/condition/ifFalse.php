<?php namespace estvoyage\ticTacToe\condition;

class ifFalse extends ifTrue
{
	function nbooleanIs(bool $boolean) :void
	{
		parent::nbooleanIs(! $boolean);
	}
}
