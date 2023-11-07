<?php 

class M_komisi extends CI_Model{

	function tampil_data(){
		$hasil = $this->db->query('SELECT a.id_komisi, a.alamat_komisi, a.jt_komisi, a.tgl_closing_komisi, a.bruto_komisi, a.mar_listing_komisi, a.mar_selling_komisi, a.waktu_komisi, a.status_komisi, a.tgl_disetujui, a.status_transfer,

			a.mar_listing2_komisi, a.mar_selling2_komisi, 

			b.id_mar, b.nama_mar, b.member_mar as member_listing, c.id_mar, c.member_mar as member_selling, b.upline_emd_mar as up_1_listing, b.upline_cmo_mar as up_2_listing, b.norek_mar as norek_listing, 

			c.upline_emd_mar as up_1_selling, c.upline_cmo_mar as up_2_selling, c.nama_mar as nama_mar2, c.norek_mar as norek_selling,

			d.id_sub_komisi, d.id_komisi, d.mm_listing_komisi, d.npwpm_listing_komisi, d.npwpum_listing_komisi, d.npwpum_listing2_komisi, d.mm_selling_komisi, d.npwpm_selling_komisi, d.npwpum_selling_komisi, d.npwpum_selling2_komisi, d.admin_pengguna, d.admin_status_komisi,

			d.mm2_listing_komisi, d.npwpm2_listing_komisi, d.npwpum2_listing_komisi, d.npwpum2_listing2_komisi, d.mm2_selling_komisi, d.npwpm2_selling_komisi, d.npwpum2_selling_komisi, d.npwpum2_selling2_komisi,

			e.id_pengguna, e.nama_pengguna, e.level_pengguna,

			h.nama_mar as listing_2, h.norek_mar as norek_listing2, h.upline_emd_mar as up_1_listing2, h.upline_cmo_mar as up_2_listing2,

			i.nama_mar as selling_2, i.norek_mar as norek_selling2, i.upline_emd_mar as up_1_selling2, i.upline_cmo_mar as up_2_selling2,

			j.id_pengguna, j.nama_pengguna as admin_disetujui, j.level_pengguna as level_disetujui, j.gambar_ttd_pengguna,

			k.id_afw, k.id_sub_komisi, k.m_ang, k.npwp_ang, k.npwp_up_ang, k.npwp_up2_ang, k.m_fran, k.npwp_fran, k.npwp_up_fran, k.npwp_up2_fran, k.m_win, k.npwp_win, k.npwp_up_win, k.npwp_up2_win 

			FROM komisi as a LEFT JOIN marketing as b ON a.mar_listing_komisi = b.id_mar LEFT JOIN marketing as c ON a.mar_selling_komisi = c.id_mar INNER JOIN sub_komisi as d ON a.id_komisi = d.id_komisi INNER JOIN pengguna as e ON e.id_pengguna = d.admin_pengguna

			LEFT JOIN marketing as h ON h.id_mar = a.mar_listing2_komisi

			LEFT JOIN marketing as i ON i.id_mar = a.mar_selling2_komisi

			LEFT JOIN pengguna as j ON j.id_pengguna = d.admin_status_komisi

			LEFT JOIN sub_komisi_afw as k ON k.id_sub_komisi = d.id_sub_komisi

			ORDER BY a.id_komisi ASC

			');
		return $hasil;
	}

	function tampil_data_marketing(){
		return $this->db->get('marketing');
	}

	function tampil_data_cobroke(){
		return $this->db->get('co_broke');
	}

	function tampil_data_potongan(){
		return $this->db->get('potongan');
	}

	function tampil_data_referal(){
		return $this->db->get('referal');
	}

	function tampil_data_pengurangan(){
		return $this->db->get('pengurangan_fee');
	}

	function tampil_data_sub_komisi(){
		return $this->db->get('sub_komisi');
	}

	function tampil_data_sub_afw(){
		return $this->db->get('sub_komisi_afw');
	}

	function getDataByDateRange($dari, $ke, $j_tanggal, $admin_komisi) {
		$this->db->distinct();
		$this->db->select('a.id_komisi, a.alamat_komisi, a.jt_komisi, a.tgl_closing_komisi, a.bruto_komisi, a.mar_listing_komisi, a.mar_selling_komisi, a.waktu_komisi, a.status_komisi, a.tgl_disetujui, a.status_transfer,
			a.mar_listing2_komisi, a.mar_selling2_komisi');

		$this->db->select('b.id_mar, b.nama_mar, b.member_mar as member_listing, c.id_mar, c.member_mar as member_selling, b.upline_emd_mar as up_1_listing, b.upline_cmo_mar as up_2_listing, b.norek_mar as norek_listing,
			c.upline_emd_mar as up_1_selling, c.upline_cmo_mar as up_2_selling, c.nama_mar as nama_mar2, c.norek_mar as norek_selling');

		$this->db->select('d.id_sub_komisi, d.id_komisi, d.mm_listing_komisi, d.npwpm_listing_komisi, d.npwpum_listing_komisi, d.npwpum_listing2_komisi, d.mm_selling_komisi, d.npwpm_selling_komisi, d.npwpum_selling_komisi, d.npwpum_selling2_komisi, d.admin_pengguna, d.admin_status_komisi,
			d.mm2_listing_komisi, d.npwpm2_listing_komisi, d.npwpum2_listing_komisi, d.npwpum2_listing2_komisi, d.mm2_selling_komisi, d.npwpm2_selling_komisi, d.npwpum2_selling_komisi, d.npwpum2_selling2_komisi');

		$this->db->select('e.id_pengguna, e.nama_pengguna, e.level_pengguna');

		$this->db->select('h.nama_mar as listing_2, h.norek_mar as norek_listing2, h.upline_emd_mar as up_1_listing2, h.upline_cmo_mar as up_2_listing2');

		$this->db->select('i.nama_mar as selling_2, i.norek_mar as norek_selling2, i.upline_emd_mar as up_1_selling2, i.upline_cmo_mar as up_2_selling2');

		$this->db->select('j.id_pengguna, j.nama_pengguna as admin_disetujui, j.level_pengguna as level_disetujui, j.gambar_ttd_pengguna');

		$this->db->select('k.id_afw, k.id_sub_komisi, k.m_ang, k.npwp_ang, k.npwp_up_ang, k.npwp_up2_ang, k.m_fran, k.npwp_fran, k.npwp_up_fran, k.npwp_up2_fran, k.m_win, k.npwp_win, k.npwp_up_win, k.npwp_up2_win');

		$this->db->from('komisi as a');
		$this->db->join('marketing as b', 'a.mar_listing_komisi = b.id_mar', 'left');
		$this->db->join('marketing as c', 'a.mar_selling_komisi = c.id_mar', 'left');
		$this->db->join('sub_komisi as d', 'a.id_komisi = d.id_komisi');
		$this->db->join('pengguna as e', 'e.id_pengguna = d.admin_pengguna');
		$this->db->join('marketing as h', 'h.id_mar = a.mar_listing2_komisi', 'left');
		$this->db->join('marketing as i', 'i.id_mar = a.mar_selling2_komisi', 'left');
		$this->db->join('pengguna as j', 'j.id_pengguna = d.admin_status_komisi', 'left');
		$this->db->join('sub_komisi_afw as k', 'k.id_sub_komisi = d.id_sub_komisi', 'left');
		$this->db->order_by('a.id_komisi', 'ASC');

		if (!empty($dari) && !empty($ke) && !empty($j_tanggal)) {
			$this->db->where('a.'.$j_tanggal.'>=', $dari);
			$this->db->where('a.'.$j_tanggal.'<=', $ke);
		}
		if (!empty($admin_komisi)) {
			$this->db->where('e.id_pengguna', $admin_komisi);
		}
		$query = $this->db->get('komisi');

		return $query->result();
	}

	function tampil_data_rincian($where){
		$data = implode($where);
		$hasil = $this->db->query("SELECT a.id_komisi, a.alamat_komisi, a.jt_komisi, a.tgl_closing_komisi, a.bruto_komisi, a.mar_listing_komisi, a.mar_selling_komisi, a.waktu_komisi, a.status_komisi, a.tgl_disetujui, a.status_transfer,

			a.mar_listing2_komisi, a.mar_selling2_komisi, 

			b.id_mar, b.nama_mar, b.member_mar as member_listing, c.id_mar, c.member_mar as member_selling, b.upline_emd_mar as up_1_listing, b.upline_cmo_mar as up_2_listing, b.norek_mar as norek_listing, 

			c.upline_emd_mar as up_1_selling, c.upline_cmo_mar as up_2_selling, c.nama_mar as nama_mar2, c.norek_mar as norek_selling,

			d.id_sub_komisi, d.id_komisi, d.mm_listing_komisi, d.npwpm_listing_komisi, d.npwpum_listing_komisi, d.npwpum_listing2_komisi, d.mm_selling_komisi, d.npwpm_selling_komisi, d.npwpum_selling_komisi, d.npwpum_selling2_komisi, d.admin_pengguna, d.admin_status_komisi, d.jabatanum_listing_komisi, d.jabatanum_listing2_komisi, d.jabatanum2_listing_komisi, d.jabatanum2_listing2_komisi, d.jabatanum_selling_komisi, d.jabatanum_selling2_komisi, d.jabatanum2_selling_komisi, d.jabatanum2_selling2_komisi,

			d.mm2_listing_komisi, d.npwpm2_listing_komisi, d.npwpum2_listing_komisi, d.npwpum2_listing2_komisi, d.mm2_selling_komisi, d.npwpm2_selling_komisi, d.npwpum2_selling_komisi, d.npwpum2_selling2_komisi,

			e.id_pengguna, e.nama_pengguna, e.level_pengguna,

			h.nama_mar as listing_2, h.norek_mar as norek_listing2, h.upline_emd_mar as up_1_listing2, h.upline_cmo_mar as up_2_listing2,

			i.nama_mar as selling_2, i.norek_mar as norek_selling2, i.upline_emd_mar as up_1_selling2, i.upline_cmo_mar as up_2_selling2,

			j.id_pengguna, j.nama_pengguna as admin_disetujui, j.level_pengguna as level_disetujui, j.gambar_ttd_pengguna,

			k.id_afw, k.id_sub_komisi, k.m_ang, k.npwp_ang, k.npwp_up_ang, k.npwp_up2_ang, k.m_fran, k.npwp_fran, k.npwp_up_fran, k.npwp_up2_fran, k.m_win, k.npwp_win, k.npwp_up_win, k.npwp_up2_win

			FROM komisi as a LEFT JOIN marketing as b ON a.mar_listing_komisi = b.id_mar LEFT JOIN marketing as c ON a.mar_selling_komisi = c.id_mar INNER JOIN sub_komisi as d ON a.id_komisi = d.id_komisi INNER JOIN pengguna as e ON e.id_pengguna = d.admin_pengguna

			LEFT JOIN marketing as h ON h.id_mar = a.mar_listing2_komisi

			LEFT JOIN marketing as i ON i.id_mar = a.mar_selling2_komisi

			LEFT JOIN pengguna as j ON j.id_pengguna = d.admin_status_komisi

			LEFT JOIN sub_komisi_afw as k ON k.id_sub_komisi = d.id_sub_komisi

			WHERE a.id_komisi = '$data'");
		return $hasil;
	}

	function simpan($data){
		$this->db->insert('komisi',$data);
	}

	function get_last_inserted_id() {
		return $this->db->insert_id();
	}

	function simpan_sub_komisi($data2){
		$this->db->insert('sub_komisi',$data2);
	}

	function get_last_inserted_id_sub_komisi() {
		return $this->db->insert_id();
	}

	function simpan_co_broke($data3){
		$this->db->insert('co_broke',$data3);
	}

	function simpan_potongan($data4){
		$this->db->insert('potongan',$data4);
	}

	function simpan_referal($data5){
		$this->db->insert('referal',$data5);
	}

	function simpan_sub_komisi_afw($data6){
		$this->db->insert('sub_komisi_afw',$data6);
	}

	function simpan_pengurangan_fee($data){
		$this->db->insert('pengurangan_fee',$data);
	}

	function edit($where){
		return $this->db->get_where('komisi',$where);
	}

	function get_status($id_komisi) {
		$this->db->select('status_komisi');
		$this->db->where('id_komisi', $id_komisi);
		$query = $this->db->get('komisi');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->status_komisi;
		} else {
			return null;
		}
	}

	function update($where,$data){
		$this->db->where($where);
		$this->db->update('komisi',$data);
	}

	function update_sub_komisi($where,$data2){
		$this->db->where($where);
		$this->db->update('sub_komisi',$data2);
	}

	function hapus($where){
		$this->db->where($where);
		$this->db->delete('komisi',$where);
	}

	function hapus_pengurangan_fee($where){
		$this->db->where($where);
		$this->db->delete('pengurangan_fee',$where);
	}

}
