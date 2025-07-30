<div class="d-flex flex-column flex-lg-row mt-5 mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="fa-regular fa-user icon-title"></i>
        <h3>Produk</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://pustakakoding.com/" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="?halaman=data" class="text-dark text-decoration-none">Produk</a></li>
                <li class="breadcrumb-item" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<?php
// mengecek data GET "id"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol detail
    $id = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "produk" berdasarkan "id"
    $query = $mysqli->query("SELECT * FROM produk WHERE id='$id'")
                             or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
    // ambil data hasil query
    $data = $query->fetch_assoc();
}
?>

<div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <!-- judul form -->
    <div class="alert alert-primary rounded-4 mb-5" role="alert">
        <i class="fa-solid fa-list-ul me-2"></i> Detail Data Produk
    </div>
    <!-- tampilkan data -->
    <div class="d-flex flex-column flex-xl-row">
        <div class="flex-shrink-0 text-center mb-5 mb-xl-0">
            <!-- <div class="foto-profil-detail">
                <img src="images/<?php echo $data['foto_profil']; ?>" class="border border-2 img-fluid rounded-4 shadow" alt="Foto Profil" width="240" height="240">
            </div> -->
        </div>
        <div class="flex-grow-1 text-muted fw-light ms-xl-5">
            <div class="table-responsive">
                <table class="table table-striped lh-lg">
                    <tr>
                        <td width="200">ID Produk</td>
                        <td width="10">:</td>
                        <td><?php echo $data['id']; ?></td>
                    </tr>
                    <!-- <tr>
                        <td>Tanggal Daftar</td>
                        <td>:</td>
                        <td><?php echo tanggal_indo($data['tanggal_daftar']); ?></td>
                    </tr> -->
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $data['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><?php echo $data['price']; ?></td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td>:</td>
                        <td><?php echo $data['stock']; ?></td>
                    </tr>
                    <tr>
                        <td>Formula</td>
                        <td>:</td>
                        <td><?php echo $data['formula']; ?></td>
                    </tr>
                    <!-- <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $data['email']; ?></td>
                    </tr>
                    <tr>
                        <td>WhatsApp</td>
                        <td>:</td>
                        <td><?php echo $data['whatsapp']; ?></td>
                    </tr> -->
                </table>
            </div>
            

		<div class="muka">

            <?php
            if ($data['formula'] == 'unit') { ?>
                <label for="nama">Quantity:</label>
                <input class="bilangan1" type="text" value="<?php echo $data['stock']; ?>"></input>
                <br>
                <label for="nama4">Price:</label>
                <input class="bilangan2" type="text" value="<?php echo $data['price']; ?>"></input>
                <br>
                <button id="hitung">Hitung</button>

            <?php
            } else { ?>
                <label for="nama">Quantity:</label>
                <input class="bilangan1" type="text" value="<?php echo $data['stock']; ?>"></input>
                <br>
                <label for="nama2">Panjang:</label>
                <input class="bilangan2" type="text"></input>
                <br>
                <label for="nama3">Lebar:</label>
                <input class="bilangan3" type="text"></input>
                <br>
                <label for="nama4">Price:</label>
                <input class="bilangan4" type="text" value="<?php echo $data['price']; ?>"></input>
                <br>
                <button id="hitung4">Hitung</button>
            <?php } ?>
            </div>
            <div class="demo"></div>
        </div>
    </div>
    <div class="pt-4 pb-2 mt-5 border-top">
        <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
            <!-- button kembali ke halaman tampil data -->
            <a href="?halaman=data" class="btn btn-primary rounded-pill py-2 px-4">Kembali</a>
        </div>
    </div>
</div>


	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#hitung").click(function(e){
				e.preventDefault()
				var bilangan1 = parseInt($(".bilangan1").val()); 
				var bilangan2 = parseInt($(".bilangan2").val()); 
				// console.log(bilangan1);
				// console.log(bilangan2);
				function cek (){
					var hasil = (bilangan1 * bilangan2);	
					return hasil;
				}
				console.log(cek())
				var output = $(".demo");
				output.html(` Hasil dari kalkulator adalah = <strong>  ${cek()}   </strong>`)

			})

			$("#hitung4").click(function(e){
				e.preventDefault()
				var bilangan1 = parseInt($(".bilangan1").val()); 
				var bilangan2 = parseInt($(".bilangan2").val()); 
				var bilangan3 = parseInt($(".bilangan3").val()); 
				var bilangan4 = parseInt($(".bilangan4").val()); 
				// console.log(bilangan1);
				// console.log(bilangan2);
				function cek (){
                    var hasil = (bilangan1 * bilangan2 * bilangan3 * bilangan4);	
					return hasil;
				}
				console.log(cek())
				var output = $(".demo");
				output.html(` Hasil dari kalkulator adalah = <strong>  ${cek()}   </strong>`)

			})
		})
	</script>