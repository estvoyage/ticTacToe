<?php namespace estvoyage\ticTacToe\ninteger\comparison\unary\recipient;

use estvoyage\ticTacToe\{ nboolean, ninteger\comparison };

class condition
	implements
		comparison\unary\recipient
{
	private
		$condition
	;

	function __construct(nboolean\recipient $condition)
	{
		$this->condition = $condition;
	}

	function comparisonWithNIntegerIs(int $ninteger, bool $boolean) :void
	{
		$this->condition
			->recipientOfNBooleanRecipientWithArgumentsIs(
				[ $ninteger ],
				new nboolean\recipient\recipient\functor(
					function($conditionWithArguments) use ($boolean)
					{
						$conditionWithArguments->nbooleanIs($boolean);
					}
				)
			)
		;
	}
}
