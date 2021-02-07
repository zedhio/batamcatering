<style type="text/css">
  .bold{font-weight: bold;}
</style>

<ng-view class="ng-scope">
  <section id="content" ng-controller="DashboardMhsController" class="ng-scope">

    <div class="container">

      <div class="row m-5">
        <div class="dash-widgets">
          <div class="row">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url("") ?>" class="bold">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/paket") ?>">Paket Catering</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Paket</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Detail Paket</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">

                   <div class="row">

                    <div class="sp-btn pull-right" style="padding: 0px 22px 0px 42px;">
                      <a class="btn bgm-cyan waves-effect m-20 p-10-20" href="<?php echo base_url("admin/paket/tambah_paket/$paket[id_paket_catering]"); ?>" >Tambah</a>
                    </div>

                    <div class="col-md-3 col-sm-12" style="padding: 42px 42px 0px 42px;">

                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <div class="form-group" style="text-align: center;">
                            <div class="fg-line disabled" align="center">
                              <img src="<?php echo base_url("assets/img/paket/".$paket['cover']); ?>" height="100" style="border: 2px solid #961459;padding: 5px;border-radius: 25px;">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled" align="center">
                              <strong class="f-12"><?php echo $paket['nama_paket']; ?></strong>
                            </div>
                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="col-md-9 col-sm-12">

                      <!-- <div class="bgm-white cardcontainer"> -->
                      <div class="card-body card-padding p-t-20">

                        <div class="card">

                          <?php if ($this->session->flashdata('alert')): ?>
                            <?php echo $this->session->flashdata('alert'); ?>
                          <?php endif ?>

                          <div class="table-responsive">  

                            <table class="table table-stripped" id="myTable">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Judul Sub Paket</th>
                                  <th>Deskripsi</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($sub_paket as $key => $value): ?>
                                  <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $value['judul']; ?></td>
                                    <td><?php echo strip_tags(substr($value['deskripsi'], 0, 50)); ?></td>
                                    <td>
                                      <a href="<?php echo base_url("admin/paket/detail/subdetail/$value[id_sub_paket]"); ?>" class="btn bgm-cyan waves-effect m-3 p-5-10">Detail</a>
                                      <a href="<?php echo base_url("admin/paket/detail/ubah/$value[id_sub_paket]"); ?>" class="btn bgm-green waves-effect m-3 p-5-10">Ubah</a>
                                      <a href="<?php echo base_url("admin/paket/detail/hapus/$value[id_sub_paket]"); ?>" class="btn bgm-red waves-effect m-3 p-5-10" onclick="return confirm('Apakah kamu yakin menghapus sub paket ini?');">Hapus</a>
                                    </td>
                                  </tr>
                                <?php endforeach ?>
                              </tbody>
                            </table>

                          </div>
                        </div>

                      </div>

                      <!-- </div> -->

                    </div>

                  </div>

                </div>
              </div>  
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

</section>
</ng-view>