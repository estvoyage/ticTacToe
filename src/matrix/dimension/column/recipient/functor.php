<?php namespace estvoyage\ticTacToe\matrix\dimension\column\recipient;

use estvoyage\ticTacToe\{ block, matrix };

class functor extends block\functor
	implements
		matrix\dimension\column\recipient
{
	function numberOfColumnsInMatrixIs(matrix\dimension\side $column) :void
	{
		parent::blockArgumentsAre($column);
	}
}
