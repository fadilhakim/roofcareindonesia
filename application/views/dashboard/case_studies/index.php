<section class="content">
    <div class="container-fluid">
      <div class="block-header">
          <ol class="breadcrumb">
              <li><a href="javascript:void(0);">Dashboard</a></li>
              <li class="active">Case Studies</li>
          </ol>
      </div>
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>
                          Daftar Case Studies
                      </h2>
                      <a href="<?= base_url() ?>dashboard/case-studies/create" class="btn btn-primary" style="margin-top:20px">Add Case Studies</a>
                  </div>
                  <div class="body table-responsive">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Case Studies</th>
                                  <th>Deskripsi</th>
                                  <th>Gambar</th>
                                  <!-- <th>Katagori</th> -->
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($item_data->result() as $item) :?>
                              <tr>
                                  <th scope="row"><?= $item->id ?></th>
                                  <td><?= $item->title ?></td>
                                  <td><?= $item->description ?></td>
                                  <td><img style="width:160px" src="<?= base_url();?>/public/images/uploads/<?= $item->image ?>" alt="gambar depan"></td>
                                  <!-- <td>
                                    <h5><span class="label bg-blue">Factory</span></h5>
                                  </td> -->                                
                                  <td>
                                    <a href="<?php echo base_url() ?>dashboard/case-studies/edit/<?= $item->id ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?php echo base_url() ?>dashboard/case-studies/delete/<?= $item->id ?>" class="btn btn-danger">Delete</a>
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
