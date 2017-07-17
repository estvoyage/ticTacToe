<?php namespace estvoyage\ticTacToe\matrix;

use estvoyage\ticTacToe\matrix;

interface coordinate
{
	function recipientOfRowInMatrixIs(matrix\coordinate\distance\recipient $recipient) :void;
	function recipientOfColumnInMatrixIs(matrix\coordinate\distance\recipient $recipient) :void;
}
