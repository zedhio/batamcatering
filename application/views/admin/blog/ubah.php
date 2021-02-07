<style type="text/css">
  .info{color: #686868;}
  .card-body-padding{background-color: #F2F2F2;color: #fff;}
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
                <li class="breadcrumb-item"><a href="<?php echo base_url("admin/blog") ?>">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Ubah Blog</p>
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
                              <strong class="f-13 strong">Kategori</strong>
                              <select name="id_kategori_blog" class="form-control">
                                <option value="">--- Pilih Kategori ---</option>
                                <?php foreach ($kategori as $key => $value): ?>
                                  <option value="<?php echo $value['id_kategori_blog'] ?>" <?php if($value['id_kategori_blog']==$blog['id_kategori_blog']){echo "selected";} ?>><?php echo $value['nama_kategori_blog']; ?></option>
                                <?php endforeach ?>
                              </select>
                              <strong class="f-12" style="color: red;"><?php echo form_error('id_kategori_blog'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">Judul</strong>
                              <input type="text" name="judul" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $blog['judul']; ?>">
                              <strong class="f-12" style="color: red;"><?php echo form_error('judul'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled strong">
                              <strong class="f-13 strong">Deskripsi</strong>
                              <textarea name="deskripsi" rowspan="10" class="form-control"><?php echo $blog['deskripsi']; ?></textarea>
                              <strong class="f-12" style="color: red;"><?php echo form_error('deskripsi'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">SEO Title</strong>
                              <input type="text" name="seo_title" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $blog['seo_title']; ?>">
                              <strong class="f-12" style="color: red;"><?php echo form_error('seo_title'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">SEO Deskripsi</strong>
                              <input type="text" name="seo_deskripsi" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $blog['seo_deskripsi']; ?>">
                              <strong class="f-12" style="color: red;"><?php echo form_error('seo_deskripsi'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">SEO Keyword</strong>
                              <input type="text" name="seo_keyword" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $blog['seo_keyword']; ?>">
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
                            <div class="fg-line disabled strong">
                              <strong class="f-13 strong">Featured</strong>
                              <br>
                              <input type="checkbox" name="featured" value="ya" <?php if($blog['featured']=="ya"){echo "checked";} ?>>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <?php if (empty($blog['foto'])): ?>
                                <img src="<?php echo base_url("assets/img/blog/no_image.png"); ?>" height="100" class="radius">
                              <?php else: ?>
                                <img src="<?php echo base_url("assets/img/blog/".$blog['foto']); ?>" height="100" class="radius">
                              <?php endif ?>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13">Foto : <?php echo $blog['foto']; ?></strong>
                              <input type="file" name="foto" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                              <strong class="f-12">Max Size: 2048Kb | Max Width: 900 | Max Height: 466 </strong>
                            </div>
                          </div>

                          <div class="form-group padding-top">
                            <div class="fg-line disabled">
                              <strong class="f-13 strong">Status</strong>
                              <select name="status" class="form-control">
                                <option value="">--- Pilih Status ---</option>
                                <?php foreach ($status as $key => $value): ?>
                                  <option value="<?php echo $key;?>" <?php if($key==$blog['status']){echo "selected";}; ?>><?php if($key==1){echo "Publish";} else{echo "Draft";} ?></option>
                                <?php endforeach ?>                              
                              </select>
                              <strong class="f-12" style="color: red;"><?php echo form_error('status'); ?></strong>
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