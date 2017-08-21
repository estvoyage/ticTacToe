<?php namespace estvoyage\ticTacToe\matrix\coordinate\place\comparison\unary\ointeger;

use estvoyage\{ ticTacToe, ticTacToe\matrix\coordinate\place, ticTacToe\condition, ticTacToe\ninteger };

class greaterThanOrEqualTo
{
	private
		$ointeger
	;

	function __construct(ticTacToe\ointeger $ointeger)
	{
		$this->ointeger = $ointeger;
	}

	function conditionForComparisonWithPlaceInMatrixIs(place $place, condition $condition) :void
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
										$condition
											->nbooleanIs(
												$valueOfPlace <= $valueOfOInteger
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
