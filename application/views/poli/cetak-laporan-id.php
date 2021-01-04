<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   

    <title>rekam medis pasien</title>
  </head><body>
  <!-- <img src="<?= base_url(); ?>assets/logo/puskes.jpg" style="position: absolute; width: 60px; height:auto"> -->
    <table style="width: 100%;">
        <tr>
            <td align="center">
            <span style="line-height: 1,6; font-weight:bold;">
            UPTD Puskesmas Bumiemas 
            <br>Lampung Timur
            </span>
            </td>
        </tr>
    </table>
    
    <hr>

    <h4 align="center">Rekam Medis pasien
    <br><?= $rekmed->no_rm; ?>
    </h4>

    
        <table  cellspacing="0" cellpadding="10" width="500">
            <tr>
                <td witdh="150">Nama</td>
                <td width="350"> <?= $rekmed->nama; ?></td>
            </tr>
           
            <tr padding-top="2px">
                <td witdh="150">Alamat</td>
                <td width="350"> <?= $rekmed->alamat; ?></td>
            </tr>
            <tr>
                <td witdh="150">Jenis Kelamin</td>
                <td width="350"> <?= $rekmed->jenis_kelamin; ?></td>
            </tr>
            <tr>
                <td witdh="150">Keluhan</td>
                <td width="350"> <?= $rekmed->keluhan; ?></td>
            </tr>
            <tr>
                <td witdh="150">Tanggal Rekmed</td>
                <td width="350"><?= date('d F Y', $rekmed->tgl_rekam); ?></td>
            </tr>
            <tr>
                <td witdh="150">Obat</td>
                <td width="350">
                <?php
                                                $id_rm = $rekmed->id;
                                                $this->db->select('tbl_rm_obat.*, tbl_rekam.*, tbl_obat.nama_obat');
                                                $this->db->from('tbl_rm_obat');
                                                $this->db->join('tbl_rekam', 'tbl_rm_obat.id_rm = tbl_rekam.id');
                                                $this->db->join('tbl_obat', 'tbl_rm_obat.id_obat = tbl_obat.id');
                                                $this->db->where('tbl_rm_obat.id_rm', $id_rm);
                                                $query = $this->db->get()->result();

                                                ?>
                                                <?php foreach ($query as $ro) : ?>
                                                   <?= $ro->nama_obat; ?>.
                                                <?php endforeach; ?>
                </td>
            </tr>  
        </table>

       

   
  

   
   

    
  </body></html>