<?php namespace estvoyage\ticTacToe\matrix\dimension\converter\buffer;

use estvoyage\ticTacToe\{ buffer, matrix, ointeger, block, condition };

class key
{
	private
		$recipient,
		$coordinate
	;

	function __construct(buffer\key\recipient $recipient, matrix\coordinate $coordinate)
	{
		$this->recipient = $recipient;
		$this->coordinate = $coordinate;
	}

	function matrixDimensionIs(matrix\dimension $dimension)
	{
		$this->coordinate
			->recipientOfRowInMatrixIs(
				new matrix\coordinate\row\recipient\functor(
					function($coordinateRow) use ($dimension)
					{
						$this->coordinate
							->recipientOfColumnInMatrixIs(
								new matrix\coordinate\column\recipient\functor(
									function($coordinateColumn) use ($dimension, $coordinateRow)
									{
										$dimension
											->recipientOfNumberOfRowsInMatrixIs(
												new matrix\dimension\row\recipient\functor(
													function($dimensionRow) use ($dimension, $coordinateRow, $coordinateColumn)
													{
														$dimension
															->recipientOfNumberOfColumnsInMatrixIs(
																new matrix\dimension\column\recipient\functor(
																	function($dimensionColumn) use ($coordinateRow, $coordinateColumn, $dimensionRow)
																	{
																		(new ointeger\comparison\unary\lessThan($dimensionRow))
																			->recipientOfComparisonWithOIntegerIsCondition(
																				$coordinateRow,
																				new condition\ifTrue\functor(
																					function() use ($coordinateRow, $coordinateColumn, $dimensionRow, $dimensionColumn)
																					{
																						(new ointeger\comparison\unary\lessThan($dimensionColumn))
																							->recipientOfComparisonWithOIntegerIsCondition(
																								$coordinateColumn,
																								new condition\ifTrue\functor(
																									function() use ($coordinateRow, $coordinateColumn, $dimensionRow, $dimensionColumn)
																									{
																										(
																											new ointeger\operation\unary\collection(
																												new ointeger\operation\unary\multiplication(new buffer\key, $dimensionColumn, new block\blackhole),
																												new ointeger\operation\unary\addition(new buffer\key, $coordinateColumn, new block\blackhole)
																											)
																										)
																											->recipientOfOperationWithOIntegerIs(
																												$coordinateRow,
																												new ointeger\recipient\functor(
																													function($bufferKey)
																													{
																														$this->recipient->bufferKeyIs($bufferKey);
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
