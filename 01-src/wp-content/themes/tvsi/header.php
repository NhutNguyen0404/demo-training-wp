<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tvsi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
		  rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
		  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
		  crossorigin="anonymous">
	<link rel="stylesheet" href="<?= getPath('css/style.css') ?>">
	<title>TVSI Website</title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- include header -->
<!-- Desktop header -->
<header class="page-header js-page-header d-none d-lg-block">
	<div class="page-header-wrap">
		<div class="page-header-top">
			<div class="container-fluid px-120px">
				<div class="d-flex align-items-center justify-content-between flex-wrap">
					<div class="logo">
						<a href="index.html" title="logo">
							<img src="<?= getPath('./images/logo.png')?>" alt="logo image" class="img-fluid">
						</a>
					</div>
					<div class="page-menu-wrap">
						<div class="page-menu">
							<nav class="navbar navbar-expand">
								<ul class="navbar-nav">
									<li class="nav-item">
										<a class="nav-link" href="#">Về TVSI</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Quan hệ nhà đầu tư</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?= get_post_type_archive_link('news') ?>">Tin tức hoạt động</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Cơ hội nghề nghiệp</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="page-menu-right">
						<div class="page-language">
							<div id="lang_selector" class="language-dropdown">
								<label class="lang-flag lang-vi" title="Click to select the language">
									<span class="flag"></span>
								</label>
								<ul class="lang-list">
									<li class="lang lang-vi selected" title="Vietnamese">
										<span class="flag"></span>
									</li>
									<li class="lang lang-en" title="English">
										<span class="flag"></span>
									</li>
								</ul>
							</div>
							<img src="<?= getPath('./images/ic-caretdown-lang.svg')?>" alt="caret lang" class="js-language">
						</div>
						<div class="d-flex align-items-center justify-content-between">
							<div class="page-login">
								<a href="#">
									<img src="<?= getPath('./images/ic-login.svg')?>" alt="icon login">
									Đăng nhập
								</a>
							</div>
							<div class="phone-header">
								<a href="tel:19001885">
									<img src="<?= getPath('./images/ic-phone-red.svg')?>" alt="icon phone red">
									1900 1885
								</a>
							</div>
							<div class="open-account">
								<a href="#">MỞ TÀI KHOẢN</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid px-120px">
		<div class="row">
			<div class="col-12">
				<hr>
			</div>
		</div>
	</div>
	<div class="page-header-bottom">
		<div class="container-fluid px-120px">
			<div class="d-flex align-items-center justify-content-between flex-wrap mb-3 mb-xl-0">
				<div class="logo js-logo-fixed" style="display: none;">
					<a href="index.html" title="logo">
						<img src="<?= getPath('./images/logo.png')?>" alt="logo image" class="img-fluid">
					</a>
				</div>
				<div class="col8">
					<ul class="d-flex list-unstyled align-items-center justify-content-between mb-0 menu-bottom">
						<li class="nav-item">
							<a class="nav-link" href="#">Sản phẩm &amp; Dịch vụ</a>
							<div class="sub-menu">
								<div class="d-flex justify-content-between flex-wrap sub-menu-container">
									<div class="sub-menu-item">
										<h6 class="fw-bold text-uppercase">Đầu tư</h6>
										<ul class="list-unstyled text-start">
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Chứng khoán cơ sở
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Trái phiếu
												</a>
											</li>
										</ul>
									</div>
									<div class="sub-menu-item">
										<h6 class="fw-bold text-uppercase">Dịch vụ chứng khoán</h6>
										<ul class="list-unstyled text-start">
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Lưu ký chứng khoán
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Thực hiện quyền
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Đại lý đấu giá
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Quản lý sổ cổ đông
												</a>
											</li>
										</ul>
									</div>
									<div class="sub-menu-item">
										<h6 class="fw-bold text-uppercase">Dịch vụ tài chính</h6>
										<ul class="list-unstyled text-start">
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Cho vay GDKQ
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Ứng trước tiền bán
												</a>
											</li>
										</ul>
									</div>
									<div class="sub-menu-item">
										<h6 class="fw-bold text-uppercase">Tài chính doanh nghiệp</h6>
										<ul class="list-unstyled text-start">
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Nghiệp vụ thị trường vốn
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Nghiệp vụ thị trường nợ
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Nghiệp vụ ngân hàng đầu tư
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Trung tâm phân tích</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Biểu phí</a>
							<div class="sub-menu">
								<div class="d-flex justify-content-between sub-menu-container">
									<div class="sub-menu-item">
										<h6 class="fw-bold text-uppercase">Các loại phí dịch vụ</h6>
										<ul class="list-unstyled text-start">
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Biểu phí giao dịch chứng khoán
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Biểu phí giao dịch trái phiếu
												</a>
											</li>
											<li>
												<a href="#" title="">
													<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu">
													Biểu phí các dịch vụ khác
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Hỗ trợ</a>
						</li>
					</ul>
				</div>
				<div class="col4 mt-2 mt-xl-0">
					<div class="js-open-account" style="display: none;">
						<div class="d-flex align-items-center justify-content-end">
							<div class="phone-header">
								<a href="tel:19001885">
									<img src="<?= getPath('./images/ic-phone-red.svg')?>" alt="icon phone red">
									1900 1885
								</a>
							</div>
							<div class="open-account">
								<a href="#">MỞ TÀI KHOẢN</a>
							</div>
						</div>
					</div>
					<div class="page-header-bottom-right">
						<div class="d-flex justify-content-between align-items-center">
							<div class="menu-bottom-radio d-flex justify-content-between align-items-center">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="flexRadioDefault" id="radioStockCode" checked>
									<label class="form-check-label" for="radioStockCode">Mã chứng khoán</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="flexRadioDefault" id="radioNews">
									<label class="form-check-label" for="radioNews">Tin bài</label>
								</div>
							</div>
							<div class="page-search">
								<form>
									<input class="form-control" type="text" placeholder="Tìm kiếm" />
									<button class="btn text-white" type="submit">
										<img src="<?= getPath('./images/ic-search.svg')?>" alt="icon search">
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Mobile Menu -->
<nav class="navbar navbar-expand-lg fixed-top bg-white d-flex d-lg-none py-0" id="menuMobile">
	<div class="container">
		<div class="d-flex page-header justify-content-between align-items-center w-100" id="menubar">
			<div class="logo">
				<a href="index.html" title="logo">
					<img src="<?= getPath('./images/logo.png')?>" alt="logo image" class="img-fluid"/>
				</a>
			</div>
			<div class="open-account">
				<a href="#">MỞ TÀI KHOẢN</a>
			</div>
			<button data-toggle="collapse" data-target="#navbarResponsive" class="btn" aria-controls="navbarResponsive" aria-expanded="false">
				<img src="<?= getPath('./images/ic-menu-mb.svg')?>" alt="ic-menu-mb"/>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<div class="d-flex justify-content-between align-items-center">
				<button data-toggle="collapse" data-target="#navbarResponsive" class="btn" aria-controls="navbarResponsive" aria-expanded="false">
					<img src="<?= getPath('./images/ic-close-menu-mb.svg')?>" alt="icon close"/>
				</button>
				<div class="page-language">
					<div id="lang_selector--sp" class="language-dropdown">
						<label class="lang-flag lang-vi" title="Click to select the language">
							<span class="flag"></span>
						</label>
						<ul class="lang-list">
							<li class="lang lang-vi selected" title="Vietnamese">
								<span class="flag"></span>
							</li>
							<li class="lang lang-en" title="English">
								<span class="flag"></span>
							</li>
						</ul>
					</div>
					<img src="<?= getPath('./images/ic-caretdown-lang.svg')?>" alt="caret lang" class="js-language"/>
				</div>
			</div>
			<div class="page-search">
				<form>
					<input class="form-control" type="text" placeholder="Tìm kiếm"/>
					<button class="btn text-white" type="submit">
						<img src="<?= getPath('./images/ic-search.svg')?>" alt="icon search"/>
					</button>
				</form>
			</div>
			<div class="menu-bottom-radio d-flex align-items-center">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefaultMB" id="radioStockCodeMB" checked/>
					<label class="form-check-label" for="radioStockCodeMB">Mã chứng khoán</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefaultMB" id="radioNewsMb"/>
					<label class="form-check-label" for="radioNewsMB">Tin bài</label>
				</div>
			</div>
			<div class="mb-divided"></div>
			<div class="page-menu">
				<nav class="navbar navbar-expand">
					<ul class="navbar-nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="#">Về TVSI</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Quan hệ nhà đầu tư</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Tin tức hoạt động</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Cơ hội nghề nghiệp</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="mb-divided"></div>
			<ul class="nav navbar-nav" id="main-menu">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Sản phẩm & Dịch vụ</a>
					<ul class="dropdown-menu sub-menu-one">
						<li>
							<a class="dropdown-item" href="#">Đầu tư</a>
							<ul class="submenus dropdown-menu">
								<li>
									<a class="dropdown-item" href="index.html">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Chứng khoán cơ sở
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Trái phiếu
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="dropdown-item" href="#">Dịch vụ chứng khoán</a>
							<ul class="submenus dropdown-menu">
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Lưu ký chứng khoán
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Thực hiện quyền
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Đại lý đấu giá
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Quản lý sổ cổ đông
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="dropdown-item" href="#">Dịch vụ tài chính</a>
							<ul class="submenus dropdown-menu">
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Cho vay GDKQ
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Ứng trước tiền bán
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="dropdown-item" href="#">Tài chính doanh nghiệp</a>
							<ul class="submenus dropdown-menu">
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Nghiệp vụ thị trường vốn
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Nghiệp vụ thị trường nợ
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Nghiệp vụ ngân hàng đầu tư
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" href="#">Trung tâm phân tích</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Biểu phí</a>
					<ul class="dropdown-menu sub-menu-one">
						<li>
							<a class="dropdown-item" href="#">Các loại phí dịch vụ</a>
							<ul class="submenus dropdown-menu">
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Biểu phí giao dịch chứng khoán
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Biểu phí giao dịch trái phiếu
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">
										<img src="<?= getPath('./images/ic-caret-sub-menu.svg')?>" alt="icon-caret-submenu"/>
										Biểu phí các dịch vụ khác
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" href="#">Hỗ trợ</a>
				</li>
			</ul>
			<div class="d-flex page-header wrap-info">
				<div class="phone-header">
					<a href="tel:19001885">
						<img src="<?= getPath('./images/ic-phone-red.svg')?>" alt="icon phone red"/>
						1900 1885
					</a>
				</div>
				<div class="open-account">
					<a href="#">MỞ TÀI KHOẢN</a>
				</div>
			</div>
			<div class="d-flex justify-content-center">
				<div class="page-login">
					<a href="#">
						<img src="<?= getPath('./images/ic-login.svg')?>" alt="icon login"/>
						Đăng nhập
					</a>
				</div>
			</div>
		</div>
	</div>
</nav>
<!-- End Mobile Menu -->
<!-- End Desktop header -->
<!-- end include header -->