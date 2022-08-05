<template>
	<span>
		<!-- <div v-if="$store.state.isSearch" id="loading">
        <img id="loading-image" src="assets/images/Tag-For-Loading-Bar-Gif-Transparent-Loading-Gif-.gif" alt="Loading..." />
    </div> -->
		<div class="page_block"></div>
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
					data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
					data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
					data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<router-link to="/">
							<img alt="Logo" src="http://localhost:8000/assets/media/logos/logo-1-dark.svg"
								class="h-25px logo" />
						</router-link>

						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
							data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
							data-kt-toggle-name="aside-minimize">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
							<span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none">
									<path opacity="0.5"
										d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
										fill="currentColor" />
									<path
										d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
										fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Aside toggler-->
					</div>

					<div class="aside-menu flex-column-fluid">

						<router-link v-for="route in $router.options.routes" :key="route.path"
							:to="route.children && route.children.length > 0 ? '' : route.path">
							<div class="hover-scroll-overlay-y my-5 my-lg-5">
								<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
									id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion"
										:class="($route.name === route.name) ? 'here show' : ''">
										<span class="menu-link">
											<span class="menu-icon">
												<span class="svg-icon svg-icon-2" v-html="route.meta.icon"></span>
											</span>
											<span class="menu-title">{{ route.meta.menuName }}</span>
											<span v-if="route.children && route.children.length > 0"
												class="menu-arrow"></span>
										</span>
										<div v-if="route.children && route.children.length > 0" class="menu-sub
											menu-sub-accordion menu-active-bg">
											<div class="menu-item">
												<router-link v-for="child in route.children" :key="child.path"
													:to="route.path + '/' + child.path" class="menu-link active">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">{{ child.meta.menuName }}</span>
												</router-link>
											</div>
										</div>
									</div>
								</div>
							</div>
						</router-link>

					</div>

				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" style="" class="header align-items-stretch">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Aside mobile toggle-->
							<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
									id="kt_aside_mobile_toggle">
									<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none">
											<path
												d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
												fill="currentColor" />
											<path opacity="0.3"
												d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
												fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
							</div>
							<!--end::Aside mobile toggle-->
							<!--begin::Mobile logo-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="../../demo1/dist/index.html" class="d-lg-none">
									<img alt="Logo" src="assets/media/logos/logo-2.svg" class="h-30px" />
								</a>
							</div>

							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">

								<div class="d-flex align-items-stretch" id="kt_header_nav">

									<div class="header-menu align-items-stretch" data-kt-drawer="true"
										data-kt-drawer-name="header-menu"
										data-kt-drawer-activate="{default: true, lg: false}"
										data-kt-drawer-overlay="true"
										data-kt-drawer-width="{default:'200px', '300px': '250px'}"
										data-kt-drawer-direction="end"
										data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
										data-kt-swapper-mode="prepend"
										data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

										<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
											id="#kt_header_menu" data-kt-menu="true">
											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
												class="menu-item here show menu-lg-down-accordion me-lg-1">
												<span class="menu-link py-3">
													<span class="menu-title">Dashboards</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
											</div>

										</div>
										<!--end::Menu-->
									</div>
									<!--end::Menu wrapper-->
								</div>

								<div class="d-flex align-items-stretch flex-shrink-0">

									<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
										<!--begin::Menu wrapper-->
										<div class="cursor-pointer symbol symbol-30px symbol-md-40px"
											data-kt-menu-trigger="click" data-kt-menu-attach="parent"
											data-kt-menu-placement="bottom-end">
											<img src="http://localhost:8000/assets/media/avatars/300-1.jpg"
												alt="user" />
										</div>
										<!--begin::User account menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
											data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content d-flex align-items-center px-3">
													<!--begin::Avatar-->
													<div class="symbol symbol-50px me-5">
														<img alt="Logo"
															src="http://localhost:8000/assets/media/avatars/300-1.jpg" />
													</div>
													<!--end::Avatar-->
													<!--begin::Username-->
													<div class="d-flex flex-column">
														<div class="fw-bolder d-flex align-items-center fs-5">{{
																$store.state.authUser?.name
														}}
															<span
																class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
														</div>
														<a href="#"
															class="fw-bold text-muted text-hover-primary fs-7">{{
																	$store.state.authUser?.email
															}}</a>
													</div>
													<!--end::Username-->
												</div>
											</div>

											<div class="menu-item px-5">
												<router-link to="/profile" class="menu-link px-5">Profile</router-link>
											</div>

											<div class="menu-item px-5">
												<a @click="logout" href="javascript::void()" class="menu-link px-5">Sign
													Out</a>
											</div>

											<!-- <div class="separator my-2"></div> -->

										</div>

									</div>
									<!--end::User menu-->
									<!--begin::Header menu toggle-->
									<div class="d-flex align-items-center d-lg-none ms-2 me-n3"
										title="Show header menu">
										<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
											id="kt_header_menu_mobile_toggle">
											<!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
											<span class="svg-icon svg-icon-1">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
													viewBox="0 0 24 24" fill="none">
													<path
														d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
														fill="currentColor" />
													<path opacity="0.3"
														d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
														fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->
										</div>
									</div>
									<!--end::Header menu toggle-->
								</div>
								<!--end::Toolbar wrapper-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
									data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
									class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1 text-capitalize">
										{{ $route.meta.title ? $route.meta.title : '' }}
										<span class="h-20px border-1 border-gray-200 ms-3 mx-2 me-1"></span>
									</h1>

								</div>

							</div>
						</div>

						<div class="post d-flex flex-column-fluid" id="kt_post">

							<div id="kt_content_container" class="container-xxl">

								<router-view></router-view>

							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>


	</span>
</template>

<script>

export default {

	methods: {
		async logout() {
			let res = await this.callApi('get', '/logout');
			if (res.status == 200) {
				window.location.href = "/";
			}
		},
		redirect(url) {
			this.$router.push(url);
		}
	},
	created() {

		// console.log(this.$router.options.routes)
	},
}

</script>

<style>
#loading {
	position: fixed;
	display: block;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	text-align: center;
	opacity: 0.7;
	background-color: #fff;
	z-index: 99;
}

#loading-image {
	position: absolute;
	top: 50% !important;
	left: 50% !important;
	z-index: 100;
	width: 150px !important;
}

.v-enter-active,
.v-leave-active {
	transition: opacity 0.8s ease;
}

.v-enter-from,
.v-leave-to {
	opacity: 0;
}

.no_data {
	display: block;
	text-align: center;
	padding: 30px;
}

.no_data h2 {
	font-size: 20px;
	font-weight: 500;
	color: #afb4b7;
}
</style>

