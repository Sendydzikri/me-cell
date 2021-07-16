const flashData = $('.flash-data').data('flashdata');
const statLogin = $('.login').data('flashdata');




if(statLogin){
	Swal.fire(

		'Login Berhasil !',
		'Selamat Datang ' + statLogin,
		'success'

	);	
}

if(flashData){

	Swal.fire(

		'Berhasil Ditambahkan!',
		'Sudah Dimasukan Kedalam Keranjang !',
		'success'

	);
}



