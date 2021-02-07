<style type="text/css">
  strong{color: #961459;}
  .strong{color: #686868;}
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
                <li class="breadcrumb-item active" aria-current="page">Ubah</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Ubah Kategori</p>
                  </div>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12 strong">Nama Kategori</strong>
                              <input type="text" name="nama_kategori" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $kategori['nama_kategori']; ?>">
                              <strong class="f-12" style="color: red;"><?php echo form_error('nama_kategori'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <?php if (empty($kategori['cover'])): ?>
                                <img src="<?php echo base_url("assets/img/kategori/no_image.png"); ?>" height="100" class="radius">
                              <?php else: ?>
                                <img src="<?php echo base_url("assets/img/kategori/".$kategori['cover']); ?>" height="100" class="radius">
                              <?php endif ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Image : <?php echo $kategori['cover']; ?></strong>
                              <input type="file" name="cover" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                              <strong class="f-12">Max Size: 2048Kb | Max Width: 496 | Max Height:264 </strong>
                            </div>
                          </div>
                        </div>

                        <div class="sp-btn">
                          <button class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                        </div>

                      </div>
                    </div>
                  </form>
                </div>  
              </div>

            </div>
          </div>
        </div>

      </div>

    </section>
  </ng-view>