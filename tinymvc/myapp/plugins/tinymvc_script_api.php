<?php
// file_get_content with ssl for get https url :>
function get_file_content_ssl($fullUrl)
{

    $url = $fullUrl;
    $cn_match = 'www.nautiljon.com';

    $data = array ();

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => 	"Content-type: application/x-www-form-urlencoded\r\n" .
            				"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0\r\n" .
            				"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n" .
            				"Accept-Language: fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3\r\n" .
            				"Accept-Encoding: gzip, deflate, br\r\n" .
            				"Cookie: PHPSESSID=p51u7r42p7ofm0ttou93u8nice; sid=1\r\n",
            'method'  => 'GET'          
            )
        , 'ssl' => array(
            'verify_peer' => true,
            'cafile' => __DIR__ . "/cacert.pem",
            'ciphers' => 'HIGH:TLSv1.2:TLSv1.1:TLSv1.0:!SSLv3:!SSLv2',
            'CN_match' => $cn_match,
            'disable_compression' => true,
            )
        );

    $context  = stream_context_create($options);
    $response = @file_get_contents($url, false, $context);
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
	$content_site = get_file_content_ssl($link_to_manga);

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

	sleep(1);
	return json_encode($arrayOfManga, JSON_UNESCAPED_UNICODE );
}

function updateFileWithTimestampOfApi()
{
    $my_file = __DIR__ . '\..\..\..\assets\admin\js\snapz-lastTimestampApiUpdated.js';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    $data = 'var TIMESTAMP_LAST_UPDATE_FROM_API = '.time().';';
    fwrite($handle, $data);
    fclose($handle);
}

function useExternalApiForGetJson($link_to_manga)
{
	return file_get_contents(EXTERNAL_API_URL."?token=".EXTERNAL_API_TOKEN."&url=".urlencode($link_to_manga));
}

?>