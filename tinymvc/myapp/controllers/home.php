<?php

/**
 * home.php
 *
 * default application controller
 * @author Zaxner
 */

class Home_Controller extends TinyMVC_Controller
{
	function index()
    {
        $this->load->model('Manga_Model', 'manga');
        
        $data2 = $this->manga->get_last_manga();
        $this->view->assign('manga_lasts', $data2);
        
        $data = $this->manga->get_random_manga();
        $this->view->assign('manga', $data);
        
        $data3 = $this->manga->get_next_manga();
        $this->view->assign('manga_next', $data3);

        $this->view->assign('title', "Riki no Kage - Accueil");
        $content = $this->view->fetch('home_index_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }

    function wishlist()
    {
        $this->load->model('Manga_Model', 'manga');

        $data = $this->manga->get_all_wished_manga(200);
        $this->view->assign('mangas', $data);

        $this->view->assign('title', "Liste d'achat");
        $content = $this->view->fetch('manga_wish_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }
}

?>
