<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_alangDashboard extends CI_Model
{
	public function userData($username)
	{
		return $this->db->get_where('petugas', ['username' => $username]);
	}

	// kategori
	public function kategori()
	{
		return $this->db->get('kategori');
	}

	public function editKategori($update)
	{
		$this->db->update('kategori', $update);
	}


	public function tambahKategori($add)
	{
		$this->db->insert('kategori', $add);
	}

	public function subkategori()
	{
		return $this->db->get('subkategori');
	}

	public function tambahSub($add)
	{
		$this->db->insert('subkategori', $add);
	}

	public function editSub($update)
	{

		$this->db->update('subkategori', $update);
	}

	// masyarakat
	public function masyarakat()
	{
		return $this->db->get('masyarakat');
	}

	// petugas
	public function petugas()
	{
		return $this->db->get('petugas');
	}

    // pengaduan
    public function tambahTindakan($add)
    {
        $this->db->insert('tanggapan', $add);
    }
}
