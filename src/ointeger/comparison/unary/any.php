<?php namespace estvoyage\ticTacToe\ointeger\comparison\unary;

use estvoyage\ticTacToe\{ ointeger, condition, ninteger };

class any
	implements
		ointeger\comparison\unary
{
	private
		$ointeger,
		$comparison
	;

	function __construct(ointeger $ointeger, ninteger\comparison\binary $comparison)
	{
		$this->ointeger = $ointeger;
		$this->comparison = $comparison;
	}

	function conditionOfComparisonWithOIntegerIs(ointeger $ointeger, condition $condition) :void
	{
		$ointeger
			->recipientOfValueOfOIntegerIs(
				new ninteger\recipient\functor(
					function($value) use ($condition)
					{
						$this->ointeger
							->recipientOfValueOfOIntegerIs(
								new ninteger\recipient\functor(
									function($reference) use ($value, $condition) {
										$this->comparison
											->conditionOfComparisonBetweenNIntegerAndNIntegerIs(
												$value,
												$reference,
												$condition
											)
										;
									}
								)
							)
						;
					}
				)
			)
		;
	}
}
