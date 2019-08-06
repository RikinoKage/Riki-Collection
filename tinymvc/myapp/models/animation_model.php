<?php

class Animation_Model extends TinyMVC_Model
{
     function get_all_dvd() // 
    {
        $this->db->select('*');
        $this->db->from('dvd');
        $this->db->where('owned > ?', 0);
        $this->db->orderby('title ASC');
        $result = $this->db->query_all();
        $data = array();

        foreach($result as $key => $dvd){

            // Change Date To French Format - sNapz
            if(strcmp($dvd['date'], "9999-00-00") != 0) $dvd['date'] = '<div style="display:none;">'.$dvd['date'].'</div>'.date('d/m/Y', strtotime($dvd['date']));


            $data[$key]['id']           = $dvd['id'];
            $data[$key]['title']        = $dvd['title'];
            $data[$key]['date']         = $dateTxt;
            $data[$key]['owned']        = $dvd['owned'];
            $data[$key]['buying']       = $dvd['buying'];
            $data[$key]['price']        = $dvd['price'];
            $data[$key]['editor']       = $dvd['editor'];
            $data[$key]['type']         = $dvd['type'];
        }
        return $data;
    }
}
?>