<main><section class="page"><div class="container"><nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="">Beranda</a></li><li class="breadcrumb-item active">Paket</li></ol></nav><div class="page-content"><div class="row"><div class="col-lg-11 mx-auto"><!-- Paket Tab Utama --><ul id="paketTab" class="paket nav row" role="tablist"><?php foreach ($paket as $key => $value): ?><li class="col-lg-4 col-12 pl-3 mb-n3 mt-2 mt-md-0 pl-md-0 nav-item"><div class="paket-selector nav-link <?php if($key==0){echo "active";} ?>" id="paket-<?php echo $key+1; ?>-tab" data-toggle="tab" href="#paket-<?php echo $key+1; ?>" role="tab"><img class="img-fluid paket-selector__image" src="<?php echo base_url("assets/img/paket/".$value['cover']); ?>" alt="Paket Aqiqah"><div class="paket-selector__name"><?php echo $value['nama_paket']; ?></div></div></li><?php endforeach ?></ul><!-- akhir #Paket Tab Utama --></div></div><!-- Konten Paket Tab Utama --><div class="tab-content" id="paketTabContent"><?php foreach ($paket as $key => $value): ?><div class="tab-pane fade show <?php if($key==0){echo "active";} ?>" id="paket-<?php echo $key+1; ?>" role="tabpanel"><!-- sub paket tab <?php echo $key+1 ?> --><ul class="nav nav-pills subpaket" id="subPaketTab" role="tablist"><?php foreach ($value['sub_paket'] as $kunci => $nilai): ?><li class="pl-3 mb-n3 mt-2 mt-md-0 pl-md-0 nav-item"><a class="nav-link <?php if($kunci==0){echo "active";} ?>" id="subpaket-<?php echo $key+1; ?>-<?php echo $kunci+1; ?>-tab" data-toggle="tab" href="#subpaket-<?php echo $key+1; ?>-<?php echo $kunci+1; ?>" role="tab"><?php echo $nilai['judul']; ?></a></li><?php endforeach ?></ul><!-- akhir #sub paket tab <?php echo $key+1 ?> --><!-- konten #sub paket tab <?php echo $key+1 ?> --><div class="tab-content"><?php foreach ($value['sub_paket'] as $kunci => $nilai): ?><div class="tab-pane <?php if($kunci==0){echo "active";} ?>" id="subpaket-<?php echo $key+1; ?>-<?php echo $kunci+1; ?>" role="tabpanel"><div class="row"><div class="col-lg-6"><?php echo $nilai['deskripsi'] ?></div><div class="col-lg-6"><div class="row justify-content-end"><?php foreach ($nilai['foto_sub'] as $foto): ?><?php if ($foto['nama_cover']!=="default.png"): ?><div class="col-lg-3 col-4 justify-content-center"><img class="img-fluid" src="<?php echo base_url('assets/img/sub_paket/' . $foto['nama_cover']) ?>" style="border-radius: 10px; border: 1px solid #BF9F61; min-height: 90px;"></div><?php endif ?><?php endforeach ?></div></div></div></div><?php endforeach ?></div><!-- akhir konten #sub paket tab <?php echo $key+1 ?> --></div><?php endforeach ?></div><!-- ./Konten Paket Tab Utama --></div></section></main>