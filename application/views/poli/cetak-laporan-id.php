<!doctype html>
<html lang="en"><head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>rekam medis pasien</title>
  </head><body>
  <h3 style="text-align: center;">Rekam medis pasien</h3><hr>

  <table class="table table-striped table-bordered zero-configuration">
                                
                                    <tr>
                                      
                                        <th>Nama</th>
                                        <th>No Rm</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Keluhan</th>
                                        <th>tgl rekmed</th>
                                        <th>obat</th>
                                       
                                    </tr>
                               
                                   
                                  
                                        <tr>
                                            
                                            <td><?= $rekmed->nama; ?></td>
                                            <td><?= $rekmed->no_rm; ?></td>

                                            <td><?= $rekmed->jenis_kelamin; ?></td>
                                            <td><?= $rekmed->keluhan; ?></td>
                                            <td><?= date('d F Y', $rekmed->tgl_rekam); ?></td>
                                            <td>
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
                                                    <?= $ro->nama_obat; ?><br>
                                                <?php endforeach; ?>
                                            </td>
                                            
                                        </tr>
                                   
                               
                            </table>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    
  </body></html>