<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_alangUser extends CI_Controller
{

	public function index()
	{
		$this->load->view('templates/topbarUser');
		$this->load->view('V_DashboardUser');
		$this->load->view('templates/sidebarUser');
		$this->load->view('templates/footer');
	}

	public function pengaduan()
	{
		$data['pengaduan'] = $this->M_alangUser->pengaduan()->result_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$this->load->view('templates/topbarUser');
		$this->load->view('V_alangPengaduan', $data);
		$this->load->view('templates/sidebarUser');
		$this->load->view('templates/footer');
	}

	public function tambahPengaduan()
	{
		$user = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row_array();
		$tgl_pengaduan = $this->input->post('tanggal');
		$kategori = $this->input->post('kategori');
		$subkategori = $this->input->post('subkategori');
		$isilaporan = $this->input->post('isi');

		// upload file
		$config['upload_path']          = './assets/uploads';
		$config['allowed_types']        = 'gif|jpg|png';
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		$this->upload->do_upload('foto');
		$upload_img = $this->upload->data('file_name');
		
		$add = array(

			'tgl_pengaduan' => $tgl_pengaduan,
			'nik' => $user['nik'],
			'kategori' => $kategori,
			'subkategori' => $subkategori,
			'isi_laporan' => $isilaporan,
			'foto' => $upload_img,

		);

		$this->M_alangUser->tambahPengaduan($add);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Laporan Anda Telah Terkirim !
			  </div>');
		// var_dump($user);
		redirect('C_alangUser');
	}

	// public function insertpengaduan()
	// {
	//     $data = [
	//         'nik' => $this->session->userdata('nik'),
	//         'id_subkategori' => $this->input->post('subkategori'),
	//         'tgl_pengaduan' => $this->input->post('tgl_pengaduan'),
	//         'isi_laporan' => $this->input->post('isi'),
	//         'foto' => $this->input->post('foto'),
	//         'status' => 0
	//     ];

	//     $this->M_alangUser->tambahPengaduan($data);
	//     $this->session->set_flashdata('pengaduan', '<div class="alert alert-success" role="alert"> Berhasil ditambahkan! </div>');
	//     redirect('pengaduan');
	// } 

	public function get_sub_kategori()
	{
		$id_kategori = $this->input->post('id');
		$sub_kategori = $this->db->get_where('subkategori', ['id_kategori' => $id_kategori])->result();
		echo json_encode($sub_kategori);
	}
}
