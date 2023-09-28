<?php 

class M_komisi extends CI_Model{

	function tampil_data(){
		$hasil = $this->db->query('SELECT a.id_komisi, a.alamat_komisi, a.jt_komisi, a.tgl_closing_komisi, a.bruto_komisi, a.mar_listing_komisi, a.mar_selling_komisi, a.waktu_komisi, 

			b.id_mar, b.nama_mar, b.member_mar as member_listing, b.npwp_mar as npwp_listing, c.id_mar, c.member_mar as member_selling, b.upline_emd_mar as up_1_listing, b.upline_cmo_mar as up_2_listing, b.norek_mar as norek_listing, 

			c.npwp_mar as npwp_selling, c.upline_emd_mar as up_1_selling, c.upline_cmo_mar as up_2_selling, c.nama_mar as nama_mar2, c.norek_mar as norek_selling,

			d.id_komisi, d.mm_listing_komisi, d.npwpm_listing_komisi, d.npwpum_listing_komisi, d.npwpum_listing2_komisi, d.mm_selling_komisi, d.npwpm_selling_komisi, d.npwpum_selling_komisi, d.npwpum_selling2_komisi,d.admin_pengguna,

			e.id_pengguna, e.nama_pengguna, e.level_pengguna

			FROM komisi as a INNER JOIN marketing as b ON a.mar_listing_komisi = b.id_mar INNER JOIN marketing as c ON a.mar_selling_komisi = c.id_mar INNER JOIN sub_komisi as d ON a.id_komisi = d.id_komisi INNER JOIN pengguna as e ON e.id_pengguna = d.admin_pengguna');
		return $hasil;
	}

	function tampil_data_marketing(){
		return $this->db->get('marketing');
	}

	function tampil_data_rincian($where){
		$data = implode($where);
		$hasil = $this->db->query("SELECT a.id_komisi, a.alamat_komisi, a.jt_komisi, a.tgl_closing_komisi, a.bruto_komisi, a.mar_listing_komisi, a.mar_selling_komisi, a.waktu_komisi,

			b.id_mar, b.nama_mar, b.member_mar as member_listing, b.npwp_mar as npwp_listing, c.id_mar, c.member_mar as member_selling, b.upline_emd_mar as up_1_listing, b.upline_cmo_mar as up_2_listing, b.norek_mar as norek_listing, 

			c.npwp_mar as npwp_selling, c.upline_emd_mar as up_1_selling, c.upline_cmo_mar as up_2_selling, c.nama_mar as nama_mar2, c.norek_mar as norek_selling,

			d.id_komisi, d.mm_listing_komisi, d.npwpm_listing_komisi, d.npwpum_listing_komisi, d.npwpum_listing2_komisi, d.mm_selling_komisi, d.npwpm_selling_komisi, d.npwpum_selling_komisi, d.npwpum_selling2_komisi,d.admin_pengguna,

			e.id_pengguna, e.nama_pengguna, e.level_pengguna

			FROM komisi as a INNER JOIN marketing as b ON a.mar_listing_komisi = b.id_mar INNER JOIN marketing as c ON a.mar_selling_komisi = c.id_mar INNER JOIN sub_komisi as d ON a.id_komisi = d.id_komisi INNER JOIN pengguna as e ON e.id_pengguna = d.admin_pengguna WHERE a.id_komisi = '$data'");
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

	function edit($where){
    	return $this->db->get_where('komisi',$where);
    }

	function update($where,$data){
		$this->db->where($where);
		$this->db->update('komisi',$data);
	}

	function hapus($where){
		$this->db->where($where);
		$this->db->delete('komisi',$where);
	}

}
