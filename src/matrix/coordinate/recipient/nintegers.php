<?php namespace estvoyage\ticTacToe\matrix\coordinate\recipient;

use estvoyage\{ ticTacToe,  ticTacToe\block, ticTacToe\matrix\coordinate, ticTacToe\condition };

class nintegers extends block\forwarder
	implements
		coordinate\recipient
{
	private
		$row,
		$column
	;

	function matrixCoordinateIs(coordinate $coordinate) :void
	{
		$self = clone $this;

		(
			new places(
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
			->matrixCoordinateIs($coordinate)
		;
	}
}
