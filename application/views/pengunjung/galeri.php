<main>
	<section class="page">
		<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="<?php echo base_url(""); ?>">Beranda</a>
					</li>
					<li class="breadcrumb-item active">Galeri</li>
				</ol>
			</nav>
			<div class="page-content">
				<div class="filter">
					<form method="GET">
						<div class="row">
							<div class="col-lg-3 col-12">
								<div class="form-group row">
									<label for="tanggal_awal" class="col-2 col-form-label">Filter</label>
									<div class="col-lg-8 col-12">
										<input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="<?php echo $this->input->get('tanggal_awal') ?>" />
									</div>
									<div class="col-lg-2 col-12 pl-3 mb-n3 mt-2 mt-md-0 pl-md-0">hingga</div>
								</div>
							</div>
							<div class="col-lg-2 col-12">
								<input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?php echo $this->input->get('tanggal_akhir') ?>" />
							</div>
							<div class="col-lg-2 col-12 mt-lg-0 mt-2 text-left">
								<button type="submit" class="btn btn-secondary">Cari</button>
								<?php if (!empty($this->input->get('tanggal_awal'))): ?>
									<a href="<?php echo base_url('galeri') ?>" class="btn btn-secondary">Reset</a>
								<?php endif ?>
							</div>
						</div>
					</form>
				</div>
				<div class="kartu-wrapper">
					<ul class="kartu__list row">
						<?php foreach ($galeri as $key => $value): ?>
							<li class="col-lg-4 col-sm-6 col-12">
								<div class="kartu__list-item" style="min-height: 350px;">
									<img class="img-fluid galeri-image kartu__list-item-image" src="<?php echo base_url("assets/img/galeri/".$value['foto']); ?>" alt="<?php echo $value['event']; ?>" />
									<div class="kartu__list-item-info">
										<h3><?php echo $value['event']; ?></h3>
										<div class="d-flex justify-content-between">
											<span style="line-height: 20px"><?php echo $value['alamat']; ?></span>
											<time class="blog__item-date" style="font-size: 13px; min-width: 80px; text-align: right; margin-left: 10px"><?php echo date('d-m-Y', strtotime($value['tgl_event'])); ?></time>
										</div>
									</div>
								</div>
							</li>
						<?php endforeach ?>
						<?php if (empty($galeri)): ?>
							<li class="col-lg-4 col-sm-6 col-12">
								<p>Foto Galeri tidak ada pada tanggal ini.</p>
							</li>
						<?php endif ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
</main>