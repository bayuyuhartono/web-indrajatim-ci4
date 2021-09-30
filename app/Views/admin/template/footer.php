      <footer class="main-footer">        
        <div class="footer-left">          
            Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="#">INDRA JATIM</a>        
        </div>        
        <div class="footer-right">        
        </div>      
    </footer>    
</div>  
</div>  
<!-- General JS Scripts -->  
<script src="<?= base_url('assets/admin/js/app.min.js');?>"></script>  
<script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/5/tinymce.min.js"></script>
<!-- JS Libraies -->  
<!-- Page Specific JS File -->  <!-- JS Libraies -->  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

<script src="<?= base_url('assets/admin/bundles/jquery-ui/jquery-ui.min.js');?>"></script>  
<!-- Page Specific JS File -->  
<script src="<?= base_url('assets/admin/bundles/select2/dist/js/select2.full.min.js');?>"></script>  
<script src="<?= base_url('assets/admin/bundles/jquery-selectric/jquery.selectric.min.js');?>"></script>  
<!-- <script src="<?= base_url('assets/admin/js/page/datatables.js');?>"></script>   -->
<script src="<?= base_url('assets/admin/js/scripts.js');?>"></script>  
<script src="<?= base_url('assets/admin/js/custom.js');?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
<?php if(session()->getFlashdata('success')){ ?>
    toastr.success("<?php echo session()->getFlashdata('success'); ?>");
<?php }else if(session()->getFlashdata('error')){  ?>
    toastr.error("<?php echo session()->getFlashdata('error'); ?>");
<?php }else if(session()->getFlashdata('warning')){  ?>
    toastr.warning("<?php echo session()->getFlashdata('warning'); ?>");
<?php }else if(session()->getFlashdata('info')){  ?>
    toastr.info("<?php echo session()->getFlashdata('info'); ?>");
<?php } ?>
</script>
<script type="text/javascript">
        $(document).ready(function() {
            var table = $('#list-data-table').DataTable({
                "processing": true,
                "serverSide": false,
                "order": [],
                "columnDefs": [{
                    "targets": [],
                    "orderable": false,
                }, ],
            });

            $(".tokenizer").select2({
                tags: true,
            })
        });
    </script>
</body>
</html>