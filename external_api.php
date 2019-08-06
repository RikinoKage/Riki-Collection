<?php
//set_time_limit(0);
sleep(1);
// Config
define('TOKEN_API', 'jxMSFDZXn2');
// Verif token
$token_allowed = (isset($_GET['token']) AND $_GET['token'] == TOKEN_API) ? true : false;
if(!$token_allowed) die("Not allowed.");
// Verif url
//$url_manga = (isset($_GET['url']) AND !empty($_GET['url'])) ? urldecode($_GET['url']) : "NO_URL";
$url_manga = (isset($_GET['url']) AND !empty($_GET['url'])) ? encode_url_special($_GET['url']) : "NO_URL";
if($url_manga == "NO_URL") die("No url in GET.");

function encode_url_special($url) {
$reserved = array(
":" => '!%3A!ui',
"/" => '!%2F!ui',
"?" => '!%3F!ui',
"#" => '!%23!ui',
"[" => '!%5B!ui',
"]" => '!%5D!ui',
"@" => '!%40!ui',
"!" => '!%21!ui',
"$" => '!%24!ui',
"&" => '!%26!ui',
"'" => '!%27!ui',
"(" => '!%28!ui',
")" => '!%29!ui',
"*" => '!%2A!ui',
"+" => '!%2B!ui',
"," => '!%2C!ui',
";" => '!%3B!ui',
"=" => '!%3D!ui',
"%" => '!%25!ui',
);

$url = rawurlencode($url);
$url = preg_replace(array_values($reserved), array_keys($reserved), $url);
return $url;
}

function curl_with_ssl($fullUrl)
{
	$response = "";
	$gaUrl = $fullUrl;

	// create a new cURL resource
	$ch = curl_init();
 
	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, $gaUrl);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "");
	curl_setopt ($ch, CURLOPT_CAINFO, dirname(__FILE__)."/cacert.pem");
	$fileHandle = fopen(dirname(__FILE__) . "/error.txt","w+");
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	curl_setopt($ch, CURLOPT_STDERR, $fileHandle);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch,CURLOPT_USERAGENT,'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0');
	// grab URL and pass it to the browser
	$response = curl_exec($ch);
	if(curl_exec($ch) === false)
	{
		echo 'Curl error: ' . curl_error($ch);
	}
 
	// close cURL resource, and free up system resources
	curl_close($ch);
	return $response;
}

// Return a json with data of a manga from nautiljon from his url
function getJsonFromNautiljon($link_to_manga)
{
	$arrayOfManga = array(
		"title" => "",
		"date" => "9999-00-00",
		"status" => -1,
		"published_tomes" => 0,
		"price" => "",
		"editor" => "",
		"type" => ""
	);

	//$link_to_manga = 'https://www.nautiljon.com/mangas/twin+star+exorcists.html';
	$content_site = curl_with_ssl($link_to_manga);

	// Title
	if(preg_match('#<title>([^>]*)</title>#', $content_site, $matches))
	{
		$arrayOfManga["title"] = trim($matches[1]);
	}
	// Sinon renvois le message d'erreur comme le ban
	else
	{
		return $content_site;
	}

	// Status & Published_tomes
	if(preg_match('#<li><span class="bold">Nb volumes VF : </span> ([0-9]+) \(([^)]*)\)</li>#', $content_site, $matches))
	{
		$arrayOfManga["published_tomes"] = trim($matches[1]);
		$arrayOfManga["status"] = trim($matches[2]);

		if($arrayOfManga["status"] == "En cours") $arrayOfManga["status"] = 0;
		elseif($arrayOfManga["status"] == "À paraître") $arrayOfManga["status"] = 1;
		elseif($arrayOfManga["status"] == "Terminé") $arrayOfManga["status"] = 2;
		elseif($arrayOfManga["status"] == "Abandonné") $arrayOfManga["status"] = 3;
		else $arrayOfManga["status"] = -1;
		

	}

	// Price
	if(preg_match('#<li><span class="bold">Prix public : </span> ([0-9]+\.[0-9]+) €</li>#', $content_site, $matches))
	{
		$arrayOfManga["price"] = trim($matches[1]);
	}

	// Editor
	if(preg_match_all('#<span itemprop="legalName">([^<]*)</span>#', $content_site, $matches))
	{
		$arrayOfManga["editor"] = $matches[1][count($matches[1]) - 1];
	}

	// Type
	if(preg_match('#<li><span class="bold">Type : </span> <a href="[^"]*">([^>]*)</a></li>#', $content_site, $matches))
	{
		$arrayOfManga["type"] = trim(ucfirst($matches[1]));

		if($arrayOfManga["type"] == "Shojo") $arrayOfManga["type"] = "Shôjo";
		elseif($arrayOfManga["type"] == "Shonen") $arrayOfManga["type"] = "Shônen";

	}

	// Opacity faible
	/**
	if(preg_match('#<a title="[^"]*" class="tooltip" href="([^"]*)"><img src="[^"]*" alt="[^"]*" class="opa" /></a>#', $content_site, $matches))
	{
		$urlToTheFirstLowOpacity = 'https://www.nautiljon.com'.$matches[1];
		$content_site_low_opacity = get_file_content_ssl($urlToTheFirstLowOpacity);
		// date
		if(preg_match('#<li><span class="bold">Date de parution VF : </span> ([^>]*)</li>#', $content_site_low_opacity, $matches))
		{
			$arrayOfManga["date"] = trim($matches[1]);
		}
	}
	*/

	if(preg_match('#<strong>A paraître</strong><br /><a href="[^"]*" class="tooltip" title="[^"]*"><img src="[^"]*" alt="[^"]*" /></a><br /><span class="infos_small">(\d{2}/\d{2}/\d{4})</span>#', $content_site, $matches))
	{
		$arrayOfManga["date"] = trim($matches[1]);
		$arrayOfManga["date"] = str_replace("/", "-", $arrayOfManga["date"]);
		$arrayOfManga["date"] = date('Y-m-d', strtotime($arrayOfManga["date"]));
	}

	return json_encode($arrayOfManga, JSON_UNESCAPED_UNICODE );
}

die(getJsonFromNautiljon($url_manga));
?>