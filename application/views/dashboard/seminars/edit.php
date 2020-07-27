<section class="content">
    <div class="container-fluid">
      <div class="block-header">
          <ol class="breadcrumb">
              <li><a href="javascript:void(0);">Dashboard</a></li>
              <li><a href="javascript:void(0);">Seminar</a></li>
              <li class="active">Update</li>
          </ol>
      </div>
      <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                  <div class="header">
                      <h2>
                          Update Seminar : <strong><?= $judul_seminar ?></strong>
                      </h2>
                  </div>
                  <div class="body">
                      <form id="form_validation"  enctype="multipart/form-data" method="post" action="<?= base_url() ?>dashboard/seminars/update/<?= $id ?>">
                            <label class="form-label">Judul Seminar :</label>
                          <div class="form-group">
                              <div class="form-line">
                                  <input type="text" class="form-control" name="judul_seminar" required="" aria-required="true" value="<?= $judul_seminar ?>">
                              </div>
                              <!-- <label id="name-error" class="error" for="name">This field is required.</label> -->
                          </div>
                          <label class="form-label">Gambar Seminar</label>
                          <div class="form-group">
                              <div class="error form-line">
                                  <input type="file" class="form-control" name="gambar_seminar">
                                  <input type="hidden" name="old_image"  value="<?= $gambar_seminar ?>" />
                              </div>
                              <!-- <label id="name-error" class="error" for="name">This field is required.</label> -->
                          </div>
                          <label for="" class="form-label">Kategori :</label>
                          <div class="form-group">
                              <div class="form-line error">

                                  <select class="form-control" name="kategori_seminar">
                                    <?php foreach ($data_category->result() as $category): ?>
                                        <?php $selected = ''; if($category->id == $no_category) $selected = 'selected="selected"' ;
                                          echo '<option value="'.$category->id.'" '.$selected.'>'.$category->judul.'</option>';
                                         ?>
                                        <!-- <option value="<?= $category->id ?>"><?= $category->judul ?></option> -->
                                    <?php endforeach; ?>
                                  </select>
                              </div>
                          <!-- <label id="email-error" class="error" for="email">This field is required.</label> -->
                        </div>

                          <label class="form-label">Deskripsi :</label>
                          <div class="form-group form-float">
                              <div class="form-line error">
                                  <textarea id="ckeditor" name="deskripsi"><?= $deskripsi ?></textarea>
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
