<?php
/**
 * User: Rohinigeeks
 * Date: 14/02/15
 * Time: 4:54 PM
 */

namespace Rohinigeeks\Generator\Templates;


class TemplatesHelper
{
	public function getTemplate($template, $type = "Common")
	{
		$path = base_path('vendor/Rohinigeeks/laravel-api-generator/src/Rohinigeeks/Generator/Templates/' . $type . '/' . $template . '.txt');

		$fileData = file_get_contents($path);

		return $fileData;
	}
}