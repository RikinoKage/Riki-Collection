<?php

class Manga_Model extends TinyMVC_Model
{
    function get_all_manga() // /manga/all
    {
        $this->db->select('*');
        $this->db->from('manga');
		$this->db->where('owned_tomes > ?', 0);
        $this->db->orderby('title ASC');
        $result = $this->db->query_all();
        $data = array();

        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = '<div style="display:none;">'.$manga['date'].'</div>'.date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];
            $dateTxt = ($manga['status'] == 2) ? "Terminé" : $dateTxt;
            $dateTxt = ($manga['status'] == 3) ? "Abandonné" : $dateTxt;

            $data[$key]['id']           = $manga['id'];
            $data[$key]['title']        = $manga['title'];
            $data[$key]['date']         = $dateTxt;
            $data[$key]['status']       = self::switch_status($manga['status']);
            $data[$key]['published']    = $manga['published_tomes'];
			$data[$key]['next']    		= $manga['published_tomes'] + 1;
            $data[$key]['owned']        = $manga['owned_tomes'];
            $data[$key]['missing']      = max(0, $manga['published_tomes'] - $manga['owned_tomes']);
            $data[$key]['buying']       = $manga['buying_tomes'];
            $data[$key]['price']        = $manga['price'];
            $data[$key]['total_price']  = $manga['price'] * $manga['owned_tomes'];
            $data[$key]['percent_own']  = ($manga['owned_tomes'] / $manga['published_tomes']) * 100;
            $data[$key]['percent_miss']  = (($manga['published_tomes'] - $manga['owned_tomes']) / $manga['published_tomes']) * 100;
            $data[$key]['editor']       = $manga['editor'];
            $data[$key]['type']         = $manga['type'];
            $data[$key]['link']         = $manga['link'];
			$data[$key]['themes']       = $manga['themes'];
			$data[$key]['synopsis']       = $manga['synopsis'];
        }
        return $data;
    }

	function get_missing_manga() //manga/missing
    {
        $this->db->select('*');
        $this->db->from('manga');
		$this->db->where('owned_tomes = ?', 0);
        $this->db->orderby('title ASC');
        $result = $this->db->query_all();
        $data = array();

        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = '<div style="display:none;">'.$manga['date'].'</div>'.date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];
            $dateTxt = ($manga['status'] == 2) ? "Terminé" : $dateTxt;
            $dateTxt = ($manga['status'] == 3) ? "Abandonné" : $dateTxt;

            $data[$key]['id']           = $manga['id'];
            $data[$key]['title']        = $manga['title'];
            $data[$key]['date']         = $dateTxt;
            $data[$key]['status']       = self::switch_status($manga['status']);
            $data[$key]['published']    = $manga['published_tomes'];
			$data[$key]['next']    		= $manga['published_tomes'] + 1;
            $data[$key]['owned']        = $manga['owned_tomes'];
            $data[$key]['missing']      = $manga['published_tomes'] - $manga['owned_tomes'];
            $data[$key]['buying']       = $manga['buying_tomes'];
            $data[$key]['price']        = $manga['price'];
            $data[$key]['editor']       = $manga['editor'];
            $data[$key]['type']         = $manga['type'];
            $data[$key]['link']         = $manga['link'];
			$data[$key]['themes']       = $manga['themes'];
			$data[$key]['synopsis']       = $manga['synopsis'];
        }
        return $data;
    }
	
	function get_all_manga_grid()
    {
        $this->db->select('*');
        $this->db->from('manga');
        $this->db->orderby('date ASC');
        //$this->db->limit(MANGAS_PER_PAGE, $start);
        $result = $this->db->query_all();
        $data = array();

        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = '<div style="display:none;">'.$manga['date'].'</div>'.date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];
            $dateTxt = ($manga['status'] == 2) ? "Terminé" : $dateTxt;
            $dateTxt = ($manga['status'] == 3) ? "Abandonné" : $dateTxt;

            $data[$key]['id']           = $manga['id'];
            $data[$key]['title']        = $manga['title'];
            $data[$key]['date']         = $dateTxt;
            $data[$key]['status']       = self::switch_status($manga['status']);
            $data[$key]['published']    = $manga['published_tomes'];
			$data[$key]['next']    		= $manga['published_tomes'] + 1;
            $data[$key]['owned']        = $manga['owned_tomes'];
            $data[$key]['missing']      = max(0, $manga['published_tomes'] - $manga['owned_tomes']);
            $data[$key]['buying']       = $manga['buying_tomes'];
            $data[$key]['price']        = $manga['price'];
            $data[$key]['editor']       = $manga['editor'];
            $data[$key]['type']         = $manga['type'];
            $data[$key]['link']         = $manga['link'];
        }
        return $data;
    }
	
	function get_random_manga()
	{
        $manga = $this->db->query_one('SELECT * FROM manga WHERE owned_tomes > 0 ORDER BY RAND() LIMIT 1');
		
		$manga['status_let'] = self::switch_status($manga['status']);
		$manga['status']       = self::switch_status($manga['status']);
		

        return $manga;
	}
	
	function get_last_manga()
	{
        $result = $this->db->query_all('SELECT * FROM manga ORDER BY id DESC LIMIT 30');
		$data2 = array();
        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = '<div style="display:none;">'.$manga['date'].'</div>'.date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];
			$dateTxt = ($manga['status'] == 2) ? "Terminé" : $dateTxt;
            $dateTxt = ($manga['status'] == 3) ? "Abandonné" : $dateTxt;

            $data2[$key]['date']        = $dateTxt;;
            $data2[$key]['id']           = $manga['id'];
			$data2[$key]['title']           = $manga['title'];
			$data2[$key]['editor']           = $manga['editor'];
			$data2[$key]['status']       = self::switch_status($manga['status']);
			$data2[$key]['type']           = $manga['type'];
        }
        return $data2;
	}
	
	function get_next_manga()
	{
        $this->db->select('*');
        $this->db->from('manga');
		$this->db->limit('30');
		$this->db->orderby('date ASC, title ASC');
        $result = $this->db->query_all();
		$data3 = array();
        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];
			
			$result[$key]['date']         = $dateTxt;
			$result[$key]['next']		=  $manga['published_tomes'] + 1;
        }
        return $result;
	}

    function get_manga($id)
    {
        $this->db->select('*');
        $this->db->from('manga');
        $this->db->where('id', $id);
        $manga = $this->db->query_one();
		
		if ( !empty($manga) ) :
            $date = explode('-', $manga['date']);
            $manga['year'] = $date[0];
            $manga['month'] = $date[1];
            $manga['day'] = $date[2];
        endif;
		

        $manga['title'] = $manga['title'];
		$manga['status_let'] = self::switch_status($manga['status']);
		$manga['fullprice']  = $manga['price'] * $manga['published_tomes'];
		$manga['next']    	= $manga['published_tomes'] + 1;

        return $manga;
    }

    function get_all_editor($editor)
    {
        $this->db->select('*');
        $this->db->from('manga');
        $this->db->where('editor', $editor);
        $this->db->orderby('title ASC');
        $result = $this->db->query_all();
        $data = array();

        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = '<div style="display:none;">'.$manga['date'].'</div>'.date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];
            $dateTxt = ($manga['status'] == 2) ? "Terminé" : $dateTxt;
            $dateTxt = ($manga['status'] == 3) ? "Abandonné" : $dateTxt;

            $data[$key]['id']           = $manga['id'];
            $data[$key]['title']        = $manga['title'];
            $data[$key]['date']         = $dateTxt;
            $data[$key]['status']       = self::switch_status($manga['status']);
            $data[$key]['published']    = $manga['published_tomes'];
			$data[$key]['next']    		= $manga['published_tomes'] + 1;
            $data[$key]['owned']        = $manga['owned_tomes'];
            $data[$key]['missing']      = max(0, $manga['published_tomes'] - $manga['owned_tomes']);
            $data[$key]['buying']       = $manga['buying_tomes'];
            $data[$key]['price']        = $manga['price'];
            $data[$key]['total_price']  = $manga['price'] * $manga['owned_tomes'];
            $data[$key]['editor']       = $manga['editor'];
            $data[$key]['type']         = $manga['type'];
            $data[$key]['link']         = $manga['link'];
			$data[$key]['themes']       = $manga['themes'];
			$data[$key]['synopsis']       = $manga['synopsis'];
        }
        return $data;
    }
	
	    function get_manga_planning()
    {
		$result = $this->db->query_all('SELECT * FROM manga WHERE status = 0 AND date <> 9999-00-00 OR status = 1 AND date <> 9999-00-00 ORDER BY date ASC ');
		$data = array();

        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = '<div style="display:none;">'.$manga['date'].'</div>'.date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];

            $data[$key]['id']           = $manga['id'];
            $data[$key]['title']        = $manga['title'];
            $data[$key]['date']         = $dateTxt;
            $data[$key]['status']       = self::switch_status($manga['status']);
            $data[$key]['published']    = $manga['published_tomes'];
			$data[$key]['next']    		= $manga['published_tomes'] + 1;
            $data[$key]['owned']        = $manga['owned_tomes'];
            $data[$key]['missing']      = $manga['published_tomes'] - $manga['owned_tomes'];
            $data[$key]['buying']       = $manga['buying_tomes'];
            $data[$key]['price']        = $manga['price'];
            $data[$key]['editor']       = $manga['editor'];
            $data[$key]['type']         = $manga['type'];
            $data[$key]['link']         = $manga['link'];
        }
        return $data;
    }
	
	function get_manga_monthly($date)
    {
		$this->db->select('*');
        $this->db->from('manga');
        $this->db->where('MONTH(date) = ?', $date);
		$this->db->orderby('date ASC, title ASC');
        $result = $this->db->query_all();

        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = '<div style="display:none;">'.$manga['date'].'</div>'.date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];

            $result[$key]['date']         = $dateTxt;
			$result[$key]['next']    		= $manga['published_tomes'] + 1;
        }
        return $result;
    }
	
	function get_manual_verif()
    {
        $result = $this->db->query_all('SELECT * FROM manga WHERE maj_asked = 1 ORDER BY title ASC');

        foreach($result as $key => $manga){

            // Change Date To French Format - sNapz
            if(strcmp($manga['date'], "9999-00-00") != 0) $manga['date'] = '<div style="display:none;">'.$manga['date'].'</div>'.date('d/m/Y', strtotime($manga['date']));
			
            $dateTxt = (strcmp($manga['date'], "9999-00-00") == 0) ? 'Non définis' : $manga['date'];

            $result[$key]['date']         = $dateTxt;
			$result[$key]['next']    		= $manga['published_tomes'] + 1;
        }
        return $result;
    }

    function add_manga($title, $date, $status, $publish, $owned, $buy, $price, $editor, $type, $link, $themes, $synopsis, $maj_asked)
    {
        return $this->db->insert('manga', array(
                'title'             => $title,
                'date'              => $date,
                'status'            => $status,
                'published_tomes'   => $publish,
                'owned_tomes'       => $owned,
                'buying_tomes'      => $buy,
                'price'             => $price,
                'editor'            => $editor,
                'type'              => $type,
                'link'              => $link,
				'themes'            => $themes,
				'synopsis'          => $synopsis,
				'maj_asked'         => $maj_asked
				
            )
        );
    }

    function edit_manga($id, $title, $date, $status, $publish, $owned, $buy, $price, $editor, $type, $link, $themes, $synopsis, $maj_asked)
    {
        $this->db->where('id', $id);
        return $this->db->update('manga', array(
                'title'             => $title,
                'date'              => $date,
                'status'            => $status,
                'published_tomes'   => $publish,
                'owned_tomes'       => $owned,
                'buying_tomes'      => $buy,
                'price'             => $price,
                'editor'            => $editor,
                'type'              => $type,
                'link'              => $link,
				'themes'            => $themes,
				'synopsis'          => $synopsis,
				'maj_asked'          => $maj_asked
            )
        );
    }

    function delete_manga($id)
    {
        $this->db->select('*');
        $this->db->from('manga');
        $this->db->where('id', $id);
        $result = $this->db->query_one();
        
        if ( $result != NULL ) :
            $this->db->where('id', $id);
            $this->db->delete('manga');
            return True;
        else :
            return False;
        endif;
    }

    function get_all_wished_manga($limit)
    {
        $this->db->select('id, title, price, owned_tomes, buying_tomes, library_added');
        $this->db->from('manga');
        $this->db->where('buying_tomes > ?', array(0));
		$this->db->orderby('title ASC');
        //s
        //$this->db->limit($limit);
        $result = $this->db->query_all();
        $data = array();
        foreach($result as $key => $manga){
			$data[$key]['id']           = $manga['id'];
            $data[$key]['title']        = $manga['title'];
			$data[$key]['library_added']        = $manga['library_added'];
			$data[$key]['price']        = $manga['price'];
			$data[$key]['wished_price']        = $manga['price'] * $manga['buying_tomes'];
            $data[$key]['wished']       = array(
                                                'start' => $manga['owned_tomes'] + 1,
                                                'end'   => $manga['owned_tomes'] + $manga['buying_tomes']
                                                );
        }
        return $data;
    }
	
	function valid_wished_manga($limit)
    {
        $this->db->select('id, title, price, owned_tomes, buying_tomes');
        $this->db->from('manga');
        $this->db->where('buying_tomes > ?', array(0));
        $result = $this->db->query_all();
        $data = array();
        foreach($result as $key => $manga){
            $data[$key]['id']           = $manga['id'];
            $data[$key]['title']        = $manga['title'];
            $data[$key]['wished']       = array(
                                                'start' => $manga['owned_tomes'] + 1,
                                                'end'   => $manga['owned_tomes'] + $manga['buying_tomes']
                                                );
        }
        return $data;
    }
		
		function waiting_approval($limit)
    {
        $result = $this->db->query_all('SELECT * FROM manga WHERE published_tomes - owned_tomes != buying_tomes AND published_tomes - owned_tomes != 0 ORDER BY title ASC');
        $data = array();
        foreach($result as $key => $manga){
            $data[$key]['id']           = $manga['id'];
            $data[$key]['title']        = $manga['title'];
            $data[$key]['buying_tomes'] = $manga['buying_tomes'];
            $data[$key]['owned'] = $manga['owned_tomes'];
            $data[$key]['published'] = $manga['published_tomes'];
            $data[$key]['waiting_approval'] = $manga['published_tomes'] - $manga['owned_tomes'];
            $data[$key]['percent_own']  = ($manga['owned_tomes'] / $manga['published_tomes']) * 100;
            $data[$key]['percent_buy']  = ($manga['buying_tomes'] / $manga['published_tomes']) * 100;
            $data[$key]['percent_left']  = max(0, (($manga['published_tomes'] - $manga['owned_tomes'] - $manga['buying_tomes']) / $manga['published_tomes']) * 100);
            $data[$key]['left']  = $manga['published_tomes'] - $manga['owned_tomes'] - $manga['buying_tomes'];
        }
        return $data;
    }

	function approve($id, $value)
    {
        $this->db->select('*');
        $this->db->from('manga');
        $this->db->where('id', $id);
        $manga = $this->db->query_one();
		
        $this->db->where('id', $id);
        if ($value == '-1') :
			return $this->db->update('manga', array(
					'buying_tomes'   => $manga['published_tomes'] - $manga['owned_tomes']
				)
            );
        elseif  ($value == '1') :
            return $this->db->update('manga', array(
                'buying_tomes'   => $manga['buying_tomes'] + $value
            )
        );
		else :
			return $this->db->update('manga', array(
					'buying_tomes'   =>  $value
				)
			);
		endif;
    }
	
	function manga_valid($id)
    {
		$this->db->select('*');
        $this->db->from('manga');
        $this->db->where('id', $id);

        $manga = $this->db->query_one();

        $this->db->where('id', $id);
        return $this->db->update('manga', array(
                'owned_tomes'   => $manga['buying_tomes'] + $manga['owned_tomes'],
                'buying_tomes'  => 0,
				'library_added' => 0
            )
        );
    }
    
    function get_nb_type_editor($editor)
    {
        $types_edit = $this->db->query_all('SELECT `type`, COUNT(*) AS nbtype FROM manga where editor = ? GROUP BY `type` ORDER BY nbtype DESC', array($editor));
        return $types_edit;
    }
	
	function library_valid($id)
    {
		$this->db->select('*');
        $this->db->from('manga');
        $this->db->where('id', $id);
		$this->db->orderby('library_added ASC');
        $manga = $this->db->query_one();

        $this->db->where('id', $id);
        return $this->db->update('manga', array(
                'library_added' => 1
            )
        );
	}

////////////////////////////////// UTILS FUNCTIONS ////////////////////////////
    function switch_status($status_id)
    {
        switch($status_id)
        {
            case 0:
                return "En cours";
            case 1:
                return "En attente";
            case 2:
                return "Terminé";
            case 3:
                return "Abandonné";
            default:
                return "¯\_(ツ)_/¯";
        }
    }

    function convert_datetime($date)
    {
        $new_date = date_create($date);
        return $new_date->format('d-m-Y');
    }
}
?>