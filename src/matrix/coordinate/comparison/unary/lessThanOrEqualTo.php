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
			->recipientOfPlaceInMatrixRowsIs(
				new matrix\coordinate\place\recipient\functor(
					function($row) use ($coordinate, $condition)
					{
						$this->coordinate
							->recipientOfPlaceInMatrixColumnsIs(
								new matrix\coordinate\place\recipient\functor(
									function($column) use ($coordinate, $condition, $row)
									{
										$coordinate
											->recipientOfPlaceInMatrixRowsIs(
												new matrix\coordinate\place\recipient\functor(
													function($coordinateRow) use ($coordinate, $condition, $row, $column)
													{
														$coordinate
															->recipientOfPlaceInMatrixColumnsIs(
																new matrix\coordinate\place\recipient\functor(
																	function($coordinateColumn) use ($condition, $row, $column, $coordinateRow)
																	{
																		(new matrix\coordinate\place\comparison\unary\lessThanOrEqualTo($row))
																			->conditionOfComparisonWithplaceOfMatrixCoordinateIs(
																				$coordinateRow,
																				new condition\ifTrue(
																					new block\functor(
																						function() use ($condition, $column, $coordinateColumn)
																						{
																							(new matrix\coordinate\place\comparison\unary\lessThanOrEqualTo($column))
																								->conditionOfComparisonWithplaceOfMatrixCoordinateIs(
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
