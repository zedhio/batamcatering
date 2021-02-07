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
                <li class="breadcrumb-item active"><a href="<?php echo base_url("admin/profil") ?>">Profil</a></li>
              </ol>
            </nav>

            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="cardtext-small">
                    <p>Profil Admin</p>
                  </div>
                </div>
                <form method="POST">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="bgm-white cardcontainer">
                        <div class="card-body card-padding p-t-20">

                          <?php if ($this->session->flashdata('alert')): ?>
                            <?php echo $this->session->flashdata('alert'); ?>
                          <?php endif ?>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Name of Admin</strong>
                              <input type="text" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $admin['nama']; ?>" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Email</strong>
                              <input type="email" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" value="<?php echo $admin['email']; ?>" readonly>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="fg-line disabled">
                              <strong class="f-12">Password</strong>
                              <input type="password" name="password" class="form-control f-14 ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="Kosongkan jika tidak ingin mengganti password.">
                              <?php echo form_error('email','<p style="color: red; font-size: 14px;">','</p>'); ?>
                            </div>
                          </div>

                        </div>

                        <div class="sp-btn">
                          <button class="btn bgm-green waves-effect m-20 p-10-20">Ubah</button>
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