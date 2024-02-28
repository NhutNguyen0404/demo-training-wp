<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tvsi
 */

get_header();
?>

	<main>
		<section class="active-news">
			<section class="page-breadcrumb page-breadcrumb-news">
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<h2 class="text-breadcrumb"><?= the_archive_title() ?></h2>

							<nav aria-label="breadcrumb">
								<ol class="breadcrumb text-uppercase text-white">
									<li class="breadcrumb-item"><a href="<?= get_home_url() ?>">TRANG CHỦ</a>
									</li>
									<li class="breadcrumb-item"><?= the_archive_title() ?></li>
									<li class="breadcrumb-item" aria-current="page">TIN TVSI</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</section>
			<section class="investor-tabs">
				<div class="container px-md-0">
					<div class="tabs-to-dropdown">
						<div class="nav-wrapper d-flex align-items-center justify-content-center nav-justified">
							<ul class="nav nav-pills d-none d-md-flex grid-container w-100" id="pills-tab"
								role="tablist">
								<li class="nav-item" role="presentation"> <a class="nav-link active" id="pills-news1-tab" data-toggle="pill" href="#pills-news1"
																			 role="tab" aria-controls="pills-news1" aria-selected="true">Tin TVSI</a>

								</li>
								<li class="nav-item" role="presentation"> <a class="nav-link" id="pills-news2-tab" data-toggle="pill" href="#pills-news2"
																			 role="tab" aria-controls="pills-news2" aria-selected="false">TVSI <br>
										vì cộng đồng</a>

								</li>
								<li class="nav-item" role="presentation"> <a class="nav-link" id="pills-news3-tab" data-toggle="pill" href="#pills-news3"
																			 role="tab" aria-controls="pills-news" aria-selected="false">TVSI <br>
										với báo chí</a>

								</li>
								<li class="nav-item" role="presentation"> <a class="nav-link" id="pills-news4-tab" data-toggle="pill" href="#pills-news4"
																			 role="tab" aria-controls="pills-news4" aria-selected="false">Hoạt động <br>
										nội bộ</a>

								</li>
								<li class="nav-item" role="presentation"> <a class="nav-link" id="pills-news5-tab" data-toggle="pill" href="#pills-news5"
																			 role="tab" aria-controls="pills-news5" aria-selected="false">Ảnh <br>
										tư liệu</a>

								</li>
							</ul>
						</div>
						<div class="tab-content" id="pills-tabContent-News">
							<div class="tab-pane fade show active" id="pills-news1" role="tabpanel"
								 aria-labelledby="pills-news1-tab">
								<div class="pills-news-tab">
									<div class="blog-wrap">
										<div class="row">
											<?php
											if ( have_posts() ) :
												/* Start the Loop */
												while ( have_posts() ) :
													the_post();

													/*
													 * Include the Post-Type-specific template for the content.
													 * If you want to override this in a child theme, then include a file
													 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
													 */
													get_template_part( 'template-parts/content', get_post_type() );

												endwhile;

												the_posts_navigation();

											else :

												get_template_part( 'template-parts/content', 'none' );

											endif;
											?>

										</div>
										<div class="d-flex flex-end justify-content-center align-items-center page-pagination">
											<nav aria-label="Page navigation">
												<ul class="pagination justify-content-center mb-0">
													<li class="page-item pagination-prev"><a class="page-link" href="#">Trang trước</a>

													</li>
													<li class="page-item pagination-next"><a class="page-link" href="#">Trang sau</a>

													</li>
												</ul>
											</nav>
											<div class="page-pagination-right"> <span>Page</span>

												<input type="number" value="1" class="ms-1" /> <span class="ms-1">of 200</span>
												<a href="#"><img src="<?= getPath('/images/pagination-next.svg') ?>" alt="pagination next"/></a>

											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="pills-news2" role="tabpanel" aria-labelledby="pills-news2-tab">
								<div class="tab-news-2">Content tab2 here</div>
							</div>
							<div class="tab-pane fade" id="pills-news3" role="tabpanel" aria-labelledby="pills-news3-tab">
								<div class="tab-news-3">Content tab3 here</div>
							</div>
							<div class="tab-pane fade" id="pills-news4" role="tabpanel" aria-labelledby="pills-news4-tab">
								<div class="tab-news-4">Content tab4 here</div>
							</div>
							<div class="tab-pane fade" id="pills-news5" role="tabpanel" aria-labelledby="pills-news5-tab">
								<div class="tab-news-5">Content tab5 here</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</section>
	</main>

<?php
get_footer();
