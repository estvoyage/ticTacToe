<?php namespace estvoyage\ticTacToe\matrix\dimension\column;

use estvoyage\ticTacToe\matrix;

interface recipient
{
	function numberOfColumnsInMatrixIs(matrix\dimension\side $column) :void;
}
