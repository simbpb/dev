<?php
namespace App\Helpers;

class DateFormat
{
	
	public static function sqlToSlash($date)
	{
		$format = explode("-",substr($date,0,10));
		return $format[2].'/'.$format[1].'/'.$format[0];
	}
}