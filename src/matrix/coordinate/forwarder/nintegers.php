<?php namespace estvoyage\ticTacToe\matrix\coordinate\forwarder;

use estvoyage\{ ticTacToe,  ticTacToe\block, ticTacToe\matrix\coordinate, ticTacToe\condition };

class nintegers
	implements
		coordinate\forwarder
{
	private
		$row,
		$column
	;

	function __construct(int $row = null, int $column = null)
	{
		$this->row = $row;
		$this->column = $column;
	}

	function matrixCoordinateIs(coordinate $coordinate) :coordinate\forwarder
	{
		$self = clone $this;

		(new coordinate\forwarder\places)
			->matrixCoordinateIs($coordinate)
			->blockIs(
				new block\functor(
					function($row, $column) use ($self)
					{
						$row
							->recipientOfNIntegerGreaterThanZeroIs(
								new ticTacToe\ninteger\recipient\functor(
									function($row) use ($self)
									{
										$self->row = $row;
									}
								)
							)
						;

						$column
							->recipientOfNIntegerGreaterThanZeroIs(
								new ticTacToe\ninteger\recipient\functor(
									function($column) use ($self)
									{
										$self->column = $column;
									}
								)
							)
						;
					}
				)
			)
		;

		return $self;
	}

	function blockIs(block $block) :coordinate\forwarder
	{
		(
			new condition\ifTrue\functor(
				function() use ($block)
				{
					$block->blockArgumentsAre($this->row, $this->column);
				}
			)
		)
			->nbooleanIs($this->row && $this->column)
		;

		return $this;
	}
}
