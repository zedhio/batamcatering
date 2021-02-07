<style type="text/css">
  .info{color: #686868;}
  .card-body-padding{background-color: #F2F2F2; color: #fff;}
  .padding-top{padding: 10px 0px 0px 0px;}
  .padding-right{padding: 0px 40px 0px 40px;}
  .padding-left{padding: 0px 40px 0px 40px;}
  strong{color: #961459;}
  .strong{color: #686868;}
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
                <li class="breadcrumb-item"><a>Detail Paket</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Sub Paket</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Tambah Sub Paket Catering</p>
                  </div>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">

                    <div class="col-md-8 col-sm-12 padding-left">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20 card-body-padding">

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-16 info">Detail</strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">Judul</strong>
                              <input type="text" name="judul" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="Masukkan judul">
                              <strong class="f-12" style="color: red;"><?php echo form_error('judul'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled strong">
                              <strong class="f-13 strong">Deskripsi</strong>
                              <textarea name="deskripsi" id="editor" rowspan="4" class="form-control" placeholder="Masukkan deskripsi"></textarea>
                              <strong class="f-12" style="color: red;"><?php echo form_error('deskripsi'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">SEO Title</strong>
                              <input type="text" name="seo_title" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="Masukkan seo title">
                              <strong class="f-12" style="color: red;"><?php echo form_error('seo_title'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">SEO Deskripsi</strong>
                              <input type="text" name="seo_deskripsi" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="Masukkan seo deskripsi">
                              <strong class="f-12" style="color: red;"><?php echo form_error('seo_deskripsi'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">SEO Keyword</strong>
                              <input type="text" name="seo_keyword" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="Masukkan seo keyword">
                              <strong class="f-12" style="color: red;"><?php echo form_error('seo_keyword'); ?></strong>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-12 padding-right">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20 card-body-padding">

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-16 info">Info</strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">Cover 1</strong>
                              <input type="file" name="cover[]" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                              <strong class="f-12">Max Size: 2048Kb | Max Width: 479 | Max Height: 479 </strong>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">Cover 2</strong>
                              <input type="file" name="cover[]" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                              <strong class="f-12">Max Size: 2048Kb | Max Width: 479 | Max Height: 479 </strong>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">Cover 3</strong>
                              <input type="file" name="cover[]" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                              <strong class="f-12">Max Size: 2048Kb | Max Width: 479 | Max Height: 479 </strong>
                            </div>
                          </div>

                          <div class="sp-btn">
                          <button class="btn bgm-cyan waves-effect">Simpan</button>
                          </div>

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