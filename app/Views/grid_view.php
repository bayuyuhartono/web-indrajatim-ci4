<?php foreach ($datalist as $data) { ?>
    <li class="cards_item">
        <div class="card">
            <a href="<?= base_url(str_replace(' ', '', $kategori_name).'/detail/'.$data['slug']);?>">
                <div class="card_image"><img src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>" class="grid-thumbnail"></div>
            </a>
            <div class="card_content">
                <span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>                        
                <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span>       
                <a href="<?= base_url(str_replace(' ', '', $kategori_name).'/detail/'.$data['slug']);?>">                 
                    <h2 class="card_title block-ellipsis" style="height: 60px;"><?= $data['judul'];?></h2>
                </a>
                <a href="<?= base_url(str_replace(' ', '', $kategori_name).'/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
            </div>
        </div>
    </li>
<?php } ?>