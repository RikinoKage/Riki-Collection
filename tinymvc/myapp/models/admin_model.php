<?php

class Admin_Model extends TinyMVC_Model
{
    function get_total_tomes()
    {
        $this->db->select('owned_tomes, price');
        $this->db->from('manga');
        $result = $this->db->query_all();
        $data = array(
            'total_tomes'   => 0,
            'total_price'   => 0
        );
        foreach($result as $tome){
            $data['total_tomes'] += $tome['owned_tomes'];
            $data['total_price'] += $tome['owned_tomes'] * $tome['price'];
        }
        return $data;
    }

    function get_new_tomes_to_buy()
    {
        $this->db->select('buying_tomes, price');
        $this->db->from('manga');
        $this->db->where('buying_tomes > ?', array(0));
        $result = $this->db->query_all();
        $data = array(
            'total_tomes'   => 0,
            'total_price'   => 0
        );
        foreach($result as $tome){
            $data['total_tomes'] += $tome['buying_tomes'];
            $data['total_price'] += $tome['buying_tomes'] * $tome['price'];
			$data['price_reduc'] = $data['total_price'] - (($data['total_price'] * 5)/100);
        }
        return $data;
    }

    function get_nb_missing_tomes()
    {
        $this->db->select('published_tomes, owned_tomes, price');
        $this->db->from('manga');
        $result = $this->db->query_all();
        $data = array(
            'total_tomes'   => 0,
            'total_price'   => 0
        );
        foreach($result as $tome){
            $data['total_tomes'] += $tome['published_tomes'] - $tome['owned_tomes'];
            $data['total_price'] += ($tome['published_tomes'] - $tome['owned_tomes']) * $tome['price'];
        }
        return $data;
    }

    function get_nb_waiting_tomes()
    {
        $this->db->select('published_tomes, owned_tomes, price');
        $this->db->from('manga');
        $this->db->where('date > ? AND date != ?', array(date("Y-m-d"), "9999-00-00"));
        $result = $this->db->query_all();
        $data = array(
            'total_tomes'   => $this->db->num_rows(),
            'total_price'   => 0
        );
        foreach($result as $tome){
            $data['total_price'] += $tome['price'];
        }
        return $data;
    }

    function get_nb_continuing_series()
    {
        $result = $this->db->query_all('SELECT * FROM manga WHERE status = 0');
        $data = array(
            'series'   => $this->db->num_rows()
        );
        return $data;
    }
	
		function get_nb_waiting_series()
    {
        $result = $this->db->query_all('SELECT * FROM manga WHERE status = 1');
        $data = array(
            'series'   => $this->db->num_rows()
        );
        return $data;
    }
	
		function get_nb_finished_series()
    {
        $result = $this->db->query_all('SELECT * FROM manga WHERE status = 2');
        $data = array(
            'series'   => $this->db->num_rows()
        );
        return $data;
    }
	
		function get_nb_stopped_series()
    {
        $result = $this->db->query_all('SELECT * FROM manga WHERE status = 3');
        $data = array(
            'series'   => $this->db->num_rows()
        );
        return $data;
    }
	
    function get_user($account, $password)
    {
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->where('account = ? AND password = ?', array($account, $password));
        $result = $this->db->query_one();
        return $result;
    }

    function get_nb_editor()
    {
        $edits = $this->db->query_all('SELECT editor, COUNT(*) AS nbeditor FROM manga GROUP BY editor');
        return $edits;
    }

    function get_nb_type()
    {
        $types = $this->db->query_all('SELECT `type`, COUNT(*) AS nbtype FROM manga GROUP BY `type`');
        return $types;
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
            default:
                return "¯\_(ツ)_/¯";
        }
    }
}
?>