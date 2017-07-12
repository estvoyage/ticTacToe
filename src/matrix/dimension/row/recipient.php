<?php namespace estvoyage\ticTacToe\matrix\dimension\row;

use estvoyage\ticTacToe\matrix;

interface recipient
{
	function numberOfRowsInMatrixIs(matrix\dimension\side $row) :void;
}
