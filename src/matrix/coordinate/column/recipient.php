<?php namespace estvoyage\ticTacToe\matrix\coordinate\column;

use estvoyage\ticTacToe\matrix;

interface recipient
{
	function columnInMatrixIs(matrix\coordinate\distance $column) :void;
}
