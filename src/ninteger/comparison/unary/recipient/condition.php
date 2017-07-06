<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\{ ticTacToe, ticTacToe\ninteger\comparison };

class condition
	implements
		comparison\unary\recipient
{
	private
		$condition
	;

	function __construct(ticTacToe\condition $condition)
	{
		$this->condition = $condition;
	}

	function comparisonWithNIntegerIs(int $ninteger, bool $boolean) :void
	{
		$this->condition
			->recipientOfConditionWithArgumentsIs(
				[ $ninteger ],
				new ticTacToe\condition\recipient\functor(
					function($conditionWithArguments) use ($boolean)
					{
						$conditionWithArguments->nbooleanIs($boolean);
					}
				)
			)
		;
	}
}
