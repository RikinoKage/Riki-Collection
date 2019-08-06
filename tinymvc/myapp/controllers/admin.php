<?php

/**
 * admin.php
 *
 * admin application controller
 * @author Zaxner
 */

class Admin_Controller extends TinyMVC_Controller
{
    function index()
    {
        if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;

        $this->load->model('Admin_Model', 'admin');

        $new_tomes_data = $this->admin->get_new_tomes_to_buy();
        $this->view->assign('new_tomes_data', $new_tomes_data);
        $miss_tomes_data = $this->admin->get_nb_missing_tomes();
        $this->view->assign('miss_tomes_data', $miss_tomes_data);
        $total_tomes_data = $this->admin->get_total_tomes();
        $this->view->assign('total_tomes_data', $total_tomes_data);
        $waiting_tomes_data = $this->admin->get_nb_waiting_tomes();
        $this->view->assign('waiting_tomes_data', $waiting_tomes_data);
		$continuing_series_data = $this->admin->get_nb_continuing_series();
        $this->view->assign('continuing_series_data', $continuing_series_data);
		$waiting_series_data = $this->admin->get_nb_waiting_series();
        $this->view->assign('waiting_series_data', $waiting_series_data);
		$stopped_series_data = $this->admin->get_nb_stopped_series();
        $this->view->assign('stopped_series_data', $stopped_series_data);
		$finished_series_data = $this->admin->get_nb_finished_series();
        $this->view->assign('finished_series_data', $finished_series_data);

        $nb_edits = $this->admin->get_nb_editor();
        $this->view->assign('editors', $nb_edits);

        $nb_types = $this->admin->get_nb_type();
        $this->view->assign('type', $nb_types);
		
		$this->load->model('Manga_Model', 'manga');
		$data = $this->manga->get_manual_verif();
        $this->view->assign('mangas', $data);

        $content = $this->view->fetch('admin_index_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }

    function series()
    {
        if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;

        $this->load->model('Manga_Model', 'manga');

        $data = $this->manga->get_all_manga_grid();
        $this->view->assign('mangas', $data);

        $content = $this->view->fetch('admin_manga_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }

    function series_add()
    {
        if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;

        if ( isset($_POST['add_manga']) ) :
            if ( 
                isset($_POST['title']) && !empty($_POST['title']) &&
                isset($_POST['date-year']) && isset($_POST['status']) &&
                isset($_POST['date-month']) && isset($_POST['date-day']) && 
                isset($_POST['publish'])  && isset($_POST['owned'])  &&
                isset($_POST['buy']) &&  isset($_POST['price']) &&
                isset($_POST['editor']) && !empty($_POST['editor']) &&
                isset($_POST['type']) && !empty($_POST['type']) &&
                isset($_POST['link']) && !empty($_POST['link']) &&
				isset($_POST['themes']) && !empty($_POST['themes']) &&
				isset($_POST['synopsis']) && !empty($_POST['synopsis'])
            ) :
                $title      = $_POST['title'];
                $year       = $_POST['date-year'] == 0 ? "0000" : $_POST['date-year'];
                $date       = $year . "-" . $_POST['date-month'] . "-" . $_POST['date-day'];
                $status     = $_POST['status'];
                $publish    = $_POST['publish'];
                $owned      = $_POST['owned'];
                $buy        = $_POST['buy'];
                $price      = $_POST['price'];
                $editor     = $_POST['editor'];
                $type       = $_POST['type'];
                $link      = $_POST['link'];
				$themes     = $_POST['themes'];
				$synopsis     = $_POST['synopsis'];
				if(isset($_POST['maj_asked'])){
										$maj_asked = $_POST['maj_asked'];
									}
									else{
										$maj_asked = 0;
									}
                                    

                $this->load->model('Manga_Model', 'manga');
                $this->manga->add_manga($title, $date, $status, $publish, $owned, $buy, $price, $editor, $type, $link, $themes, $synopsis, $maj_asked);
                $this->view->assign('success', true);
            else : 
                $this->view->assign('success', false);
            endif;
        endif;
        $content = $this->view->fetch('admin_manga_add_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }

    function series_edit()
    {
        if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;

        $this->load->library('uri');
        $this->load->model('Manga_Model', 'manga');

        $id = (int) $this->uri->segment(4);
        if ( !empty($id) ) :
            $manga = $this->manga->get_manga($id);
            $this->view->assign('manga', $manga);
            if ( isset($_POST['edit_manga']) ) :
                if ( 
                    isset($_POST['title']) && !empty($_POST['title']) &&
                    isset($_POST['date-year']) && isset($_POST['status']) &&
                    isset($_POST['date-month']) && isset($_POST['date-day']) && 
                    isset($_POST['publish'])  && isset($_POST['owned'])  &&
                    isset($_POST['buy']) &&  isset($_POST['price']) &&
                    isset($_POST['editor']) && !empty($_POST['editor']) &&
                    isset($_POST['type']) && !empty($_POST['type']) &&
                    isset($_POST['link']) && !empty($_POST['link']) &&
					isset($_POST['themes']) && !empty($_POST['themes']) &&
					isset($_POST['synopsis']) && !empty($_POST['synopsis'])
            ) :
                $title      = $_POST['title'];
                $year       = $_POST['date-year'] == 0 ? "0000" : $_POST['date-year'];
                $date       = $year . "-" . $_POST['date-month'] . "-" . $_POST['date-day'];
                $status     = $_POST['status'];
                $publish    = $_POST['publish'];
                $owned      = $_POST['owned'];
                $buy        = $_POST['buy'];
                $price      = $_POST['price'];
                $editor     = $_POST['editor'];
                $type       = $_POST['type'];
                $link     	= $_POST['link'];
				$themes     = $_POST['themes'];
				$synopsis   = $_POST['synopsis'];
				if(isset($_POST['maj_asked'])){
										$maj_asked = $_POST['maj_asked'];
									}
									else{
										$maj_asked = 0;
									}

                $this->load->model('Manga_Model', 'manga');
                $this->manga->edit_manga($id, $title, $date, $status, $publish, $owned, $buy, $price, $editor, $type, $link, $themes, $synopsis, $maj_asked);
                    $manga = $this->manga->get_manga($id);
                    $this->view->assign('manga', $manga);
                    $this->view->assign('success', true);
                else : 
                    $this->view->assign('success', false);
                endif;
            endif;
        endif;
        $content = $this->view->fetch('admin_manga_edit_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }

    function series_delete()
    {
        if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;

        $this->load->library('uri');
        $this->load->model('Manga_Model', 'manga');

        $id = (int) $this->uri->segment(4);
        if ( !empty($id) ) :
            $success = $this->manga->delete_manga($id);
            $this->view->assign('success', $success);
        endif;
        $content = $this->view->fetch('admin_manga_valid_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }
	
    function login()
    {
        if ( isset($_POST['login']) ) :
            if ( 
                isset($_POST['account']) && !empty($_POST['account']) &&
                isset($_POST['password']) && !empty($_POST['password'])
            ) :
                $this->load->model('Admin_Model', 'admin');
                $user = $this->admin->get_user($_POST['account'], $_POST['password']);
                if ( !empty($user) ) :
                    $_SESSION['id']         = $user['id'];
                    $_SESSION['account']    = $user['account'];
                    $_SESSION['username']   = $user['username'];
                    $_SESSION['logged']     = true;
                    header("Location: " . URL . "admin/index");
                else :
                    $this->view->assign('success', false);
                endif;
            else :
                $this->view->assign('success', false);
            endif;
        endif;
        $this->view->display('admin_login_view');
    }

    function logout()
    {
        if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;

        session_destroy();
        header("Location: " . URL . "home/index");
    }
	
	    function wishlist()
    {
		if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;
		
        $this->load->model('Manga_Model', 'manga');

        $data = $this->manga->valid_wished_manga(200);
        $this->view->assign('mangas', $data);

        $content = $this->view->fetch('admin_manga_valid_wish_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }
	
	function series_valid()
    {
		if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;
		
		$this->load->library('uri');
        $this->load->model('Manga_Model', 'manga');

		$id = (int) $this->uri->segment(4);
        if ( !empty($id) ) :
            $success = $this->manga->manga_valid($id);
            $this->view->assign('success', $success);
        endif;
		
        $content = $this->view->fetch('admin_manga_valid_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }
	
	function waiting_approval()
    {
		if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;
		
        $this->load->model('Manga_Model', 'manga');

        $data = $this->manga->waiting_approval(200);
        $this->view->assign('mangas', $data);

        $content = $this->view->fetch('admin_waiting_approval_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }
	
	function series_approve()
    {
		 if ( !isset($_SESSION['logged']) ) :
            header("Location: " . URL . "admin/login");
            exit(0);
        endif;

        $this->load->library('uri');
        $this->load->model('Manga_Model', 'manga');

        $id = (int) $this->uri->segment(4);
		$value = (int) $this->uri->segment(5);
        if ( !empty($id) ) :
            $success = $this->manga->approve($id, $value);
            $this->view->assign('success', $success);
        endif;

        $content = $this->view->fetch('admin_manga_valid_view');
        $this->view->assign('content', $content);
        $this->view->display('admin_layout_view');
    }
	
}
?>