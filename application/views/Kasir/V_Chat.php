<div class="scroll">
		<hr>
		<?php foreach($chat as $c){ ?>
			
				<div class="container mt-4 text-black">

					Dikirim Oleh : <b><?= $c['nama_pelanggan'] ?></b> <br> <br>
					<?= $c['isi'] ?>
					<br>
					<br>
					<?php if($c['tgl_chat'] == date('Y-m-d')){ $hari = " hari ini"; }else{$hari = $c['tgl_chat']; } ?>
					<b> Dikirim : </b> <?= $hari ?> <br>
					<button type="button" class="balas btn btn-primary" id="<?= $c['send_from'] ?>" style="color:white; background-color: black;" data-toggle="modal" data-target="#chat" > <i class="fa fa-comment fa-2x"></i> Balas Pesan </button>
					<hr>

				</div>
				
		<?php  } ?>
</div>




