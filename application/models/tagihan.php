<?php
class TagihanModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_tagihans()
  {
    $query = $this->db->get('tagihan');
    return $query->result();
  }

  public function get_tagihan_by_id($id)
  {
    $query = $this->db->get_where('tagihan', ['id' => $id]);
    return $query->row();
  }

  public function create_tagihan($nomor_tagihan, $tanggal_tagihan, $nama_vendor, $item, $besar_item, $total_tagihan, $file_lampiran)
  {
    $data = [
      'nomor_tagihan' => $nomor_tagihan,
      'tanggal_tagihan' => $tanggal_tagihan,
      'nama_vendor' => $nama_vendor,
      'item' => $item,
      'besar_item' => $besar_item,
      'total_tagihan' => $total_tagihan,
      'file_lampiran' => $file_lampiran,
    ];
    $this->db->insert('tagihan', $data);
    return $this->db->insert_id();
  }
}
