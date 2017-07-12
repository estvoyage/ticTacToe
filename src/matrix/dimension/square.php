<?php namespace estvoyage\ticTacToe\matrix\dimension;

use estvoyage\ticTacToe\{ matrix, ointeger, block };

class square
	implements
		matrix\dimension
{
	private
		$side
	;

	function __construct(matrix\dimension\side $side)
	{
		$this->side = $side;
	}

	function recipientOfMatrixSizeIs(matrix\size $size, matrix\size\recipient $recipient) :void
	{
		(new ointeger\operation\unary\multiplication($size, $this->side, new block\blackhole))
			->recipientOfOperationWithOIntegerIs(
				$this->side,
				new ointeger\recipient\functor(
					function($size) use ($recipient) {
						$recipient->matrixSizeIs($size);
					}
				)
			)
		;
	}

	function recipientOfNumberOfRowsInMatrixIs(matrix\dimension\row\recipient $recipient) :void
	{
		$recipient->numberOfRowsInMatrixIs($this->side);
	}

	function recipientOfNumberOfColumnsInMatrixIs(matrix\dimension\column\recipient $recipient) :void
	{
		$recipient->numberOfColumnsInMatrixIs($this->side);
	}
}
