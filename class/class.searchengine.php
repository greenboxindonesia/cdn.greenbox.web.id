<?php
Class SearchEngine extends Request
{
	private static $glUrl = 'http://www.google.com/search?q=site:%s';
	private static $biUrl = 'http://www.bing.com/search?q=site:%s';
	private static $yaUrl = 'http://search.yahoo.com/bin/search?p=site:%s';
	private static $yanUrl = 'http://webmaster.yandex.ru/check.xml?hostname=%s';

	public static function google($domain)
	{
		$url = sprintf(self::$glUrl, $domain);
		if(!$response = parent::run($url))
			return 0;
		preg_match('#<div id="resultStats">(.*?)</div>#is', $response, $matches);
		return isset($matches[1]) ? (float)preg_replace("#\D#", "", $matches[1]) : 0;
	}

	public static function bing($domain)
	{
		$url = sprintf(self::$biUrl, $domain);
		if(!$response = parent::run($url))
			return 0;
		preg_match('#<span class="sb_count" id="count">(.*?)</span>#is', $response, $matches);
		return isset($matches[1]) ? (float)preg_replace("#\D#", "", $matches[1]) : 0;
	}

	public static function yahoo($domain)
	{
		$url = sprintf(self::$yaUrl, $domain);
		if(!$response = parent::run($url))
			return 0;
		preg_match('#<span id="resultCount">(.*?)</span>#is', $response, $matches);
		return isset($matches[1]) ? (float)preg_replace("#\D#", "", $matches[1]) : 0;
	}
	
	public static function yandex($domain) {
		if (!preg_match("#^www\.#i", $domain)) {
      $domain = "www.".$domain;
    }
		$url = sprintf(self::$yanUrl, $domain);
		if(!$response = parent::run($url))
			return 0;
		preg_match('#<div class="header g-line">(.+?)</div>#is', $response, $matches);
		return isset($matches[1]) ? (float)preg_replace("#\D#", "", strip_tags($matches[1])) : 0;
	}
}