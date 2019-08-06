<?php

/**
 * admin.php
 *
 * admin application controller
 * @author Zaxner
 */

class Anime_Controller extends TinyMVC_Controller
{
	 function all()
    {
        $this->load->model('DVD_Model', 'dvd');

        $data = $this->dvd->get_all_dvd();
        $this->view->assign('dvd_all', $data);
        
        $content = $this->view->fetch('dvd_all_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }
}
?>