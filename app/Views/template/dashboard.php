<?= $this->include('template/header'); ?>
<style>
	.home-top {
		padding-bottom: 0px !important;
	}
	.home-bottom {
		padding-top: 10px !important;
	}
   .slick-slide {margin: 0px 20px;}
   .slick-slide img {width: 100%;}
   .slick-slider {
      position: relative;
      display: block;
      box-sizing: border-box;
	  padding-top: 15px !important;
	  padding-bottom: 15px !important;
   }
   .slick-list{
      position: relative;
      display: block;
      overflow: hidden;
      margin: 0;
      padding: 0;
   }
   .slick-list:focus {
       outline: none;
   }
   .slick-list.dragging {
       cursor: pointer;
       cursor: hand;
   }

   .slick-slider .slick-track,
   .slick-slider .slick-list {
       -webkit-transform: translate3d(0, 0, 0);
          -moz-transform: translate3d(0, 0, 0);
           -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
               transform: translate3d(0, 0, 0);
   }
   .slick-track {
      position: relative;
      top: 0;
      left: 0;
      display: block;
   }
   .slick-track:before,
   .slick-track:after {
      display: table;
      content: '';
   }
   .slick-track:after {
      clear: both;
   }
   .slick-loading .slick-track {
       /* visibility: hidden; */
   }
   .slick-slide {
      display: none;
      float: left;
      height: 100%;
      min-height: 1px;
   }
   [dir='rtl'] .slick-slide {
      float: right;
   }
   .slick-slide img {
      display: block;
	  height: 160px;
   }
   .slick-slide.slick-loading img {
      display: none;
   }
   .slick-slide.dragging img {
      pointer-events: none;
   }
   .slick-initialized .slick-slide {
      display: block;
   }
   .slick-loading .slick-slide {
      isibility: hidden;
   }
   .slick-vertical .slick-slide {
      display: block;
      height: auto;
      border: 1px solid transparent;
   }
   .slick-arrow.slick-hidden {display: none;}
   .label-kat {
		font-size: 25px;
		margin-left: 20px;
		margin-top: 10px;
   }
