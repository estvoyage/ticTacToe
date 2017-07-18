<?php namespace estvoyage\ticTacToe\matrix\coordinate\place\comparison\unary;

use estvoyage\ticTacToe\{ matrix\coordinate\place, condition, ninteger };

class lessThanOrEqualTo
{
	private
		$place
	;

	function __construct(place $place)
	{
		$this->place = $place;
	}

	function conditionOfComparisonWithPlaceOfMatrixCoordinateIs(place $place, condition $condition) :void
	{
		$this->place
			->recipientOfNIntegerGreaterThanZeroIs(
				new ninteger\recipient\functor(
					function($value) use ($place, $condition)
					{
						$place
							->recipientOfNIntegerGreaterThanZeroIs(
								new ninteger\recipient\functor(
									function($place) use ($value, $condition)
									{
										(new ninteger\comparison\unary\lessThanOrEqualTo($value))
											->conditionOfComparisonWithNIntegerIs(
												$place,
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
