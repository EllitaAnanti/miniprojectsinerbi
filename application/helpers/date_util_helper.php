<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

function now_with_hours()
{
//	return date('Y-m-d H:i:s', strtotime('+6 hours'));
	return date('Y-m-d H:i:s');
}

function now_without_hours()
{
//	return date('Y-m-d', strtotime('+6 hours'));
	return date('Y-m-d');
}

