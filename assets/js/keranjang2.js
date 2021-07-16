
const statKuota = $('.transaksiKuota').data('flashdata');
const kurang = $('.kurang').data('flashdata');
const checkoutBerhasil = $('.checkoutBerhasil').data('flashdata');





if(statKuota){
	Swal.fire(

		'Berhasil Membeli Kuota !',
		'Sudah Berhasil Melakukan Pembelian !',
		'success'

	);
}

if(kurang){
	Swal.fire(

		'Transaksi Gagal !',
		'Gagal ' + kurang,
		'error'

	);
}

if(checkoutBerhasil){
	Swal.fire(

		'Transaksi Berhasil !',
		 checkoutBerhasil,
		'success'

	);
}


