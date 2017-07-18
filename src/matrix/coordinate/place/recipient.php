<?php namespace estvoyage\ticTacToe\matrix\coordinate\place;

use estvoyage\ticTacToe\matrix;

interface recipient
{
	function placeInMatrixIs(matrix\coordinate\place $place) :void;
}
