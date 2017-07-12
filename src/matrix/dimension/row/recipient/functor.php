<?php namespace estvoyage\ticTacToe\matrix\dimension\row\recipient;

use estvoyage\ticTacToe\{ block, matrix };

class functor extends block\functor
	implements
		matrix\dimension\row\recipient
{
	function numberOfRowsInMatrixIs(matrix\dimension\side $row) :void
	{
		parent::blockArgumentsAre($row);
	}
}
