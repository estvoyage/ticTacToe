<?php namespace estvoyage\ticTacToe\coordinate\recipient;

use estvoyage\ticTacToe\{ coordinate, block };

class places extends block\forwarder
	implements
		coordinate\recipient
{
	private
		$row,
		$column
	;

	function __construct(block $block, coordinate\place $row = null, coordinate\place $column = null)
	{
		parent::__construct($block);

		$this->row = $row ?: new coordinate\place\blackhole;
		$this->column = $column ?: new coordinate\place\blackhole;
	}

	function coordinateInTicTacToeBoardIs(coordinate $coordinate) :void
	{
		$self = clone $this;

		$coordinate
			->recipientOfPlaceInTicTacToeBoardRowsIs(
				new coordinate\place\recipient\functor(
					function($row) use ($self)
					{
						$self->row = $row;
					}
				)
			)
		;

		$coordinate
			->recipientOfPlaceInTicTacToeBoardColumnsIs(
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
