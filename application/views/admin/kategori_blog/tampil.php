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
                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/kategori") ?>">Kategori Catering</a></li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Kategori Blog</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="card">

                      <?php if ($this->session->flashdata('alert')): ?>
                        <?php echo $this->session->flashdata('alert'); ?>
                      <?php endif ?>

                      <?php if (count($kategori_blog)<5): ?>
                      <div class="sp-btn">
                        <a class="btn bgm-cyan waves-effect m-20 p-10-20" href="<?php echo base_url("admin/kategori-blog/tambah"); ?>">Tambah</a>
                      </div>
                      <?php endif ?>

                      <div class="table-responsive">  

                        <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kategori Blog</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($kategori_blog as $key => $value): ?>
                            <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $value['nama_kategori_blog']; ?></td>
                              <td>
                                <a href="<?php echo base_url("admin/kategori-blog/ubah/$value[id_kategori_blog]"); ?>" class="btn bgm-green waves-effect m-3 p-5-10">Ubah</a>
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