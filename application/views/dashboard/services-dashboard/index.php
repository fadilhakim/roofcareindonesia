<section class="content">
    <div class="container-fluid">
      <div class="block-header">
          <ol class="breadcrumb">
              <li><a href="javascript:void(0);">Dashboard</a></li>
              <li class="active">Services</li>
          </ol>
      </div>
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>
                          Daftar Services
                      </h2>
                      <a href="<?= base_url() ?>dashboard/services/create" class="btn btn-primary" style="margin-top:20px">Add Services</a>
                  </div>
                  <div class="body table-responsive">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Services</th>
                                  <th>Deskripsi</th>
                                  <th>Gambar</th>
                                  <!-- <th>Katagori</th> -->
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach( $item_data->result() as $item ) :  ?>
                              <tr>
                                  <th scope="row">1</th>
                                  <td><?= $item->title ?></td>
                                  <td>
                                      <p><?= $item->description ?></p>
                                  </td>
                                  <td><img style="width:160px" src="<?= base_url();?>public/images/uploads/<?= $item->image ?>" alt="gambar services"></td> 
                                  <td>
                                    <a href="<?php echo base_url() ?>dashboard/services/edit/<?= $item->id ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?php echo base_url() ?>dashboard/services/delete/<?= $item->id ?>" class="btn btn-danger">Delete</a>
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
