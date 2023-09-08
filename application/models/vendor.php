<?php
class VendorModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_all_vendors()
  {
    $query = $this->db->get('vendor');
    return $query->result();
  }

  public function get_vendor_by_id($id)
  {
    $query = $this->db->get_where('vendor', ['id' => $id]);
    return $query->row();
  }

  public function create_vendor($nama_vendor, $alamat_vendor, $kode_vendor)
  {
    $data = [
      'nama_vendor' => $nama_vendor,
      'alamat_vendor' => $alamat_vendor,
      'kode_vendor' => $kode_vendor,
    ];
    $this->db->insert('vendor', $data);
    return $this->db->insert_id();
  }

  public function update_vendor($id, $nama_vendor, $alamat_vendor, $kode_vendor)
  {
    $data = [
      'nama_vendor' => $nama_vendor,
      'alamat_vendor' => $alamat_vendor,
      'kode_vendor' => $kode_vendor,
    ];
    $this->db->update('vendor', $data, ['id' => $id]);
    return $this->db->affected_rows();
  }

  public function delete_vendor($id)
  {
    $this->db->delete('vendor', ['id' => $id]);
    return $this->db->affected_rows();
  }
}
