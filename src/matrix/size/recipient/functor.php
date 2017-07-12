<?php namespace estvoyage\ticTacToe\matrix\size\recipient;

use estvoyage\ticTacToe\{ matrix, block };

class functor extends block\functor
	implements
		matrix\size\recipient
{
	function matrixSizeIs(matrix\size $size) :void
	{
		parent::blockArgumentsAre($size);
	}
}
