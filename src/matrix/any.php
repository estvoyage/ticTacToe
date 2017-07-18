<?php namespace estvoyage\ticTacToe\matrix;

use estvoyage\ticTacToe\{ matrix, ninteger, block, condition };

class any
	implements
		matrix
{
	private
		$maxCoordinate,
		$values
	;

	function __construct(matrix\coordinate $maxCoordinate, matrix\value... $values)
	{
		$this->maxCoordinate = $maxCoordinate;

		foreach ($values as $value)
		{
			$value
				->recipientOfMatrixCoordinateIs(
					new matrix\coordinate\recipient\functor(
						function($coordinate) use ($value)
						{
							$this->blockForCoordinateIs(
								$coordinate,
								new block\functor(
									function($row, $column) use ($value)
									{
										$value
											->recipientOfMatrixValueIs(
												new matrix\value\recipient\functor(
													function($value) use ($row, $column)
													{
														self::matrixWithValueAtRowAndColumnIs(
															$value,
															$row,
															$column,
															$this
														);
													}
												)
											)
										;
									}
								)
							);
						}
					)
				)
			;
		}
	}

	function recipientOfValueInMatrixAtCoordinateIs(matrix\coordinate $coordinate, matrix\value\recipient $recipient) :void
	{
		self::blockForCoordinateIs(
			$coordinate,
			new block\functor(
				function($row, $column) use ($recipient)
				{
					if (isset($this->values[$row][$column]))
					{
						$recipient
							->matrixValueIs(
								$this->values[$row][$column]
							)
						;
					}
				}
			)
		);
	}

	function recipientOfMatrixWithValueAtCoordinateIs($value, matrix\coordinate $coordinate, matrix\recipient $recipient) :void
	{
		$this->blockForCoordinateIs(
			$coordinate,
			new block\functor(
				function($row, $column) use ($value, $recipient)
				{
					$recipient
						->matrixIs(
							self::matrixWithValueAtRowAndColumnIs($value, $row, $column, clone $this)
						)
					;
				}
			)
		);
	}

	private function blockForCoordinateIs(matrix\coordinate $coordinate, block $block) :void
	{
		(new matrix\coordinate\comparison\unary\lessThanOrEqualTo($this->maxCoordinate))
			->conditionOfComparisonWithMatrixCoordinateIs(
				$coordinate,
				new condition\ifTrue(
					new block\functor(
						function() use ($coordinate, $block) {
							$coordinate
								->recipientOfDistanceInMatrixRowIs(
									new matrix\coordinate\distance\recipient\functor(
										function($row) use ($coordinate, $block)
										{
											$coordinate
												->recipientOfDistanceInMatrixColumnIs(
													new matrix\coordinate\distance\recipient\functor(
														function($column) use ($row, $block)
														{
															$row
																->recipientOfNIntegerGreaterThanZeroIs(
																	new ninteger\recipient\functor(
																		function($row) use ($column, $block)
																		{
																			$column
																				->recipientOfNIntegerGreaterThanZeroIs(
																					new ninteger\recipient\functor(
																						function($column) use ($row, $block)
																						{
																							$block
																								->blockArgumentsAre(
																									$row,
																									$column
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
			)
		;
	}

	private static function matrixWithValueAtRowAndColumnIs($value, int $row, int $column, self $matrix) :self
	{
		$matrix->values[$row][$column] = $value;

		return $matrix;
	}
}
