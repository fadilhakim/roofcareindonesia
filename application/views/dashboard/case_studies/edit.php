<section class="content">
    <div class="container-fluid">
      <div class="block-header">
          <ol class="breadcrumb">
              <li><a href="javascript:void(0);">Dashboard</a></li>
              <li><a href="javascript:void(0);">Case Studies</a></li>
              <li class="active">Update Case Studies</li>
          </ol>
      </div>
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>
                          Form Update Case Studies
                          <?= print_r($item_data->row_data); ?>
                      </h2>
                  </div>
                  <div class="body">
                      <form id="form_validation"  enctype="multipart/form-data" method="post" action="<?= base_url() ?>dashboard/case-studies/submit">
                            <label class="form-label">Judul Case Studies :</label>
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" name="judul_case_studies" required="" aria-required="true" value="<?= $item_data->title ?>">
                              </div>
                              <!-- <label id="name-error" class="error" for="name">This field is required.</label> -->
                          </div>
                          <label class="form-label">Gambar Case Studies</label>
                          <div class="form-group">
                              <div class="error form-line">
                                  <input type="file" class="form-control" name="gambar_case_studies">
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
                                  <textarea id="ckeditor" name="deskripsi"><?= $item_data->description ?></textarea>
                              </div>
                              <!-- <label id="description-error" class="error" for="description">This field is required.</label> -->
                          </div>


                          <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
</section>
