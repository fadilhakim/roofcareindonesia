<!-- BANNER -->
<div class="section banner-page" data-background="images/dummy-img-1920x300.jpg">
  <div class="content-wrap pos-relative">
    <div class="container">
      <div class="col-12 col-md-12">
        <div class="d-flex bd-highlight mb-2">
          <div class="title-page">Case Studies</div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Case Studies</li>
          </ol>
        </nav>
      </div>
    </div>

  </div>
</div>

  <!-- CONTENT -->
<div id="class" class="">
  <div class="content-wrap">
    <div class="container">

      <div class="row">
        <!-- Looping Item -->
        <?php foreach ($item_data->result() as $item) : ?>
        <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="rs-news-1 mb-5">
            <div class="media">
              <a href="case_studies/detail/<?= $item->id ?>">
                <img src="<?= base_url() ?>public/images/uploads/<?= $item->image ?>" alt="" class="img-fluid">
              </a>
            </div>
            <div class="body">
              <div class="title"><a href="news-single.html"><?= $item->title ?></a></div>
              <div class="meta-date"><?= date('F j, Y', strtotime($item->created_at)) ?></div>
              <p><?= $item->description ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

        <!-- Item 2 -->
        <!-- <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="rs-news-1 mb-5">
            <div class="media">
              <a href="news-single.html">
                <img src="images/dummy-img-600x500.jpg" alt="" class="img-fluid">
              </a>
            </div>
            <div class="body">
              <div class="title"><a href="news-single.html">Deleniti atque corrupti</a></div>
              <div class="meta-date">May 12, 2019</div>
              <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
            </div>
          </div>
        </div> -->

        <!-- Item 3 -->
        <!-- <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="rs-news-1 mb-5">
            <div class="media">
              <a href="news-single.html">
                <img src="images/dummy-img-600x500.jpg" alt="" class="img-fluid">
              </a>
            </div>
            <div class="body">
              <div class="title"><a href="news-single.html">Voluptatum deleniti atque</a></div>
              <div class="meta-date">May 12, 2019</div>
              <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
            </div>
          </div>
        </div> -->

        <!-- Item 4 -->
        <!-- <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="rs-news-1 mb-5">
            <div class="media">
              <a href="news-single.html">
                <img src="images/dummy-img-600x500.jpg" alt="" class="img-fluid">
              </a>
            </div>
            <div class="body">
              <div class="title"><a href="news-single.html">Occusamus et iusto odio</a></div>
              <div class="meta-date">May 12, 2019</div>
              <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
            </div>
          </div>
        </div> -->

        <!-- Item 5 -->
        <!-- <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="rs-news-1 mb-5">
            <div class="media">
              <a href="news-single.html">
                <img src="images/dummy-img-600x500.jpg" alt="" class="img-fluid">
              </a>
            </div>
            <div class="body">
              <div class="title"><a href="news-single.html">Deleniti atque corrupti</a></div>
              <div class="meta-date">May 12, 2019</div>
              <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
            </div>
          </div>
        </div> -->

        <!-- Item 6 -->
        <!-- <div class="col-sm-12 col-md-12 col-lg-4">
          <div class="rs-news-1 mb-5">
            <div class="media">
              <a href="news-single.html">
                <img src="images/dummy-img-600x500.jpg" alt="" class="img-fluid">
              </a>
            </div>
            <div class="body">
              <div class="title"><a href="news-single.html">Voluptatum deleniti atque</a></div>
              <div class="meta-date">May 12, 2019</div>
              <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
            </div>
          </div>
        </div> -->

      </div>

      <!-- <div class="row mt-5">
        <div class="col-sm-12 col-md-12">

          <nav aria-label="Page navigation">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>

        </div>
      </div> -->

    </div>
  </div>
</div>