</style>
<section id="page-content" class="sidebar-right home-top">    
	<div class="container"> 
		<div class="row">
			<div class="content col-lg-12">
				<?php foreach ($image_banneratas as $data) { ?>
					<?php if($data['status'] == 1) { ?>
						<?php if($data['judul'] == '-') { ?>	
							<img src="<?= base_url('assets/admin/upload/banner/'.$data['gambar']);?>" style="width:100%; height:105%; margin-bottom: 15px;">
						<?php }else{ ?>	
							<a href="<?php echo $data['judul'] ?>" target="_blank"><img src="<?= base_url('assets/admin/upload/banner/'.$data['gambar']);?>" style="width:100%; height:105%; margin-bottom:15px"></a>
						<?php } ?>	
					<?php } ?>	
				<?php } ?>
			</div>	
		</div>       
		<div class="row">            
			<div class="content col-lg-9">   
				<?php if (count($list_infoterkini) > 1) { ?>
				<div>
					<h2 class="label-kat">Info Terkini</h2>             
				</div>
				<section class="customer-logos slider">
						<?php foreach ($list_infoterkini as $data) { ?>                        
							<div class="post-item border">                            
								<div class="post-item-wrap">                                
									<div class="post-image">                                    
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>">                                        
											<img alt="img-home" src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
										</a>                                
									</div>                                
									<div class="post-item-description">   
										<span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>    
										<!-- <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span> -->                                              
										<h2 style="font-size:13px;"><a href="<?= base_url('berita/detail/'.$data['slug']);?>"><?= $data['judul'];?></a></h2>
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
									</div>                            
								</div>                            
							</div>                    
						<?php } ?>  
				</section>     
				<?php } ?>

				<?php if (count($list_kabarjatim) > 1) { ?>
				<div>
					<h2 class="label-kat">Kabar Jatim</h2>             
				</div>
				<section class="customer-logos slider">
						<?php foreach ($list_kabarjatim as $data) { ?>                        
							<div class="post-item border">                            
								<div class="post-item-wrap">                                
									<div class="post-image">                                    
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>">                                        
											<img alt="img-home" src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
										</a>                                
									</div>                                
									<div class="post-item-description">   
										<span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>    
										<!-- <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span> -->                                              
										<h2 style="font-size:13px;"><a href="<?= base_url('berita/detail/'.$data['slug']);?>"><?= $data['judul'];?></a></h2>
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
									</div>                            
								</div>                            
							</div>                    
						<?php } ?>  
				</section> 
				<?php } ?>  

				<?php if (count($list_politik) > 1) { ?>
				<div>
					<h2 class="label-kat">Politik</h2>             
				</div>
				<section class="customer-logos slider">
						<?php foreach ($list_politik as $data) { ?>                        
							<div class="post-item border">                            
								<div class="post-item-wrap">                                
									<div class="post-image">                                    
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>">                                        
											<img alt="img-home" src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
										</a>                                
									</div>                                
									<div class="post-item-description">   
										<span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>    
										<!-- <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span> -->                                              
										<h2 style="font-size:13px;"><a href="<?= base_url('berita/detail/'.$data['slug']);?>"><?= $data['judul'];?></a></h2>
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
									</div>                            
								</div>                            
							</div>                    
						<?php } ?>  
				</section> 
				<?php } ?>  

				<?php if (count($list_budaya) > 1) { ?>
				<div>
					<h2 class="label-kat">Budaya</h2>             
				</div>
				<section class="customer-logos slider">
						<?php foreach ($list_budaya as $data) { ?>                        
							<div class="post-item border">                            
								<div class="post-item-wrap">                                
									<div class="post-image">                                    
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>">                                        
											<img alt="img-home" src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
										</a>                                
									</div>                                
									<div class="post-item-description">   
										<span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>    
										<!-- <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span> -->                                              
										<h2 style="font-size:13px;"><a href="<?= base_url('berita/detail/'.$data['slug']);?>"><?= $data['judul'];?></a></h2>
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
									</div>                            
								</div>                            
							</div>                    
						<?php } ?>  
				</section> 
				<?php } ?>  

				<?php if (count($list_sejarah) > 1) { ?>
				<div>
					<h2 class="label-kat">Sejarah</h2>             
				</div>
				<section class="customer-logos slider">
						<?php foreach ($list_sejarah as $data) { ?>                        
							<div class="post-item border">                            
								<div class="post-item-wrap">                                
									<div class="post-image">                                    
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>">                                        
											<img alt="img-home" src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
										</a>                                
									</div>                                
									<div class="post-item-description">   
										<span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>    
										<!-- <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span> -->                                              
										<h2 style="font-size:13px;"><a href="<?= base_url('berita/detail/'.$data['slug']);?>"><?= $data['judul'];?></a></h2>
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
									</div>                            
								</div>                            
							</div>                    
						<?php } ?>  
				</section> 
				<?php } ?>  

				<?php if (count($list_hiburan) > 1) { ?>
				<div>
					<h2 class="label-kat">Hiburan</h2>             
				</div>
				<section class="customer-logos slider">
						<?php foreach ($list_hiburan as $data) { ?>                        
							<div class="post-item border">                            
								<div class="post-item-wrap">                                
									<div class="post-image">                                    
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>">                                        
											<img alt="img-home" src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
										</a>                                
									</div>                                
									<div class="post-item-description">   
										<span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>    
										<!-- <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span> -->                                              
										<h2 style="font-size:13px;"><a href="<?= base_url('berita/detail/'.$data['slug']);?>"><?= $data['judul'];?></a></h2>
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
									</div>                            
								</div>                            
							</div>                    
						<?php } ?>  
				</section> 
				<?php } ?>  

				<?php if (count($list_catatanakhirpekan) > 1) { ?>
				<div>
					<h2 class="label-kat">Catatan Akhir Pekan</h2>             
				</div>
				<section class="customer-logos slider">
						<?php foreach ($list_catatanakhirpekan as $data) { ?>                        
							<div class="post-item border">                            
								<div class="post-item-wrap">                                
									<div class="post-image">                                    
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>">                                        
											<img alt="img-home" src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
										</a>                                
									</div>                                
									<div class="post-item-description">   
										<span class="post-meta-date"><i class="fa fa-calendar"></i><?= date('d-m-Y', strtotime($data['tanggal']));?></span>    
										<!-- <span class="post-meta-comments"><i class="fa fa-user"></i>By Admin</span> -->                                              
										<h2 style="font-size:13px;"><a href="<?= base_url('berita/detail/'.$data['slug']);?>"><?= $data['judul'];?></a></h2>
										<a href="<?= base_url('berita/detail/'.$data['slug']);?>" class="item-link">Read More <i class="icon-chevron-right"></i></a>
									</div>                            
								</div>                            
							</div>                    
						<?php } ?>  
				</section> 
				<?php } ?>  
			</div>            
			<div class="sidebar col-lg-3">                
				<div class="widget">
					<div class="tabs">
						<ul class="nav nav-tabs" id="tabs-posts" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">Berita Popular</a>
							</li>
						</ul>
						<div class="tab-content" id="tabs-posts-content">
							<div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
								<div class="post-thumbnail-list">
									<?php foreach ($berita_hits as $data) { ?>
										<div class="post-thumbnail-entry">
											<img alt="" src="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
											<div class="post-thumbnail-content">
												<a href="<?= base_url('berita/detail/'.$data['slug']);?>"><?= $data['judul'];?></a>
												<span class="post-date"><i class="icon-clock"></i> <?= date('d-m-Y', strtotime($data['tanggal']));?></span>
												<span class="post-category"><i class="fa fa-tag"></i> <?= $data['kategori'];?></span>
											</div>
										</div>
									<?php } ?>	
								</div>
							</div>
						</div>
					</div>
				</div>   

				<div class="widget" data-username="envato" data-limit="2">
					<?php foreach ($image_bannerkanan as $data) { ?>
						<?php if($data['status'] == 1) { ?>
							<?php if($data['judul'] == '-') { ?>	
								<img src="<?= base_url('assets/admin/upload/banner/'.$data['gambar']);?>" style="width:100%; height:105%; margin-bottom: 15px;">
							<?php }else{ ?>	
								<a href="<?php echo $data['judul'] ?>" target="_blank"><img src="<?= base_url('assets/admin/upload/banner/'.$data['gambar']);?>" style="width:100%; height:105%; margin-bottom:15px"></a>
							<?php } ?>	
						<?php } ?>
					<?php } ?>
				</div>  
				
				<!-- Composite Start -->
				<div id="M767596ScriptRootC1237294"></div>
				<script src="https://jsc.mgid.com/i/n/indrajatim.com.1237294.js" async></script>
				<!-- Composite End -->

			</div>        
		</div>    
	</div>
</section>
<section id="page-content" class="home-bottom">    
	<div class="container">        
		
		<!-- Composite Start -->
		<div id="M767596ScriptRootC1237329">
		</div>
		<!-- <script src="https://jsc.mgid.com/i/n/indrajatim.com.1237329.js" async> -->
		</script>
		<!-- Composite End -->
 

		<div class="row">
			<div class="col-lg-12">
				<?php foreach ($image_bannerbawah as $data) { ?>
					<?php if($data['status'] == 1) { ?>
						<?php if($data['judul'] == '-') { ?>	
							<img src="<?= base_url('assets/admin/upload/banner/'.$data['gambar']);?>" style="width:100%; height:105%; margin-bottom: 15px;">
						<?php }else{ ?>	
							<a href="<?php echo $data['judul'] ?>" target="_blank"><img src="<?= base_url('assets/admin/upload/banner/'.$data['gambar']);?>" style="width:100%; height:105%; margin-bottom:15px"></a>
						<?php } ?>	
					<?php } ?>
				<?php } ?>
			</div>	
		</div>      
	</div>
</section>        

<?= $this->include('template/footer'); ?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
   $(document).ready(function(){
      $('.customer-logos').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
      });
   });
</script>