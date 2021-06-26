<div class="row footer-bottom">
	<div class="col-md-12" style="float:left;width:100%;">
		<div class="row">


			<div id="copyright text-right" class="col-md-5 copyright-left">Copyright © 2019 All rights reserved | Best Partner Education</div>
			<div class="col-md-7 copyright-right">
				<nav class="copyright-nav">

					<a href="{{url('copyrights')}}">Copyrights</a>
					<a href="{{url('term_and_use')}}">Term & Use</a>
					<a href="{{url('privacy_and_policy')}}">Privacy & policy</a>
					<a href="{{url('disclaimer')}}">Disclaimer</a>
				</nav>

			</div>
		</div>
		<div id="copyright text-right" class="col-md-6 copyright-left-mobile">
			@auth
			@if(!session()->has('online_test'))
			<script type="text/javascript">
				let cartEvt = new EventSource("{{url('/getCartEvent')}}", {withCredentials: true});
				cartEvt.onmessage = function (e) {
					let items = JSON.parse(e.data);	
					if(items.length != cart_count){
						render_cart(items);
						cart_count = items.length;
					}
				};

				function render_cart(items){
					var cart_items_output = "";
					var total_qty = 0;
					var total_prices = 0;
					for(var i = 0;i < items.length;i++){
						cart_items_output += '<div class="row py-3">' +
						'<div class="d-flex cart-img">';
						if(typeof items[i].img != "undefined"){

						}else{
							cart_items_output += '<div class="text-center cart-img-alt-icon"><i class="fa fa-book" aria-hidden="true"></i></div>';
						}
						cart_items_output += '</div>' +
						'<div class="d-block cart-info">' +
						'<div class="item-name">'+items[i].NAMA_PAKET+'</div>' +
						'<div class="item-code">('+items[i].REF_PAKET+items[i].REF_LEVEL+' - '+ items[i].REF_KATEGORI +')</div>' +
						'<div>'+ formatRupiah(items[i].HARGA_PAKET,"Rp.") + '</div>' +
						'</div>' +
						'<div class="d-flex cart-right text-right"> Qty : ' + items[i].qty + '</div>' +
						'</div>';
						total_qty += items[i].qty;
						total_prices += parseInt(items[i].HARGA_PAKET);				
					}
					$('#cart-tooltip-items').html(cart_items_output);
					$('#item-count-summary').html(total_qty);
					var cart_icon_output = '<i class="fa fa-shopping-cart" style="font-size:34px;vertical-align: middle;position: relative;" aria-hidden="true"></i> <div class="cart-count" id="cart-count" style="font-size:';
					if(total_qty >= 10){
						cart_icon_output += '10';
					}else{
						cart_icon_output += '13';
					}
					cart_icon_output += 'px"> ';
					if(total_qty >= 99){
						cart_icon_output += '99+';
					}else{ 
						cart_icon_output += total_qty
					}
					cart_icon_output += '</div>';
					$('#cart-icon-link').html(cart_icon_output);
					$('#item-price-summary').html(formatRupiah(total_prices));
					$('.cart-summary').show();
				}

				function formatRupiah(angka, prefix) {

		//var number_string = angka.replace(/[^,\d]/g, '').toString();

		var number_string = angka.toString();
		var split = number_string.split('.');
		var sisa = split[0].length % 3;
		var rupiah = split[0].substr(0, sisa);
		var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah + ',00';
		return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
	}
</script>
@endif
@endauth
<script language="JavaScript">
	<!--
		function y2k(number) { return (number < 1000) ? number + 1900 : number; }
		var today = new Date();
		var year = y2k(today.getYear());
		document.write('© '+year+' Best Partner Education - All Rights Reserved');
//-->
</script>

</div>
</div>	
</div>

