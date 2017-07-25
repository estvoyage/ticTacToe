<?php namespace estvoyage\ticTacToe\matrix\coordinate\recipient;

use estvoyage\ticTacToe\{ matrix\coordinate, block };

class places extends block\forwarder
	implements
		coordinate\recipient
{
	private
		$column,
		$row
	;

	function __construct(block $block, coordinate\place $row = null, coordinate\place $column = null)
	{
		parent::__construct($block);

		$this->row = $row ?: new coordinate\place\blackhole;
		$this->column = $column ?: new coordinate\place\blackhole;
	}

	function matrixCoordinateIs(coordinate $coordinate) :void
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

		$self->blockArgumentsAre($self->row, $self->column);
	}
}
