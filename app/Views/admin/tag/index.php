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
                <button class="btn btn-sm btn-primary"><a class="text-white" href="<?= base_url('admin/tag/tambah_data');?>">Tambah</a></button>
              </h4>  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="list-data-table" class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>Nama Tag</th>
                      <th width="50">#</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($list_tag as $data) { ?>
                      <tr>
                        <td class="text-center"><?= $no;?></td>
                        <td><?= $data['nama_tag'];?></td>
                        <td>
                          <button class="btn btn-sm btn-primary mb-2"><a class="text-white" href="<?= base_url('admin/tag/edit_data/'.$data['id_tag']);?>">Edit</a></button>
                          <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau delete data ini?')"><a class="text-white" href="<?= base_url('admin/tag/actiondelete/'.$data['id_tag']);?>">Delete</a></button> 
                        </td>
                      </tr>   
                    <?php $no++; } ?>  
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




