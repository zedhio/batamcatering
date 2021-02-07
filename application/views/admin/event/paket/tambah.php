<ng-view class="ng-scope">
  <section id="content" ng-controller="DashboardMhsController" class="ng-scope">

    <div class="container">

      <div class="row m-5">
        <div class="dash-widgets">
          <div class="row">

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Tambah Paket Catering</p>
                  </div>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Nama Paket</strong>
                              <input type="text" name="nama_paket" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="Masukkan nama paket catering">
                              <strong class="f-12" style="color: red;"><?php echo form_error('nama_paket'); ?></strong>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Cover</strong>
                              <input type="file" name="cover" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty">
                              <strong class="f-12" style="color: #e0e0e0;">Max Size: 2048Kb | Max Width: 182 | Max Height:182 </strong>
                              <strong class="f-12" style="color: red;"><?php echo form_error('cover'); ?></strong>
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