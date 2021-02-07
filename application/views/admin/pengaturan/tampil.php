<ng-view class="ng-scope">
  <section id="content" ng-controller="DashboardMhsController" class="ng-scope">

    <div class="container">

      <div class="row m-5">
        <div class="dash-widgets">
          <div class="row">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url("") ?>" class="bold">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">

                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Pengaturan</p>
                  </div>
                </div>

                <?php if ($this->session->flashdata('alert')): ?>
                  <?php echo $this->session->flashdata('alert'); ?>
                <?php endif ?>

                <form method="POST" enctype="multipart/form-data">

                  <div class="row">

                    <div class="col-md-12 col-sm-12">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <ul class="main-menu">

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-code" aria-hidden="true" style="color: black;"></i>Pengaturan Meta Utama (Search Engine)</a>
                              
                              <ul>
                                <li>
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="bgm-white cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Meta (Keyword)</strong>
                                              <input type="text" name="meta_keyword" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['meta_keyword']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('meta_keyword'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Meta (Author)</strong>
                                              <input type="text" name="meta_author" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['meta_author']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('meta_author'); ?></strong>
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Meta (Title)</strong>
                                              <input type="text" name="meta_title" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['meta_title']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('meta_title'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Meta (Description)</strong>
                                              <input type="text" name="meta_description" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['meta_description']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('meta_description'); ?></strong>
                                            </div>
                                          </div>

                                        </div>

                                        <div class="sp-btn">
                                          <button name="meta" value="meta" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                        </div>

                                      </div>
                                    </div>

                                  </div>
                                </li>
                              </ul>

                            </li>

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-share" aria-hidden="true" style="color: black;"></i>Pengaturan Social Media</a>
                              
                              <ul>
                                <li class="">
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Facebook</strong>
                                              <input type="text" name="facebook" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['facebook']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('facebook'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Instagram</strong>
                                              <input type="text" name="instagram" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['instagram']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('instagram'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Youtube</strong>
                                              <input type="text" name="youtube" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['youtube']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('youtube'); ?></strong>
                                            </div>
                                          </div>

                                        </div>

                                        <div class="sp-btn">
                                          <button name="sosmed" value="sosmed" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                        </div>

                                      </div>
                                    </div>

                                  </div>
                                </li>

                              </ul>

                            </li>

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-account-box-mail" aria-hidden="true" style="color: black;"></i>Pengaturan Kontak</a>
                              
                              <ul>
                                <li class="">
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">No.HP 1</strong>
                                              <input type="text" name="no_hp1" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['no_hp1']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('no_hp1'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">No.HP 2</strong>
                                              <input type="text" name="no_hp2" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['no_hp2']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('no_hp2'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Email</strong>
                                              <input type="text" name="email" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['email']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('email'); ?></strong>
                                            </div>
                                          </div>  

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Alamat</strong>
                                              <input type="text" name="alamat" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $meta['alamat']; ?>">
                                              <strong class="f-12" style="color: red;"><?php echo form_error('alamat'); ?></strong>
                                            </div>
                                          </div>

                                        </div>

                                        <div class="sp-btn">
                                          <button name="kontak" value="kontak" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                        </div>

                                      </div>
                                    </div>

                                  </div>
                                </li>

                              </ul>

                            </li>

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-laptop-mac" aria-hidden="true" style="color: black;"></i>Pengaturan Tampilan Banner</a>
                              
                              <ul>
                                <li class="">
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                        <?php foreach ($banner as $key => $value): ?>
                                            <div class="form-group">
                                              <div class="fg-line disabled">
                                                <img src="<?php echo base_url("assets/img/banner/".$value['cover']); ?>" height="50">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <div class="fg-line disabled">
                                                <strong class="f-12">Banner <?php echo $key+1; ?>: <?php echo $value['nama_banner']; ?></strong>
                                                <input type="file" name="cover[]" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                                                <input type="hidden" name="id_banner[]" value="<?php echo $value['id_banner'] ?>">
                                                <strong class="f-12" style="color: #bfbfbf;">Max Size: 2048Kb | Max Width: 933 | Max Height:407 </strong>
                                              </div>
                                            </div>
                                          <?php endforeach ?>

                                          <div class="form-group">
                                            <div class="sp-btn">
                                              <button name="banner" value="banner" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </li>

                              </ul>

                            </li>

                            <li class="sub-menu">
                              <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-settings-square" aria-hidden="true" style="color: black;"></i>Pengaturan Lain - Lain</a>
                              
                              <ul>
                                <li class="">
                                  <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                      <div class="cardcontainer">
                                        <div class="card-body card-padding p-t-20">

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">FAQ</strong>
                                              <textarea name="faq" class="form-control" id="faq"><?php echo $meta['faq']; ?></textarea>
                                              <strong class="f-12" style="color: red;"><?php echo form_error('faq'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Tentang</strong>
                                              <textarea name="tentang" class="form-control" id="tentang"><?php echo $meta['tentang']; ?></textarea>
                                              <strong class="f-12" style="color: red;"><?php echo form_error('tentang'); ?></strong>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="fg-line disabled">
                                              <strong class="f-12">Status Maintenance</strong>
                                              <select name="status" class="form-control">
                                                <option value="">Pilih Status</option>
                                                <?php foreach ($status as $key => $value): ?>
                                                  <option value="<?php echo $key; ?>" <?php if($meta['status']==$key){echo "selected";} ?>><?php echo $value; ?></option>
                                                <?php endforeach ?>
                                              </select>
                                              <strong class="f-12" style="color: red;"><?php echo form_error('status'); ?></strong>
                                            </div>
                                          </div>  

                                        </div>

                                        <div class="sp-btn">
                                          <button name="lain" value="lain" class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
                                        </div>

                                      </div>
                                    </div>

                                  </div>
                                </li>

                              </ul>

                            </li>

                          </ul>

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