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
              <form method="post" action="<?= base_url('admin/berita/actionedit');?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="hidden" name="id_berita" class="form-control" value="<?= $id_berita;?>">
                      <input type="text" name="judul" class="form-control judul" value="<?= $judul;?>">
                    </div>
                  </div>  
                  <div class="col-md-6">                    
										<div class="form-group">                      
											<label>Slug</label>                      
											<input type="text" name="slug" class="form-control slug" value="<?= $slug;?>">                  
										</div>                                      
									</div> 
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" name="gambar" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Kategori</label>
                      <select name="kategori" class="form-control select2">
                        <?php foreach ($list_kategori as $data) { ?>
                          <option value="<?= $data['id'];?>" <?= $kategori == $data['kategori'] ? 'selected = "selected"' : '' ?>><?= $data['kategori'];?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Publish</label>
                      <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d', strtotime($tanggal)); ?>">
                    </div>
                  </div>
                  <div class="col-md-5">               
                    <div class="form-group">                      
											<label>Atur Sebagai Slide</label>                      
											<select name="slide" class="form-control select2">                        
													<option value="0" <?= $slide == "0" ? 'selected = "selected"' : '' ?>>Tidak</option>
													<option value="1" <?= $slide == "1" ? 'selected = "selected"' : '' ?>>Ya</option>
											</select>                    
										</div>
                  </div> 
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Caption</label>
                      <textarea type="text" name="caption" class="form-control" rows="4" cols="50"><?= $caption;?></textarea>
                    </div>
                  </div>
                  <div class="col-md-5">               
                    <div class="form-group">                      
											<label>Tag</label>                      
											<select name="tag[]" class="form-control select2 tokenizer" multiple="multiple">                        
												<?php foreach ($list_tag as $data) { ?>                          
													<option value="<?= $data['nama_tag'];?>" <?= in_array($data['nama_tag'], $tag) ? 'selected = "selected"' : '' ?>><?= $data['nama_tag'];?></option>                        
												<?php } ?>                      
											</select>                    
										</div>
                  </div> 
                </div>  
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <?php
                        $data = str_replace( '&', '&amp;', $content );
                    ?>
                      <textarea name="content" id="editor"><?= $data;?></textarea>
                    </div>  
                  </div>  
                </div>  
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </div>  
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
<script type="text/javascript">    
    $(function () {

    var slug = function(str) {
      var $slug = '';
      var trimmed = $.trim(str);
      $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
      replace(/-+/g, '-').
      replace(/^-|-$/g, '');
      return $slug.toLowerCase();
    }

    $('.judul').keyup(function() {
        var takedata = $('.judul').val()
        $('.slug').val(slug(takedata));
      });

  });
</script>
<script>
  tinymce.init({
    selector: '#editor',
    images_upload_url: '<?= base_url('admin/berita/uploadimages') ?>',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak lineheight | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    importcss_append: true,
    templates: [{
        title: 'New Table',
        description: 'creates a new table',
        content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
      },
      {
        title: 'Starting my story',
        description: 'A cure for writers block',
        content: 'Once upon a time...'
      },
      {
        title: 'New list with dates',
        description: 'New List with dates',
        content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
      }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 520,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
  });
</script>