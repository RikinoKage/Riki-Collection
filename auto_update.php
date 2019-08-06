<?php
set_time_limit(0);

include_once(__DIR__ . '/tinymvc/myapp/configs/config_global.php');

// On init la connexion à la bdd 
try {
    $bdd = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPASS);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

function useExternalApiForGetJson($link_to_manga)
{
	//die(EXTERNAL_API_URL."?token=".EXTERNAL_API_TOKEN."&url=".urlencode($link_to_manga));
	return file_get_contents(EXTERNAL_API_URL."?token=".EXTERNAL_API_TOKEN."&url=".urlencode($link_to_manga));
}

function updateFileWithTimestampOfApi()
{
    $my_file = __DIR__ . '/assets/admin/js/snapz-lastTimestampApiUpdated.js';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    $data = 'var TIMESTAMP_LAST_UPDATE_FROM_API = '.time().';';
    fwrite($handle, $data);
    fclose($handle);
}

/*
$query =$bdd->prepare('UPDATE manga SET date = :new_date, published_tomes = published_tomes + 1 WHERE date <= :date AND date != :ignore_date;');
$query->execute(array(
                        ':new_date' => '9999-00-00',
                        ':date' => date("Y-m-d"),
                        ':ignore_date' => '9999-00-00'
                    )
                );
*/
$query =$bdd->prepare('SELECT * FROM manga WHERE status >= 0 AND status <= 1');
$query->execute(array());
$allMangaData = $query->fetchAll(PDO::FETCH_ASSOC);
$query->closeCursor();

        $i = 0;
        $timestamp_debut = microtime(true);
        foreach($allMangaData as $oneMangaDataFromDb)
        {
            
            //if($oneMangaDataFromDb["id"] != 56) continue;
            $i++;

            $json_manga = useExternalApiForGetJson($oneMangaDataFromDb["link"]);

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

                //$this->manga->edit_manga($oneMangaDataFromDb["id"], $oneMangaDataFromDb["title"], $oneMangaDataFromDb["date"], $oneMangaDataFromDb["status"], $oneMangaDataFromDb["published_tomes"], $oneMangaDataFromDb["owned_tomes"], $oneMangaDataFromDb["buying_tomes"], $oneMangaDataFromDb["price"], $oneMangaDataFromDb["editor"], $oneMangaDataFromDb["type"], $oneMangaDataFromDb["link"]);

				$query = $bdd->prepare('UPDATE manga SET title = ?, date = ?, status = ?, published_tomes = ?, owned_tomes = ?, buying_tomes = ?, price = ?, editor = ?, type = ?, link = ? WHERE id = ?');
				$query->execute(array($oneMangaDataFromDb["title"], $oneMangaDataFromDb["date"], $oneMangaDataFromDb["status"], $oneMangaDataFromDb["published_tomes"], $oneMangaDataFromDb["owned_tomes"], $oneMangaDataFromDb["buying_tomes"], $oneMangaDataFromDb["price"], $oneMangaDataFromDb["editor"], $oneMangaDataFromDb["type"], $oneMangaDataFromDb["link"], $oneMangaDataFromDb["id"]));
				$query->closeCursor();




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
   
?>