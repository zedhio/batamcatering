<style type="text/css">
  .label{font-size: 18px;font-weight: bold;color: #961459;}
  .bold{font-weight: bold;}
  .dataTables_length{display: none;}
  .dataTables_info{display: none;}
  .dataTables_paginate{display: none;}
</style>

<ng-view class="ng-scope">
  <section id="content" ng-controller="DashboardMhsController" class="ng-scope">

    <div class="container">

      <div class="row m-5 centered">
        <div class="dash-widgets">
          <div class="row">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active bold" aria-current="page">Home</li>
              </ol>
            </nav>

            <?php if ($this->session->flashdata('welcome')): ?>
              <?php echo $this->session->flashdata('welcome'); ?>
            <?php endif ?>

            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Paket Catering</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="bgm-white cardcontainer" align="center" style="min-height: 138px;">
                      <div class="label">
                        <?php echo count($paket); ?>
                      </div>
                      <div class="sp-btn margin-5t">
                        <a href="<?php echo base_url("admin/paket"); ?>" class="btn bgm-orange waves-effect">Lihat Paket Catering</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Produk</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="bgm-white cardcontainer" align="center" style="min-height: 138px;">
                      <div class="label">
                        <?php echo count($produk); ?>
                      </div>
                      <div class="sp-btn margin-5t">
                        <a href="<?php echo base_url("admin/respon"); ?>" class="btn bgm-orange waves-effect">Lihat Produk</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <div class="col-sm-4 col-md-4">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Blog</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="bgm-white cardcontainer" align="center" style="min-height: 138px;">
                      <div class="label">
                        <?php echo count($blog); ?>
                      </div>
                      <div class="sp-btn margin-5t">
                        <a href="<?php echo base_url("admin/blog"); ?>" class="btn bgm-orange waves-effect">Lihat Blog</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Saran & Pertanyaan</p>
                  </div>
                </div>
                <div class="table-responsive">  

                  <table class="table table-stripped" id="myTable">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No.HP</th>
                        <th>Komentar/Pertanyaan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($saran as $key => $value): ?>
                        <tr>
                          <td><?php echo $value['nama']; ?></td>
                          <td><a href="mailto:<?php echo $value['email']; ?>"><?php echo $value['email']; ?></a></td>
                          <td>
                            <?php if (empty($value['no_hp'])): ?>
                              <?php echo "-"; ?>
                            <?php else: ?>
                              <?php echo $value['no_hp']; ?>
                            <?php endif ?>
                          </td>
                          <td><?php echo $value['komentar_pertanyaan']; ?></td>
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

  </section>
</ng-view>