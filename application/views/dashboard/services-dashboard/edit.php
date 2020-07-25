<section class="content">
    <div class="container-fluid">
      <div class="block-header">
          <ol class="breadcrumb">
              <li><a href="javascript:void(0);">Dashboard</a></li>
              <li><a href="javascript:void(0);">Services</a></li>
              <li class="active">Update Services</li>
          </ol>
      </div>
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>
                          Form Update Services
                      </h2>
                  </div>
                  <div class="body">
                      <form id="form_validation"  enctype="multipart/form-data" method="post" action="<?= base_url() ?>dashboard/services/update/<?= $id ?>">
                            <label class="form-label">Judul Services :</label>
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" name="judul_services" required="" aria-required="true" value="<?= $title ?>">
                              </div>
                              <!-- <label id="name-error" class="error" for="name">This field is required.</label> -->
                          </div>
                          <label class="form-label">Gambar Services</label>
                          <div class="form-group">
                              <div class="error form-line">
                                  <input type="file" class="form-control" name="gambar_services">
                                  <input type="hidden" name="old_image"  value="<?= $image ?>" />
                              </div>
                              <!-- <label id="name-error" class="error" for="name">This field is required.</label> -->
                          </div>
                          <!-- <label for="" class="form-label">Kategori :</label>
                          <div class="form-group">
                              <div class="form-line error">

                                  <select class="form-control" name="kategori_seminar">
                                    <option value="office">Office Rooftop</option>
                                    <option value="warehouse">Warehouse</option>
                                    <option value="oil">Oil & Gas</option>
                                  </select>
                              </div>
                          <label id="email-error" class="error" for="email">This field is required.</label>
                        </div> -->

                          <label class="form-label">Deskripsi :</label>
                          <div class="form-group form-float">
                              <div class="form-line error">
                                  <textarea id="ckeditor" name="deskripsi"><?= $description ?></textarea>
                              </div>
                              <!-- <label id="description-error" class="error" for="description">This field is required.</label> -->
                          </div>


                          <button class="btn btn-primary waves-effect" type="submit">UPDATE</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
</section>
