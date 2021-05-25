<?php
class M_grafik extends CI_Model{
 
    function get_data_stok(){
        $query = $this->db->query("SELECT id_barang,SUM(jumlah) AS jumlah FROM tb_po_detail GROUP BY id_barang");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}