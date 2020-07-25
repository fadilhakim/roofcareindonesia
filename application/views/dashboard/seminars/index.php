<section class="content">
    <div class="container-fluid">
      <div class="block-header">
          <ol class="breadcrumb">
              <li><a href="javascript:void(0);">Dashboard</a></li>
              <li class="active">Seminars</li>
          </ol>
      </div>
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>
                          Daftar Seminar
                      </h2>
                  </div>
                  <div class="body table-responsive">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Judul</th>
                                  <th>Gambar Depan</th>
                                  <th>Katagori</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($data_seminar->result() as $seminar): ?>

                              <tr>
                                  <th scope="row">1</th>
                                  <td><?= $seminar->judul_seminar ?></td>
                                  <td>
                                    <img style="width:160px" src="<?= base_url();?>/public/images/uploads/<?= $seminar->gambar_seminar ?>" alt="gambar depan">
                                  </td>
                                  <td>
                                    <h5><span class="label bg-blue">Factory</span></h5>
                                  </td>
                                  <td>
                                    <a href="<?php echo base_url() ?>dashboard/seminars/detail/1" class="btn btn-warning">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>

                                  </td>
                              </tr>

                            <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
</section>
