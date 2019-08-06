<?php

set_time_limit(0); // 

/**
 * api.php
 *
 * default application controller
 * @author Snapz
 */

class Api_Controller extends TinyMVC_Controller
{
    // Return a json (string) of date of a manga from nautiljon from the url in POST request.
    function getJsonFromNautiljonByUrl()
    {
        /* Token checker */
        $this->load->library('uri');
        $TOKEN = $this->uri->segment(4);
        if($TOKEN != TOKEN_API) die("Not allowed.");
        $this->load->script('api');

        // Vérification si contient bien l'url via POST
        $url_manga = (isset($_POST['url']) AND !empty($_POST['url'])) ? $_POST['url'] : "NO_URL";
        if($url_manga == "NO_URL") die("No url in POST.");

        if(USE_EXTERNAL_API)
            $json_manga = useExternalApiForGetJson($url_manga);
        else
            $json_manga = getJsonFromNautiljon($url_manga);

        die($json_manga);
    }

    // Auto update table manga with data from nautiljon
    function autoUpdateSql()
    {
        /* Token checker */
        $this->load->library('uri');
        $TOKEN = $this->uri->segment(4);
        if($TOKEN != TOKEN_API) die("Not allowed.");
        $this->load->script('api');




        
        $this->load->model('Manga_Model', 'manga');
        $allMangaData = $this->manga->get_all_manga_databaseformat(200);

        $i = 0;
        $timestamp_debut = microtime(true);
        foreach($allMangaData as $oneMangaDataFromDb)
        {
            
            //if($oneMangaDataFromDb["id"] != 56) continue;
            $i++;

            if(USE_EXTERNAL_API)
                $json_manga = useExternalApiForGetJson($oneMangaDataFromDb["link"]);
            else
                $json_manga = getJsonFromNautiljon($oneMangaDataFromDb["link"]);

            $json_manga_decode = json_decode($json_manga, true);

            /*
            echo '<h1>'.$i.'</h1><br />';
            var_dump($oneMangaDataFromDb);
            var_dump($json_manga_decode);
            echo '<hr />';
            */
            

            // Edit manga
            if($json_manga_decode != null)
            {
                // update date + status + tome publié
                $oneMangaDataFromDb["date"] = $json_manga_decode["date"];
                $oneMangaDataFromDb["published_tomes"] = $json_manga_decode["published_tomes"];
                $oneMangaDataFromDb["status"] = $json_manga_decode["status"];

                $this->manga->edit_manga($oneMangaDataFromDb["id"], $oneMangaDataFromDb["title"], $oneMangaDataFromDb["date"], $oneMangaDataFromDb["status"], $oneMangaDataFromDb["published_tomes"], $oneMangaDataFromDb["owned_tomes"], $oneMangaDataFromDb["buying_tomes"], $oneMangaDataFromDb["price"], $oneMangaDataFromDb["editor"], $oneMangaDataFromDb["type"], $oneMangaDataFromDb["link"]);
            }
            //if($i >= 1) break;
            //break;
        }

        $timestamp_fin = microtime(true);
        $difference_ms = $timestamp_fin - $timestamp_debut;

        echo 'Number of manga checked : '.$i;
        echo '<hr />';
        echo 'Executed time : ' . $difference_ms . ' seconds.<br />';
        
        updateFileWithTimestampOfApi();
        die("done!");
    }
}

?>
