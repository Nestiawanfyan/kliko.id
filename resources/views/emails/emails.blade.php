<div style="background: #fafafa; padding: 0px 25px;\">
	<div style="background: #fff; color: #444;\">
		<div style="padding:25px 20px 10px; background: #025aa5; border-bottom: 1px solid #fafafa; color: #FFF;\">
			<h3><a href="".kost_domain()."\" style="font-size: 25px; text-transform: uppercase; text-decoration:none; color: #FFF;\">Kliko</a></h3>
		</div>
		<div style="padding: 20px; border-bottom: 1px solid #fafafa;\">
			<h4 style="text-decoration: none; color:#444; font-size:18px;\">Selamat Datang di Kliko</h4>
			<p><strong>Kliko</strong> merupakan situs yang menyediakan layanan informasi seputar kos-kosan di wilayah Bandar Lampung dan sekitarnya. Anda bisa memasang iklan gratis di Kliko.</p>
		</div>
		<div style="padding: 20px; border-bottom: 1px solid #fafafa;\">
			<p>Terima kasih sudah menggunakan layanan kami untuk memasang iklan Kos/Asrama Anda. Tinggal selangkah lagi untuk dapat menampilkan informasi yang Anda berikan di situs <a href="http://www.kliko.id">Kliko.id</a> Anda harus memverifikasi email Anda dengan mengklik tombol di bawah ini.</p>
				<a href="{{ route('email.verification') }}?username={{ $username }}&&code={{$code}}" style="display: inline-block; padding: 10px 20px; border-radius: 3px; background: #025aa5; color: #FFF; font-weight: 600; font-size: 25px; text-decoration: none;\">Verifikasi</a>
				<p>--- Atau ---</p>
				<a href="{{ route('email.verification') }}?username={{ $username }}&&code={{$code}}" style="display: inline-block; padding: 10px 20px; border-radius: 3px; background: #025aa5; color: #FFF; font-weight: 600; font-size: 25px; text-decoration: none;\">{{ route('email.verification') }}?username={{ $username }}&&code={{$code}}</a>
		</div>
		<div style="padding: 20px; font-size: 12px; border-bottom: 1px solid #fafafa;\">
			<p style="font-size: 10px;\">Copyright &copy; 2016 <a href="http://www.kliko.id">kliko.com</a>. All Rights Reserved</p>
		</div>
	</div>
</div>
