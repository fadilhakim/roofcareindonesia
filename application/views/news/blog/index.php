<!-- BANNER -->
<div class="section banner-page" data-background="<?= base_url() ?>public/images/dummy/dummy-img-1920x300.jpg">
  <div class="content-wrap pos-relative">
    <div class="container">
      <div class="col-12 col-md-12">
        <div class="d-flex bd-highlight mb-2">
          <div class="title-page">Blog</div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
      </div>
    </div>

  </div>
</div>

<div id="class" class="">
  <div class="content-wrap">
    <div class="container">

      <div class="row">
        <!-- Looping Item -->
        <?php foreach ($item_data->result() as $item) : ?>
          <?php 
            $num_char = 150;
            $text = $item->description;
            $textSort = substr($text, 0, $num_char) . '...';
          ?>
        <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="rs-news-1 mb-5">
            <div class="media">
              <a href="blog/detail/<?= $item->id ?>">
                <img src="<?= base_url() ?>public/images/uploads/<?= $item->image ?>" alt="" class="img-fluid">
              </a>
            </div>
            <div class="body">
              <div class="title"><a href="news-single.html"><?= $item->title ?></a></div>
              <div class="meta-date"><?= date('F j, Y', strtotime($item->created_at)) ?></div>
              <p><?= $textSort ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </div>
  </div>
</div>