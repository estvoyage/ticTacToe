<?php namespace estvoyage\ticTacToe\matrix\coordinate\row;

use estvoyage\ticTacToe\matrix;

interface recipient
{
	function rowInMatrixIs(matrix\coordinate\distance $row) :void;
}
