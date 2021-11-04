<?= $this->include('admin/template/header'); ?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><?= $subtitle;?>  
              <br>
                <button class="btn btn-sm btn-primary"><a class="text-white" href="<?= base_url('admin/berita/tambah_data');?>">Tambah</a></button>
              </h4>  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="listdatatable" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>Gambar</th>
                      <th>Kategori</th>
                      <th>Judul</th>
                      <th>Tanggal</th>
                      <th width="50">#</th>
                    </tr>
                  </thead>
                  <tbody> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $this->include('admin/template/footer'); ?>
  
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      var table = $('#listdatatable').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo base_url('admin/berita/ajax_list')?>",
          "type": "POST"
        },
        "columnDefs": [{
          "targets": [],
          "orderable": false,
        }, ],
      });
    });
  </script>



