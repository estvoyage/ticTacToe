<?php namespace estvoyage\ticTacToe\matrix\dimension;

use estvoyage\ticTacToe\matrix;

interface recipient
{
	function matrixHasDimension(matrix\dimension $dimension) :void;
}
