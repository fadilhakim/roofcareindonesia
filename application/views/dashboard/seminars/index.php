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
                            <?php $i = 1; ?>
                            <?php foreach ($data_seminar->result() as $seminar): ?>

                              <tr>
                                  <th scope="row"><?= $i++; ?></th>
                                  <td><?= $seminar->judul_seminar ?></td>
                                  <td>
                                    <img style="width:160px" src="<?= base_url();?>/public/images/uploads/<?= $seminar->gambar_seminar ?>" alt="gambar depan">
                                  </td>
                                  <td>
                                    <h5>
                                      <span class="label bg-blue">
                                        <?= $seminar->kategori_seminar ?>
                                      </span>
                                    </h5>
                                  </td>
                                  <td>
                                    <a href="<?php echo base_url() ?>dashboard/seminars/edit/<?= $seminar->id ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?php echo base_url() ?>dashboard/seminars/delete/<?= $seminar->id ?>" class="btn btn-danger">Delete</a>

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
