<?php namespace estvoyage\ticTacToe\matrix\coordinate;

use estvoyage\ticTacToe\matrix;

interface recipient
{
	function matrixCoordinateIs(matrix\coordinate $coordinate) :void;
}
