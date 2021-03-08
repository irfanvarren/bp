<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="container-fluid p-0">
					<img src="/img/member-les/background.jpg" class="img-fluid img-responsive" style="width:100%;">
				</div>
				<div class="container ">
					<div class="row">
						<div class="col-md-12">
							<swiper ref="mySwiper" :options="swiperOptions">
								<!-- @foreach($roles as $key => $role)
								<swiper-slide>
									<img class="mx-auto desktop" src="{{asset('img/member-les').'/'.strtolower($role->roles).'.jpg'}}">
									<img class="mx-auto mobile" src="{{asset('img/member-les').'/'.strtolower($role->roles).'-mobile.png'}}">
									<div class="role-desc-wrapper">
										@if(auth()->user()->member_role_id == $role->id)
										<div class="role-desc">
											<div class="left">
												<h1 class="m-0"><strong>{{$role->roles}}</strong></h1>
												<h5><strong>Membership saat ini</strong></h5>
											</div>
											<div class="right">
												<div>Transaksi x lagi</div>
												<div>Transaksi Rp.0,00 lagi</div>
											</div>
										</div>
										@else
										<div class="role-desc">
											<div class="left">
												<h1 class="m-0"><strong>{{$role->roles}}</strong></h1>
												<h5><strong>Masih terkunci</strong></h5>
											</div>
											<div class="right">
												<div class="locked">
													<span><i class="fas fa-lock"></i> Masih terkunci</span> <button class="btn btn-primary">Eksplor</button>
												</div>
											</div>
										</div>
										@endif
									</div>
								</swiper-slide>
								@endforeach -->
							</swiper>
						</div>
					</div>
					
				</div>
			</div>
			<div class="position-fixed fixed-bottom w-100 member-menu">
				<div class="d-flex">
					<button class="w-100 member-btn">
						<i class="fas fa-store"></i> Merchant
					</button>
					<button class="w-100 member-btn">
						<i class="fas fa-tags"></i> Promo
					</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import { Swiper, SwiperSlide, directive } from 'vue-awesome-swiper'
	
	import 'swiper/swiper.scss'

	export default {
		components: {
			Swiper,
			SwiperSlide
		},
		data() {
			return {
				swiperOptions: {
					slidesPerView:'auto',
					centeredSlides: true,
					spaceBetween: 0,
					loop:false,
					pagination:false,
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
					breakpoints:{
						0:{
							spaceBetween:30
						}
					}
				}
			}
		},
		computed: {
			swiper() {
				return this.$refs.mySwiper.$swiper
			}
		},
		mounted() {
			console.log('Merchant Component mounted.');
		},
		methods: {

		}
	}
</script>
