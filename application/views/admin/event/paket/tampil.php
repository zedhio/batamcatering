<style type="text/css">
  .radius{border: 2px solid #961459;padding: 5px;border-radius: 25px;}
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
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Paket Catering</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="card">

                      <?php if ($this->session->flashdata('alert')): ?>
                        <?php echo $this->session->flashdata('alert'); ?>
                      <?php endif ?>

                      <?php if (count($paket)<3): ?>
                        <div class="sp-btn">
                          <a class="btn bgm-cyan waves-effect m-20 p-10-20" href="<?php echo base_url("admin/paket/tambah"); ?>">Tambah</a>
                        </div>
                      <?php endif ?>

                      <div class="table-responsive">  

                        <table class="table table-stripped" id="myTable">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Judul Paket</th>
                              <th>Cover</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($paket as $key => $value): ?>
                              <tr>
                                <td><?php echo $key+1; ?></td>
                                <td width="150"><?php echo $value['nama_paket']; ?></td>
                                <td>
                                  <?php if (empty($value['cover'])): ?>
                                    <img height="100" src="<?php echo base_url("assets/img/paket/no_image.png"); ?>" class="radius">
                                  <?php else: ?>
                                    <img height="100" src="<?php echo base_url("assets/img/paket/".$value['cover']); ?>" class="radius">
                                  <?php endif ?>
                                </td>
                                <td>
                                  <a href="<?php echo base_url("admin/paket/detail/$value[id_paket_catering]"); ?>" class="btn bgm-blue waves-effect m-3 p-5-10">Detail</a>
                                  <a href="<?php echo base_url("admin/paket/ubah/$value[id_paket_catering]"); ?>" class="btn bgm-green waves-effect m-3 p-5-10">Ubah</a>
                                </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>

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