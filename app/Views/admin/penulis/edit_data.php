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
              <form method="post" action="<?= base_url('admin/penulis/actionedit');?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">                    
										<div class="form-group">                      
											<label>Nama Depan</label>          
                      <input type="hidden" name="id" class="form-control" value="<?= $id_penulis;?>">            
											<input type="text" name="nama_depan" class="form-control nama_depan" value="<?= $nama_depan;?>">                  
										</div>                                      
									</div> 
                  <div class="col-md-6">                    
										<div class="form-group">                      
											<label>Nama Belakang</label>                      
											<input type="text" name="nama_belakang" class="form-control nama_belakang" value="<?= $nama_belakang;?>">                  
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
    CKEDITOR.replace('ckeditor', {
      filebrowserImageBrowseUrl : '<?= base_url();?>assets/kcfinder/browse.php',
      height: '400px'             
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

</script>