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
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Produk</p>
                  </div>
                </div>
                <div class="row">

                  <div class="sp-btn" style="padding: 0px 22px 0px 25px;">
                    <a class="btn bgm-cyan waves-effect m-20 p-10-20" href="<?php echo base_url("admin/blog/tambah"); ?>" >Tambah</a>
                  </div>

                  <div class="col-md-12 col-sm-12">
                    <div class="card">

                      <?php if ($this->session->flashdata('alert')): ?>
                        <?php echo $this->session->flashdata('alert'); ?>
                      <?php endif ?>

                      <div class="table-responsive">  

                        <table class="table table-stripped" id="myTable">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Blog</th>
                              <th>Kategori</th>
                              <th>Status</th>
                              <th>Foto Blog</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($blog as $key => $value): ?>
                              <tr>
                                <td><?php echo $key+1; ?></td>
                                <td width="150"><?php echo $value['judul']; ?></td>
                                <td><?php echo $value['nama_kategori_blog']; ?></td>
                                <td>
                                <?php if ($value['status']==1): ?>
                                  <?php echo "Publish"; ?>
                                <?php else: ?>
                                  <?php echo "Draft"; ?>
                                <?php endif ?>
                                </td>
                                <td>
                                  <?php if (empty($value['foto'])): ?>
                                    <img height="100" class="radius" src="<?php echo base_url("assets/img/blog/no_image.png"); ?>">
                                  <?php else: ?>
                                    <img height="100" class="radius" src="<?php echo base_url("assets/img/blog/".$value['foto']); ?>">
                                  <?php endif ?>
                                </td>
                                <td>
                                  <a href="<?php echo base_url("admin/blog/detail/$value[id_blog]"); ?>" class="btn bgm-cyan waves-effect m-3 p-5-10">Detail</a>
                                  <a href="<?php echo base_url("admin/blog/ubah/$value[id_blog]"); ?>" class="btn bgm-green waves-effect m-3 p-5-10">Ubah</a>
                                  <a href="<?php echo base_url("admin/blog/hapus/$value[id_blog]"); ?>" class="btn bgm-red waves-effect m-3 p-5-10" onclick="return confirm('Apakah kamu yakin menghapus blog ini?');">Hapus</a>
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