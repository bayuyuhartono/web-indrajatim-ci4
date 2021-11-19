<?= $this->include('template/header2');?>
<section id="page-content">
    <div class="container">
        <div class="row">
            <?php foreach ($list_strukturredaksi as $data) { ?>
                <div class="content col-lg-12">
                    <div id="blog" class="single-post">
                        <div class="post-item">
                            <div class="post-item-wrap">
                                <div class="post-item-description">
                                    <h2>Struktur Redaksi</h2>
                                    <p><?= $data['struktur_redaksi'];?></p>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div> 
            <?php } ?>    
        </div>
    </div>
</section>
<?= $this->include('template/footer');?>

