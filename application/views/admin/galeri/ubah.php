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
                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/galeri") ?>">Galeri</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Ubah Galeri</p>
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
                              <strong class="f-13 strong">Nama Event</strong>
                              <input type="text" name="event" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $galeri['event']; ?>">
                              <strong class="f-12" style="color: red;"><?php echo form_error('event'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled strong">
                              <strong class="f-13 strong">Alamat</strong>
                              <textarea name="alamat" rowspan="1" class="form-control"><?php echo $galeri['alamat']; ?></textarea>
                              <strong class="f-12" style="color: red;"><?php echo form_error('alamat'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">Tanggal Event</strong>
                              <input type="date" name="tgl_event" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $galeri['tgl_event']; ?>">
                              <strong class="f-12" style="color: red;"><?php echo form_error('tgl_event'); ?></strong>
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

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <?php if (empty($galeri['foto'])): ?>
                                <img src="<?php echo base_url("assets/img/galeri/no_image.png"); ?>" height="100" class="radius">
                              <?php else: ?>
                                <img src="<?php echo base_url("assets/img/galeri/".$galeri['foto']); ?>" height="100" class="radius">
                              <?php endif ?>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13">Foto : <?php echo $galeri['foto']; ?></strong>
                              <input type="file" name="foto" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                              <strong class="f-12">Max Size: 2048Kb | Max Width: 479 | Max Height: 479 </strong>
                            </div>
                          </div>

                          <div class="sp-btn">
                          <button class="btn bgm-green waves-effect">Ubah</button>
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