<?php

/**
 * series.php
 *
 * default application controller
 * @author Zaxner
 */

class Series_Controller extends TinyMVC_Controller
{

    function all()
    {
        $this->load->model('Manga_Model', 'manga');
        $this->load->model('Admin_Model', 'admin');

        $data = $this->manga->get_all_manga();
        $this->view->assign('mangas_all', $data);

        $data = $this->manga->get_missing_manga();
        $this->view->assign('mangas_missing', $data);

        $this->view->assign('title', "Collection Mangas & Novel");
        $content = $this->view->fetch('manga_all_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }
	
	function details()
    {
		$this->load->library('uri');
        $this->load->model('Manga_Model', 'manga');

		$id = (int) $this->uri->segment(4);
        if ( !empty($id) ) :
            $data = $this->manga->get_manga($id);
            $this->view->assign('manga', $data);
		elseif (empty($id) ) :
			$data = $this->manga->get_manga(17);
            $this->view->assign('manga', $data);
        endif;

        $details = "Détails - " . $data['title'];
        $this->view->assign('title', $details);
        $content = $this->view->fetch('manga_details_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }
    
    function editor()
    {
		$this->load->library('uri');
        $this->load->model('Manga_Model', 'manga');

		$editor = $this->uri->segment(4);
        if ( !empty($editor) ) :
            $nb_types_editor = $this->manga->get_nb_type_editor($editor);
            $this->view->assign('types_editor', $nb_types_editor);
		elseif (empty($editor) ) :
			$nb_types_editor = $this->manga->get_nb_type_editor($editor);
            $this->view->assign('types_editor', $nb_types_editor);
        endif;

        if ( !empty($editor) ) :
            $data = $this->manga->get_all_editor($editor);
            $this->view->assign('manga', $data);
		elseif (empty($id) ) :
			$data = $this->manga->get_all_editor($editor);
            $this->view->assign('manga', $data);
        endif;

        $this->view->assign('editor', $editor);
        $this->view->assign('title', $editor);
        $content = $this->view->fetch('manga_editor_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }

	function planning()
    {
        $this->load->model('Manga_Model', 'manga');
		
        $data = $this->manga->get_manga_planning();
		$this->view->assign('mangas', $data);
		
        $this->view->assign('title', "Planning");
        $content = $this->view->fetch('manga_planning_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }
	
	function monthly()
    {
		$this->load->library('uri');
        $this->load->model('Manga_Model', 'manga');
		
		$date = (int) $this->uri->segment(4);
        $data = $this->manga->get_manga_monthly($date);
		$this->view->assign('mangas', $data);

        $this->view->assign('title', "Planning mensuel");
        $content = $this->view->fetch('manga_monthly_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }
	
	function library_wish()
    {
		$this->load->model('Admin_Model', 'admin');
		$new_tomes_data = $this->admin->get_new_tomes_to_buy();
        $this->view->assign('new_tomes_data', $new_tomes_data);
		
        $this->load->model('Manga_Model', 'manga');
        $data = $this->manga->get_all_wished_manga(200);
        $this->view->assign('mangas', $data);

        $this->view->assign('title', "Liste d'achat - Vue libraire");
        $content = $this->view->fetch('manga_library_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }
	
	function library_valid()
    {
		$this->load->library('uri');
        $this->load->model('Manga_Model', 'manga');

		$id = (int) $this->uri->segment(4);
        if ( !empty($id) ) :
            $success = $this->manga->library_valid($id);
            $this->view->assign('success', $success);
        endif;
		
        $content = $this->view->fetch('admin_manga_valid_view');
        $this->view->assign('content', $content);
        $this->view->display('layout_view');
    }
	
}

?>