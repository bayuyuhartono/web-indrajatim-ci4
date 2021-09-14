<?php foreach ($datalist as $data) { ?>
    <li class="list_item col-12 col-sm-12">
        <div class='tile'>
            <a href="<?= base_url(str_replace(' ', '', $kategori_name).'/detail/'.$data['slug']);?>">  
                <img class='tile-img' src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>"/>
            </a>
            <div class='tile-info'>
                <span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>                        
                <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span>
                <a href="<?= base_url(str_replace(' ', '', $kategori_name).'/detail/'.$data['slug']);?>">  
                    <h2 class="block-ellipsis"><?= $data['judul'];?></h2>
                </a>
                <a href="<?= base_url(str_replace(' ', '', $kategori_name).'/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
            </div>
        </div>       
        </li>
<?php } ?>	