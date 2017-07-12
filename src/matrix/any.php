<?php namespace estvoyage\ticTacToe\matrix;

use estvoyage\ticTacToe\{ matrix, ninteger, block, buffer };

class any
	implements
		matrix
{
	private
		$dimension,
		$values
	;

	function __construct(matrix\dimension $dimension, ... $values)
	{
		$this->dimension = $dimension;

		$this->dimension
			->recipientOfMatrixSizeIs(
				new matrix\size\any,
				new matrix\size\recipient\converter\ninteger(
					new ninteger\recipient\functor(
						function($size) use ($values)
						{
							$this->values = array_slice($values, 0, $size);
						}
					)
				)
			)
		;
	}

	function recipientOfDimensionOfMatrixIs(matrix\dimension\recipient $recipient) :void
	{
		$recipient->matrixHasDimension($this->dimension);
	}

	function recipientOfMatrixWithValueAtCoordinateIs($value, matrix\coordinate $coordinate, matrix\recipient $recipient) :void
	{
		$this->recipientOfKeyForCoordinateIs(
			$coordinate,
			new ninteger\recipient\functor(
				function($key) use ($value, $recipient)
				{
					$matrix = clone $this;
					$matrix->values[$key] = $value;

					$recipient->matrixIs($matrix);
				}
			)
		);
	}

	function recipientOfMatrixValueAtCoordinateIs(matrix\coordinate $coordinate, matrix\value\recipient $recipient) :void
	{
		$this->recipientOfKeyForCoordinateIs(
			$coordinate,
			new ninteger\recipient\functor(
				function($key) use ($recipient)
				{
					if (isset($this->values[$key]))
					{
						$recipient->matrixValueIs($this->values[$key]);
					}
				}
			)
		);
	}

	private function recipientOfKeyForCoordinateIs(matrix\coordinate $coordinate, ninteger\recipient $recipient) :void
	{
		(
			new matrix\dimension\converter\buffer\key(
				new buffer\key\recipient\functor(
					function($key) use ($recipient) {
						$key
							->recipientOfValueOfOIntegerIs(
								$recipient
							)
						;
					}
				),
				$coordinate
			)
		)
			->matrixDimensionIs($this->dimension)
		;
	}
}
