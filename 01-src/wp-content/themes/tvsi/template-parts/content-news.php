
<div class="col-md-6 col-lg-4">
    <div class="blog-item">
        <div class="blog-img"> <a href="#" class="d-block">
                <img src="<?= get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : getPath('/images/blog1.jpeg') ?>" alt="blog img" class="img-fluid" />
            </a>

        </div>
        <div class="blog-content">
            <h5>
                <a href="#"><?= the_title() ?></a>
            </h5>

            <p class="mb-0">Tin TVSI | <?= the_date('d/m/Y')?></p>
        </div>
    </div>
</div>