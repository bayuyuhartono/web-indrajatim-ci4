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
    ClassicEditor.create(document.querySelector("#editor"), {
    toolbar: {
      items: [
        "heading",
        "|",
        "bold",
        "italic",
        "link",
        "bulletedList",
        "numberedList",
        "|",
        "indent",
        "outdent",
        "|",
        "imageUpload",
        "blockQuote",
        "mediaEmbed",
        "undo",
        "redo",
      ],
    },
    language: "es",
    image: {
      toolbar: ["imageTextAlternative", "imageStyle:full", "imageStyle:side"],
    },
    licenseKey: "",
    ckfinder:{
        uploadUrl: "<?= base_url('admin/berita/uploadImages') ?>",
    },
  })
    .then((editor) => {
      window.editor = editor;
    })
    .catch((error) => {
      console.error("Oops, something went wrong!");
      console.error(
        "Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:"
      );
      console.warn("Build id: ref2goguw78q-8ghiwfe1qu83");
      console.error(error);
    });

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
  ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.catch( error => {
		console.error( error );
	} );

</script>