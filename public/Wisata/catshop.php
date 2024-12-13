<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="assets/lambang.png" />
	<title>Home</title>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />


	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
	<div class="container">
		<header>
			<nav>
				<div class="logo">
					<img src="assets/DER1.jpg.png" alt="" />
				</div>
				<input type="checkbox" id="click" />
				<label for="click" class="menu-btn">
					<i class="fas fa-bars"></i>
				</label>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Wisata</a></li>
					<li><a href="login.php" class="btn_login">Login</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<div class="jumbotron">
				<div class="jumbotron-text">
					<h1>Destinasi Wisata Sumba Timur</h1>
					<p> Ayo jelajahi Pulau Terindah Sekarang!
					</p>
					<button type="button" class="btn_getStarted">Get Started</button>
				</div>
				<div class="jumbotron-img">
					<img src="assets/DER1.jpg" alt="" />
				</div>
			</div>
			<div class="cards-categories">
				<h2>Wisata</h2>
				<div class="card-categories">
					<div class="card">
						<div class="card-image">
							<img src="assets/DER2.jpg" alt="gambar tidak ditemukan" />
						</div>
						<div class="card-content">
							<h5>Sunset Pantai Salura</h5>
							<p class="description">Gambar diatas merupakan fenomena sunset dari pantai 
							    prai-salura yang terletak di sumba paling selatan kabupaten Sumba Timur, NTT.</p>
							<p class="price"><span>Rp.</span>50,000</p>
							<button class="btn_belanja" type="submit" onclick="bukaModal('Anggora')">Beli</button>
						</div>
					</div>
					<div class="card">
						<div class="card-image">
							<img src="assets/DER4.jpg"  alt="gambar tidak ditemukan" />
						</div>
						<div class="card-content">
							<h5>Pantai Pulau Salura</h5>
							<p class="description">Pantai Pulau Salura dikenal dengan pantai yang 
								sangat indah dengan warna pantai yang khas dan jernih disertai pasir putih yang halus.</p>
							<p class="price"><span>Rp.</span>50,000</p>
							<button class="btn_belanja" type="submit" onclick="bukaModal('Persia')">Beli</button>
						</div>
					</div>
					<div class="card">
						<div class="card-image">
							<img src="assets/DER5.jpg"  alt="gambar tidak ditemukan" />
						</div>
						<div class="card-content">
							<h5>Kambaniru Hotel</h5>
							<p class="description">Resort yang mengangkat budaya sumba dengan
								 tema bangunan tradisional, terletak di tengah alam yang indah. </p>
							<p class="price"><span>Rp.</span>50,000</p>
							<button class="btn_belanja" type="submit"
								onclick="bukaModal('British Shorthair')">Beli</button>
						</div>
					</div>
				</div>

			</div>
			<!--  Modal -->
			<div id="myModal" class="modal-container" onclick="tutupModal()">
				<div class="modal-dialog" onclick="event.stopPropagation()">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title " style="color:  #ffb72b;">Formulit Pembayaran</h1>
							<button type="button" class="btn-close" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label class="labelmodal" for="recipient-name" class="col-form-label">Nama :</label>
									<input class="inputdata" type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label class="labelmodal" for="handphone" class="col-form-label">No. Hp :</label>
									<input class="inputdata" type="text" class="form-control" id="handphone">
								</div>
								<div class="form-group">
									<label class="labelmodal" for="alamat-text" class="col-form-label">Alamat:</label>
									<textarea class="inputalamat" class="form-control" id="alamat-text"></textarea>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" onclick="tutupModal()">Keluar</button>
							<button type="button" class="btn btn-yellow" onclick="bukaModal2()">Lanjutkan</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal 2 -->
			<div id="myModal2" class="modal-container" onclick="tutupModal2()">
				<div class="modal-dialog" onclick="event.stopPropagation()">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title" style="color:  #ffb72b;">Data Transaksi</h1>
							<button type="button" class="btn-close" aria-label="Close" onclick="tutupModal2()"></button>
						</div>
						<div class="modal-body">
							<form>
								<h4> Kategori</h4>
								<div class="form-group">
									<label class="labelmodal" for="detail-kategori" class="col-form-label">Kategori
										:</label>
									<input class="inputdata" type="text" class="form-control" id="detail-kategori"
										disabled>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-harga" class="col-form-label">Harga :</label>
									<input class="inputdata" type="text" class="form-control" id="detail-harga"
										disabled>
								</div>
								<h4>Pembeli</h4>
								<div class="form-group">
									<label class="labelmodal" for="detail-nama" class="col-form-label">Nama :</label>
									<input class="inputdata" type="text" class="form-control" id="detail-nama" disabled>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-nomorhp" class="col-form-label">No. Hp
										:</label>
									<input class="inputdata" type="text" class="form-control" id="detail-nomorhp"
										disabled>
								</div>
								<div class="form-group">
									<label class="labelmodal" for="detail-alamat" class="col-form-label">Alamat:</label>
									<textarea class="inputalamat" class="form-control" id="detail-alamat"
										disabled></textarea>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" onclick="kembaliKeModalPertama()">Kembali</button>
							<button type="button" class="btn btn-yellow" onclick="lakukanPembayaran()">Lakukan
								Pembayaran</button>
						</div>
					</div>
				</div>
			</div>

		</main>
		<footer>
			<h4>&copy; Lab Pemrograman Komputer 2024</h4>
		</footer>
	</div>
	<script>
		// Fungsi Modal
		function bukaModal(kategori) {
			document.getElementById("myModal").style.display = "flex";

			document.getElementById("kategori-detail").innerText = "Detail " + kategori;

			document.getElementById("nama").value = "";
			document.getElementById("nomorhp").value = "";
			document.getElementById("alamat").value = "";
		}

		function tutupModal() {
			document.getElementById("myModal").style.display = "none";
		}

		function tutupModal2() {
			document.getElementById("myModal2").style.display = "none";
		}
		function bukaModal2() {
			tutupModal(); // Tutup modal pertama
			document.getElementById("myModal2").style.display = "flex";

			var nama = document.getElementById("recipient-name").value;
			var nomorhp = document.getElementById("handphone").value;
			var alamat = document.getElementById("alamat-text").value;

			document.getElementById("detail-nama").value = nama;
			document.getElementById("detail-nomorhp").value = nomorhp;
			document.getElementById("detail-alamat").value = alamat;
		}
		function kembaliKeModalPertama() {
			tutupModal2();
			bukaModal();
		}
		function lakukanPembayaran() {
			alert("Pembayaran berhasil!");
			tutupModal2();
		}

	</script>
</body>

</html>
