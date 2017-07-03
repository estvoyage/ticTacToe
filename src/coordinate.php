<?php namespace estvoyage\ticTacToe;

interface coordinate
{
	function recipientOfLineAndColumnIs(coordinate\recipient $recipient) :void;
}
