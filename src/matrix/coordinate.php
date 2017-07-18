<?php namespace estvoyage\ticTacToe\matrix;

use estvoyage\ticTacToe\matrix\coordinate\distance;

interface coordinate
{
	function recipientOfDistanceInMatrixRowIs(distance\recipient $recipient) :void;
	function recipientOfDistanceInMatrixColumnIs(distance\recipient $recipient) :void;
}
