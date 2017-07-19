<?php namespace estvoyage\ticTacToe\matrix\coordinate;

use estvoyage\ticTacToe\{ block, matrix\coordinate };

interface forwarder
{
	function matrixCoordinateIs(coordinate $coordinate) :self;
	function blockIs(block $block) :self;
}
