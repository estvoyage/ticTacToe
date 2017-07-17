<?php namespace estvoyage\ticTacToe\matrix\coordinate\distance;

use estvoyage\ticTacToe\matrix;

interface recipient
{
	function matrixCoordinateHasDistance(matrix\coordinate\distance $distance) :void;
}
