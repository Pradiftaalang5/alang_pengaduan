<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_alangUser extends CI_Model
{
	public function userData($username)
	{
		return $this->db->get_where('masyarakat', ['username' => $username]);
	}

	public function riwayat()
	{	
		$user= $this->M_alngUser->userData($this->session->userdata('username'))->row_array();
		
		return $this->db->get_where('pengaduan',['nik'=>$user['nik']]);
	}

	public function tambahPengaduan($add)
	{
		$this->db->insert('pengaduan', $add);
	}

	public function pengaduan()
	{	
		return $this->db->get('pengaduan');
	}
}