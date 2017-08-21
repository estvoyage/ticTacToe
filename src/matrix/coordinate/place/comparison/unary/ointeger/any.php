<?php namespace estvoyage\ticTacToe\matrix\coordinate\place\comparison\unary\ointeger;

use estvoyage\{ ticTacToe, ticTacToe\matrix\coordinate, ticTacToe\condition, ticTacToe\ninteger };

class any
{
	private
		$ointeger,
		$comparison
	;

	function __construct(ticTacToe\ointeger $ointeger, ninteger\comparison\binary $comparison)
	{
		$this->ointeger = $ointeger;
		$this->comparison = $comparison;
	}

	function conditionForComparisonWithPlaceInMatrixIs(coordinate\place $place, condition $condition) :void
	{
		$place
			->recipientOfNIntegerGreaterThanZeroIs(
				new ninteger\recipient\functor(
					function($valueOfPlace) use ($condition)
					{
						$this->ointeger
							->recipientOfValueOfOIntegerIs(
								new ninteger\recipient\functor(
									function($valueOfOInteger) use ($valueOfPlace, $condition)
									{
										$this->comparison
											->conditionOfComparisonBetweenNIntegerAndNIntegerIs(
												$valueOfOInteger,
												$valueOfPlace,
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
