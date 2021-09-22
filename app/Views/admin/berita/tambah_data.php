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
							<form method="post" action="<?= base_url('admin/berita/actiontambah');?>" enctype="multipart/form-data">                
								<div class="row">                  
									<div class="col-md-6">                    
										<div class="form-group">                      
											<label>Judul</label>                      
											<input type="text" name="judul" class="form-control judul" required>                    
										</div>                                      
									</div>    
                  <div class="col-md-6">                    
										<div class="form-group">                      
											<label>Slug</label>                      
											<input type="text" name="slug" class="form-control slug" required>                    
										</div>                                      
									</div>                 
									<div class="col-md-6">                    
										<div class="form-group">                      
											<label>Gambar</label>                      
											<input type="file" name="gambar" class="form-control" required>                    
										</div>                                      
									</div> 
                  <div class="col-md-6">               
                    <div class="form-group">                      
											<label>Kategori</label>                      
											<select name="kategori" class="form-control select2">                        
												<?php foreach ($list_kategori as $data) { ?>                          
													<option value="<?= $data['id'];?>"><?= $data['kategori'];?></option>                        
												<?php } ?>                      
											</select>                    
										</div>
                  </div>  
                  <div class="col-md-6">
                    <div class="form-group">                      
											<label>Tanggal Publish</label>                      
											<input type="date" name="tanggal" class="form-control" required>                    
										</div>
                  </div>
                  <div class="col-md-6">               
                    <div class="form-group">                      
											<label>Atur Sebagai Slide</label>                      
											<select name="slide" class="form-control select2">                        
													<option value="0">Tidak</option>
													<option value="1">Ya</option>
											</select>                    
										</div>
                  </div> 
                  <div class="col-md-6">
                    <div class="form-group">                      
											<label>Caption</label>                      
											<textarea type="text" name="caption" class="form-control" rows="4" cols="50"></textarea>                   
										</div>
                  </div>
                  <div class="col-md-6">               
                    <div class="form-group">                      
											<label>Tag</label>                      
											<select name="tag[]" class="form-control select2 tokenizer" multiple="multiple">                        
												<?php foreach ($list_tag as $data) { ?>                          
													<option value="<?= $data['nama_tag'];?>"><?= $data['nama_tag'];?></option>                        
												<?php } ?>                      
											</select>                    
										</div>
                  </div> 
								</div>                  
								<div class="row">                  
									<div class="col-md-12">                    
										<div class="form-group">
											<textarea class="form-control" id="ckeditor" name="content"></textarea>                  
										</div>	
									</div>                  
								</div>                  
								<div class="row">                  
									<div class="col-md-12">                    
										<div class="form-group">
											<button type="submit" class="btn btn-primary">Simpan</button>                  
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
    CKEDITOR.replace('ckeditor', {
      filebrowserImageBrowseUrl : '<?= base_url();?>assets/kcfinder/browse.php',
      height: '400px'             
    });
  });
</script>
<script>
  (function() {
    var mathElements = [
    'math',
    'maction',
    'maligngroup',
    'malignmark',
    'menclose',
    'merror',
    'mfenced',
    'mfrac',
    'mglyph',
    'mi',
    'mlabeledtr',
    'mlongdiv',
    'mmultiscripts',
    'mn',
    'mo',
    'mover',
    'mpadded',
    'mphantom',
    'mroot',
    'mrow',
    'ms',
    'mscarries',
    'mscarry',
    'msgroup',
    'msline',
    'mspace',
    'msqrt',
    'msrow',
    'mstack',
    'mstyle',
    'msub',
    'msup',
    'msubsup',
    'mtable',
    'mtd',
    'mtext',
    'mtr',
    'munder',
    'munderover',
    'semantics',
    'annotation',
    'annotation-xml'
    ];

    CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.14.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');

    CKEDITOR.replace('ckeditor', {
      extraPlugins: 'ckeditor_wiris',
        // For now, MathType is incompatible with CKEditor file upload plugins.
        height: 320,
        // Update the ACF configuration with MathML syntax.
        extraAllowedContent: mathElements.join(' ') + '(*)[*]{*};img[data-mathml,data-custom-editor,role](Wirisformula)'
      });
  });

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

</script>
