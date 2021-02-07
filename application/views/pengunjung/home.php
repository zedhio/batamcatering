<main><section class="section hero"><div class="container"><h2 class="text-hide">Promo</h2><div class="row"><div class="col-lg-9 col-12"><div id="sync1" class="owl-carousel owl-theme hero-slider__main"><?php foreach ($banner as $key => $value): ?><figure><img class="item" src="<?php echo base_url("assets/img/banner/".$value['cover']); ?>" alt="<?php echo $value['nama_banner']; ?>" /><figcaption class="text-hide"><?php echo $value['nama_banner']; ?></figcaption></figure><?php endforeach ?></div></div><div class="col-md-3 d-none d-lg-block pl-1"><div id="sync2" class="owl-carousel owl-theme hero-slider__side"><?php foreach ($banner as $key => $value): ?><img class="item" src="<?php echo base_url("assets/img/banner/".$value['cover']); ?>" alt="<?php echo $value['nama_banner']; ?>" /><?php endforeach ?></div></div></div></div></section><section class="section box-layanan"><div class="container"><header class="section-header"><h2 class="section-title">Layanan Katering</h2></header><main class="section-body"><ul class="row justify-content-between list-unstyled text-center box-layanan__list"><?php foreach ($kategori as $key => $value): ?><li class="col-lg-3 col-6"><a href="<?php echo base_url("/menu/".$value['url_kategori']); ?>"><img class="img-fluid" src="<?php echo base_url("assets/img/kategori/".$value['cover']); ?>" alt="<?php echo $value['nama_kategori']; ?>" /><p style="color: black;"><?php echo $value['nama_kategori']; ?></p></a></li><?php endforeach ?></ul></main></div></section><section class="section featured-product"><div class="container"><header class="section-header"><h2 class="section-title">Produk Unggulan</h2><a href="<?php echo base_url("/produk-unggulan"); ?>">Lihat Semua</a></header><main class="section-body"><div class="row"><?php foreach ($produk as $key => $value): ?><div class="col-lg-4 col-md-6"><article class="featured-product__item"><img class="img-fluid featured-product__item-image" src="<?php echo base_url("assets/img/produk/".$value['foto'][0]['nama_produk']); ?>" alt="<?php echo $value['judul']; ?>" /><div class="img-fluid featured-product__item-description"><h3><a href="<?php echo base_url("/produk-unggulan/detail/".$value['url_produk']); ?>"><?php echo $value['judul']; ?></a></h3><p><?php echo strip_tags(substr($value['deskripsi'], 0, 150)); ?>...</p><a href="<?php echo base_url("/produk-unggulan/detail/".$value['url_produk']); ?>">Lihat Detail</a></div></article></div><?php endforeach ?></div></main></div></section><section class="section blog"><div class="container"><header class="section-header"><h2 class="section-title">Blog Terbaru</h2><a href="">Lihat Semua</a></header><main class="section-body"><div class="row"><?php foreach ($blog as $key => $value): ?><?php if ($value['status']==1): ?><div class="col-lg-3 col-md-6 blog__item"><article><a href="<?php echo base_url("/blog/detail/".$value['url_blog']); ?>"><img class="img-fluid blog__item-image" src="<?php echo base_url("assets/img/blog/".$value['foto']); ?>" alt="<?php echo $value['judul']; ?>" style="min-height: 220px;" /></a><h3 style="min-height: 60px;"><a href="<?php echo base_url("/blog/detail/".$value['url_blog']); ?>"><?php echo $value['judul']; ?></a></h3><p class="d-flex justify-content-between"><span class="blog__item-author"><i class="fas fa-user mr-1"></i> Admin</span><time class="blog__item-date"><?php echo date('d-m-Y', strtotime($value['tgl_post'])); ?></time></p></article></div><?php endif ?><?php endforeach ?></div></main></div></section><section class="section testimonial"><div class="container"><header class="section-header"><h2 class="section-title">Testimonial</h2></header><main class="section-body owl-carousel owl-theme testimonial__slider"><?php foreach ($testimoni as $key => $value): ?><div class="testimonial__item"><article><!-- hidden --><h3 class="text-hide">Testimoni dari <?php echo $value['nama']; ?></h3><p class="testimonial__item-text">"<?php echo strip_tags($value['testimoni']); ?>"</p><footer class="testimonial__author"><img class="img-fluid testimonial__author-image" src="<?php echo base_url("assets/img/testimoni/".$value['foto']); ?>" alt="Foto <?php echo $value['nama']; ?>" /><div class="testimonial__author-info" style="padding: 15px;"><h4><?php echo $value['nama']; ?></h4><span><?php echo $value['jabatan']; ?></span></div></footer></article></div><?php endforeach ?></main></div></section><section class="section yt-player mb-5"><div class="container"><header class="section-header d-none"><h3 class="section-title">Video Profile</h3></header><main class="section-body"><iframe class="yt-player__iframe" src="https://www.youtube.com/embed/dBIYTOyASEs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></main></div></section></main>