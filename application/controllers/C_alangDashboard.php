<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_alangDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('templates/topbar');
		$this->load->view('V_alangDashboard');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}



	// kategori
	public function kategori()
	{
		$data['username'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();
		$data['kategori'] = $this->M_alangDashboard->kategori()->result_array();
		$data['subkategori'] = $this->M_alangDashboard->subkategori()->result_array();
		$data['joinKategori'] = $this->M_alangJoin->kategori()->result_array();

		$data['kategori'] = $this->db->get('kategori')->result_array();
		$this->load->view('templates/topbar');
		$this->load->view('V_alangKategori', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/footer');
	}

	public function tambahKategori()
	{
		$data['user'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();


		$kategori = $this->input->post('kategori');

		$add = [
			'kategori' => $kategori,
		];

		$this->M_alangDashboard->tambahKategori($add);
		redirect('C_alangDashboard/kategori');
	}

	public function editKategori($id)
	{
		$data['user'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();

		$kategori = $this->input->post('kategori');

		$update = [
			'kategori' => $kategori,
		];

		$this->db->where('id', $id);
		$this->M_alangDashboard->editKategori($update);
		redirect('C_alangDashboard/kategori');
	}

	public function deleteKategori($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kategori');
		redirect('C_alangDashboard/kategori');
	}

	// subkategori
	public function tambahSub()
	{
		$data['user'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();

		$subkategori = $this->input->post('subkategori');

		$add = [
			'sub_kategori' => $subkategori,
			'id_kategori' => $this->input->post('kategori')
		];

		$this->M_alangDashboard->tambahSub($add);
		redirect('C_alangDashboard/kategori');
	}

	public function editSub($id)
	{
		$data['user'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();

		$subkategori = $this->input->post('sub_kategori');

		$update = array(
			'sub_kategori' => $subkategori,
		);

		$this->db->where('subkategori_id', $id);
		$this->M_alangDashboard->editSub($update);
		redirect('C_alangDashboard/kategori');
	}

	public function deleteSub($id)
	{
		$this->db->where('subkategori_id', $id);
		$this->db->delete('subkategori');
		redirect('C_alangDashboard/kategori');
	}



	public function masyarakat()
	{
		$data['user'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_alangDashboard->masyarakat()->result_array();


		$data['title'] = 'Masyarakat';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_alangMasyarakat', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function petugas()
	{
		$data['user'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_alangDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_alangDashboard->petugas()->result_array();

		$data['title'] = 'Petugas';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_alangPetugas', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambahPetugas()
	{
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('telp', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('level', 'Level', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match !',
			'min_length' => 'password too short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		$data = [
			'nama_petugas' => htmlspecialchars($this->input->post('nama_petugas', true)),
			'username' => htmlspecialchars($this->input->post('username', true)),
			'telp' => htmlspecialchars($this->input->post('telepon', true)),
			'level' => htmlspecialchars($this->input->post('level', true)),
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
		];

		$this->db->insert('petugas', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil membuat akun !
			  </div>');
		redirect('C_alangDashboard/petugas');
	}

	// pengaduan
	public function pengaduan()
	{

		$data['user'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_alangDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_alangDashboard->petugas()->result_array();
		$data['pengaduan'] = $this->M_alangJoin->pengaduan()->result_array();

		$data['title'] = 'Pengaduan';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_Dpengaduan', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tindakan($id)
	{
		$data = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();
		// 	

		$tanggapan = $this->input->post('tanggapan');
		$status = $this->input->post('status');


		$add = [

			'id_pengaduan' => $id,
			'tanggapan' => $tanggapan,
			'tgl_tanggapan' =>  date('Y-m-d'),
			'id_petugas' => $data['id_petugas'],
			// 'status' => $status,
		];

		$update = [
			'status' => $status
		];

		$this->db->where('id_pengaduan', $id);
		$this->db->update('pengaduan', $update);

		$this->M_alangDashboard->tambahTindakan($add);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Berhasil mengirim tanggapan !
			  </div>');
		redirect('C_alangDashboard/pengaduan');
	}

	public function tanggapan($id)
	{

		$data['user'] = $this->M_alangDashboard->userData($this->session->userdata('username'))->row_array();
		$data['masyarakat'] = $this->M_alangDashboard->masyarakat()->result_array();
		$data['petugas'] = $this->M_alangDashboard->petugas()->result_array();
		$data['tanggapan'] = $this->M_alangJoin->tanggapan($id)->row_array();
		$data['tanggapanPetugas'] = $this->M_alangJoin->tanggapanPetugas($id)->row_array();

		$data['title'] = 'Tanggapan';
		$this->load->view('templates/topbar', $data);
		$this->load->view('V_alangTanggapan', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer', $data);
	}
	public function laporan_pdf(){

		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			),"pengaduan"=>$this->M_alangjoin->pengaduan(),
		);
		
		$this->load->library('pdf');
		
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('v_laporan_pdf', $data);
		
		
		}
}
