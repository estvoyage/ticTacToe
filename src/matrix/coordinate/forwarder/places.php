<?php namespace estvoyage\ticTacToe\matrix\coordinate\forwarder;

use estvoyage\ticTacToe\{ matrix\coordinate, block };

class places
	implements
		coordinate\forwarder
{
	private
		$row,
		$column
	;

	function __construct(coordinate\place $row = null, coordinate\place $column = null)
	{
		$this->row = $row ?: new coordinate\place\blackhole;
		$this->column = $column ?: new coordinate\place\blackhole;
	}

	function matrixCoordinateIs(coordinate $coordinate) :coordinate\forwarder
	{
		$self = clone $this;

		$coordinate
			->recipientOfPlaceInMatrixRowsIs(
				new coordinate\place\recipient\functor(
					function($row) use ($self)
					{
						$self->row = $row;
					}
				)
			)
		;

		$coordinate
			->recipientOfPlaceInMatrixColumnsIs(
				new coordinate\place\recipient\functor(
					function($column) use ($self)
					{
						$self->column = $column;
					}
				)
			)
		;

		return $self;
	}

	function blockIs(block $block) :coordinate\forwarder
	{
		$block->blockArgumentsAre($this->row, $this->column);

		return $this;
	}
}
