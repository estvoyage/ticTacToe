<?php namespace estvoyage\ticTacToe\matrix\coordinate\distance\comparison\unary;

use estvoyage\ticTacToe\{ matrix\coordinate\distance, condition, ninteger };

class lessThanOrEqualTo
{
	private
		$distance
	;

	function __construct(distance $distance)
	{
		$this->distance = $distance;
	}

	function conditionOfComparisonWithDistanceOfMatrixCoordinateIs(distance $distance, condition $condition) :void
	{
		$this->distance
			->recipientOfNIntegerGreaterThanZeroIs(
				new ninteger\recipient\functor(
					function($value) use ($distance, $condition)
					{
						$distance
							->recipientOfNIntegerGreaterThanZeroIs(
								new ninteger\recipient\functor(
									function($distance) use ($value, $condition)
									{
										(new ninteger\comparison\unary\lessThanOrEqualTo($value))
											->conditionOfComparisonWithNIntegerIs(
												$distance,
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
