<?php namespace estvoyage\ticTacToe\matrix;

use estvoyage\ticTacToe\matrix;

interface coordinate
{
	function recipientOfRowInMatrixIs(matrix\coordinate\row\recipient $recipient) :void;
	function recipientOfColumnInMatrixIs(matrix\coordinate\column\recipient $recipient) :void;
}
