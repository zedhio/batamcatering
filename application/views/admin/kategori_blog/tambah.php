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
                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/kategori-blog") ?>">Kategori Catering</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Tambah Kategori</p>
                  </div>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Nama Kategori Blog</strong>
                              <input type="text" name="nama_kategori_blog" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="Masukkan nama kategori blog">
                              <strong class="f-12" style="color: red;"><?php echo form_error('nama_kategori_blog'); ?></strong>
                            </div>
                          </div>
                          
                        </div>

                        <div class="sp-btn">
                          <button class="btn bgm-cyan waves-effect m-20 p-10-20">Simpan</button>
                        </div>

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