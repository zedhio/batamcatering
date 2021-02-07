<style type="text/css">
  .color{color:#961459;}
</style>

<aside id="sidebar" class="sidebar c-overflow">

  <div class="s-profile text-center profil-bg">

    <div class="image-cropper">
      <img src="<?php echo base_url("assets/admin/img/profil/avatar.png"); ?>" alt="Foto Profil" title="<?php echo $admin['nama']; ?>"/>
    </div>

    <div class="sp-info">
      <?php echo $admin['nama']; ?>
    </div>

    <div class="sp-btn">
      <a class="btn bgm-orange waves-effect" href="<?php echo base_url("admin/profil"); ?>">Lihat Profil</a>
    </div>

  </div>

  <!-- start ul -->
  <ul class="main-menu">

    <li class="<?php if($menu=="dashboard"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/dashboard"); ?>"><i class="zmdi zmdi-home color"></i> Home</a>
    </li>

    <li class="sub-menu <?php if($menu!=="dashboard" AND $menu!=="paket" AND $menu!=="kategori_blog" AND $menu!=="blog" AND $menu!=="galeri" AND $menu!=="testimoni" AND $menu!=="pengaturan"){echo "toggled";} ?>">
      <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-shopping-basket color" aria-hidden="true"></i>Produk</a>
      <ul <?php if($menu!=="dashboard" AND $menu!=="paket" AND $menu!=="kategori_blog" AND $menu!=="blog" AND $menu!=="galeri" AND $menu!=="testimoni" AND $menu!=="pengaturan"){echo "style='display: block;'";} else {echo "style='display: none;'";} ?> >
        <li class="<?php if($menu=="kategori"){echo "active";} ?>">
          <a href="<?php echo base_url("admin/kategori"); ?>"><i class="zmdi zmdi-tag color"></i> Kategori Catering</a>
        </li>
        <li class="<?php if($menu=="produk"){echo "active";} ?>">
          <a href="<?php echo base_url("admin/produk"); ?>"><i class="zmdi zmdi-shopping-basket color"></i> Produk</a>
        </li>
      </ul>
    </li>

    <li class="<?php if($menu=="paket"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/paket"); ?>"><i class="zmdi zmdi-square-o color"></i> Paket Catering</a>
    </li>

    <li class="sub-menu <?php if($menu!=="dashboard" AND $menu!=="paket" AND $menu!=="kategori" AND $menu!=="produk" AND $menu!=="galeri" AND $menu!=="galeri" AND $menu!=="testimoni" AND $menu!=="pengaturan"){echo "toggled";} ?>">
      <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-blogger color" aria-hidden="true"></i>Blog</a>
      <ul <?php if($menu!=="dashboard" AND $menu!=="paket" AND $menu!=="kategori" AND $menu!=="produk" AND $menu!=="galeri" AND $menu!=="testimoni" AND $menu!=="pengaturan"){echo "style='display: block;'";} else {echo "style='display: none;'";} ?> >
        <li class="<?php if($menu=="kategori_blog"){echo "active";} ?>">
          <a href="<?php echo base_url("admin/kategori-blog"); ?>"><i class="zmdi zmdi-tag-more color"></i> Kategori Blog</a>
        </li>
        <li class="<?php if($menu=="blog"){echo "active";} ?>">
          <a href="<?php echo base_url("admin/blog"); ?>"><i class="zmdi zmdi-blogger color"></i> Blog</a>
        </li>
      </ul>
    </li>

    <li class="<?php if($menu=="galeri"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/galeri"); ?>"><i class="zmdi zmdi-image color"></i> Galeri</a>
    </li>

    <li class="<?php if($menu=="testimoni"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/testimoni"); ?>"><i class="zmdi zmdi-comment-text color"></i> Testimoni</a>
    </li>

    <li class="<?php if($menu=="pengaturan"){echo "active";} ?>">
      <a href="<?php echo base_url("admin/pengaturan"); ?>"><i class="zmdi zmdi-settings color"></i> Pengaturan</a>
    </li>

  </ul>

</aside>