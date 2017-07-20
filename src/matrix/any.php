<?php namespace estvoyage\ticTacToe\matrix;

use estvoyage\ticTacToe\{ matrix, ninteger, block, condition, iterator };

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

		(new iterator\fifo)
			->valuesForIteratorPayloadAre(
				new iterator\payload\block(
					new block\functor(
						function($iterator, $value)
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
					)
				),
				$values
			)
		;
	}

	function recipientOfValueInMatrixAtCoordinateIs(matrix\coordinate $coordinate, matrix\value\recipient $recipient) :void
	{
		self::blockForCoordinateIs(
			$coordinate,
			new block\functor(
				function($row, $column) use ($recipient)
				{
					(
						new condition\ifTrue\functor(
							function() use ($row, $column, $recipient)
							{
								$recipient
									->matrixValueIs(
										$this->values[$row][$column]
									)
								;
							}
						)
					)
						->nbooleanIs(isset($this->values[$row][$column]))
					;
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
				new condition\ifTrue\functor(
					function() use ($coordinate, $block) {
						(
							new matrix\coordinate\recipient\nintegers(
								new block\forwarder(
									$block
								)
							)
						)
							->matrixCoordinateIs($coordinate)
						;
					}
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
