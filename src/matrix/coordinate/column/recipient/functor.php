<?php namespace estvoyage\ticTacToe\matrix\coordinate\column\recipient;

use estvoyage\ticTacToe\{ matrix, block };

class functor extends block\functor
	implements
		matrix\coordinate\column\recipient
{
	function columnInMatrixIs(matrix\coordinate\distance $column) :void
	{
		parent::blockArgumentsAre($column);
	}
}
