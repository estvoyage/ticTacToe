<?php namespace estvoyage\ticTacToe\matrix\coordinate\comparison\unary;

use estvoyage\ticTacToe\{ matrix, condition, block };

class lessThanOrEqualTo
{
	private
		$coordinate
	;

	function __construct(matrix\coordinate $coordinate)
	{
		$this->coordinate = $coordinate;
	}

	function conditionOfComparisonWithMatrixCoordinateIs(matrix\coordinate $coordinate, condition $condition) :void
	{
		$this->coordinate
			->recipientOfDistanceInMatrixRowIs(
				new matrix\coordinate\distance\recipient\functor(
					function($row) use ($coordinate, $condition)
					{
						$this->coordinate
							->recipientOfDistanceInMatrixColumnIs(
								new matrix\coordinate\distance\recipient\functor(
									function($column) use ($coordinate, $condition, $row)
									{
										$coordinate
											->recipientOfDistanceInMatrixRowIs(
												new matrix\coordinate\distance\recipient\functor(
													function($coordinateRow) use ($coordinate, $condition, $row, $column)
													{
														$coordinate
															->recipientOfDistanceInMatrixColumnIs(
																new matrix\coordinate\distance\recipient\functor(
																	function($coordinateColumn) use ($condition, $row, $column, $coordinateRow)
																	{
																		(new matrix\coordinate\distance\comparison\unary\lessThanOrEqualTo($row))
																			->conditionOfComparisonWithDistanceOfMatrixCoordinateIs(
																				$coordinateRow,
																				new condition\ifTrue(
																					new block\functor(
																						function() use ($condition, $column, $coordinateColumn)
																						{
																							(new matrix\coordinate\distance\comparison\unary\lessThanOrEqualTo($column))
																								->conditionOfComparisonWithDistanceOfMatrixCoordinateIs(
																									$coordinateColumn,
																									$condition
																								)
																							;
																						}
																					)
																				)
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
								)
							)
						;
					}
				)
			)
		;
	}
}
