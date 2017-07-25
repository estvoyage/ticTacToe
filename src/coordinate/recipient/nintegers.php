<?php namespace estvoyage\ticTacToe\coordinate\recipient;

use estvoyage\ticTacToe\{ coordinate, block, condition, ninteger };

class nintegers extends block\forwarder
	implements
		coordinate\recipient
{
	private
		$row,
		$column
	;

	function coordinateInTicTacToeBoardIs(coordinate $coordinate) :void
	{
		(
			new coordinate\recipient\places(
				new block\functor(
					function($row, $column)
					{
						$self = clone $this;

						$row
							->recipientOfNIntegerGreaterThanZeroIs(
								new ninteger\recipient\functor(
									function($row) use ($self)
									{
										$self->row = $row;
									}
								)
							)
						;

						$column
							->recipientOfNIntegerGreaterThanZeroIs(
								new ninteger\recipient\functor(
									function($column) use ($self)
									{
										$self->column = $column;
									}
								)
							)
						;

						(
							new condition\ifTrue\functor(
								function() use ($self)
								{
									$self->blockArgumentsAre($self->row, $self->column);
								}
							)
						)
							->nbooleanIs($self->row && $self->column)
						;
					}
				)
			)
		)
			->coordinateInTicTacToeBoardIs($coordinate)
		;
	}
}
