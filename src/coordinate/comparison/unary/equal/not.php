<?php namespace estvoyage\ticTacToe\coordinate\comparison\unary\equal;

use estvoyage\ticTacToe\{ coordinate, condition, block };

class not
{
	private
		$reference
	;

	function __construct(coordinate $reference)
	{
		$this->reference = $reference;
	}

	function conditionForComparisonWithTicTacToeCoordinateIs(coordinate $coordinate, condition $condition) :void
	{
		(
			new coordinate\recipient\nintegers(
				new block\functor(
					function($referenceRow, $referenceColumn) use ($coordinate, $condition)
					{
						(
							new coordinate\recipient\nintegers(
								new block\functor(
									function($coordinateRow, $coordinateColumn) use ($referenceRow, $referenceColumn, $condition)
									{
										$condition->nbooleanIs($referenceRow != $coordinateRow || $referenceColumn !=  $coordinateColumn);
									}
								)
							)
						)
							->coordinateInTicTacToeBoardIs($coordinate)
						;
					}
				)
			)
		)
			->coordinateInTicTacToeBoardIs($this->reference)
		;
	}
}
