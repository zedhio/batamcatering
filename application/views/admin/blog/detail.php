<style type="text/css">
  .info{color: #686868;}
  .card-body-padding{background-color: #F2F2F2; color: #fff;}
  .padding-top{padding: 10px 0px 0px 0px;}
  .padding-right{padding: 0px 40px 0px 40px;}
  .padding-left{padding: 0px 40px 0px 40px;}
  strong{color: #961459;}
  .strong{color: #686868;}
  .readonly{background-color: #F2F2F2;cursor: none;}
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
                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/blog") ?>">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Detail Produk</p>
                  </div>
                </div>
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
                            <strong class="f-13 strong">Kategori</strong>
                            <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty readonly" value="<?php echo $blog['nama_kategori_blog']; ?>" disabled>
                          </div>
                        </div>

                        <div class="form-group padding-top">
                          <div class="fg-line disabled">
                            <strong class="f-13 strong">Judul</strong>
                            <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty readonly" value="<?php echo $blog['judul']; ?>" disabled>
                          </div>
                        </div>

                        <div class="form-group padding-top">
                          <div class="fg-line disabled strong">
                            <strong class="f-13 strong">Deskripsi</strong>
                            <textarea name="deskripsi" rowspan="4" class="form-control" disabled><?php echo $blog['deskripsi']; ?></textarea>
                          </div>
                        </div>

                        <div class="form-group padding-top">
                          <div class="fg-line disabled">
                            <strong class="f-13 strong">SEO Title</strong>
                            <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty readonly" value="<?php echo $blog['seo_title']; ?>" disabled>
                          </div>
                        </div>

                        <div class="form-group padding-top">
                          <div class="fg-line disabled">
                            <strong class="f-13 strong">SEO Deskripsi</strong>
                            <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty readonly" value="<?php echo $blog['seo_deskripsi']; ?>" disabled>
                          </div>
                        </div>

                        <div class="form-group padding-top">
                          <div class="fg-line disabled">
                            <strong class="f-13 strong">SEO Keyword</strong>
                            <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty readonly" value="<?php echo $blog['seo_keyword']; ?>" disabled>
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
                          <div class="fg-line disabled strong">
                            <strong class="f-13 strong">Featured</strong>
                            <br>
                            <input type="checkbox" <?php  if ($blog['featured']=="ya") {echo "checked";}; ?> disabled>
                          </div>
                        </div>

                          <div class="form-group" style="text-align: center;">
                            <div class="fg-line disabled" align="center">
                                <img src="<?php echo base_url("assets/img/blog/".$blog['foto']); ?>" height="100" class="radius" disabled>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled" align="center">
                              <strong class="f-12"><?php echo $blog['foto']; ?></strong>
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
      </div>

    </div>

  </section>
</ng-view>