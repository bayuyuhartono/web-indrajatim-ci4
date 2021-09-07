<?= $this->include('admin/template/header'); ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4><?= $subtitle;?></h4>
            </div>
            <div class="card-body">
              <form method="post" action="<?= base_url('admin/slide/actiontambah');?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control" required>
                    </div>
                  </div>  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Sub Judul</label>
                      <input type="text" name="sub_judul" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" name="gambar" class="form-control">
                      <p class="text-danger">*) max size gambar di upload 1920x1080 px</p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kategori</label>
                      <select name="kategori" class="form-control">
                        <option value="1">Home</option>
                        <option value="2">Politik</option>
                        <option value="3">Budaya</option>
                        <option value="4">Sejarah</option>
                        <option value="5">Info Terkini</option>
                        <option value="6">Catatan Akhir Pekan</option>
                        <option value="7">Kabar Jatim</option>
                        <option value="8">Advertorial</option>
                        <option value="9">Tokoh</option>
                        <option value="10">Struktur Redaksi</option>
                        <option value="11">Tentang Kami</option>
                        <option value="12">Privacy Policy</option>
                        <option value="13">Hiburan</option>
                      </select>
                    </div>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>  
                </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
    </div>  
  </section>
</div>
<?= $this->include('admin/template/footer'); ?>