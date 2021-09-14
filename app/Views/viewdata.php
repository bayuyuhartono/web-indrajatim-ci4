<?= $this->include('template/header'); ?>
<section id="page-content">    
	<div class="container">         
		<div class="row">         
			<div class="page-title col-6 col-sm-10">         
				<h2><?= ucfirst($kategori_name);?></h2>    
			</div>       
			<div class="page-view col-6 col-sm-2">
				<div class="list-view-button"><i class="fa fa-bars" aria-hidden="true"></i> List view</div>
				<div class="grid-view-button"><i class="fa fa-th-large" aria-hidden="true"></i> Grid view</div>
			</div>           
		</div>           
		<br>   
		<ul class="cards list-data-berita">
			
		</ul>
		<div class="loadmore-wrap">
			<button class="btn btn-default loadmore-button">Tampilkan Lebih Banyak</button>
			<img class="loading-bar" src="<?= base_url('assets/other/loading-bar.svg');?>">
		</div>
	</div>
</section>        
<?= $this->include('template/footer'); ?>
<script type="text/javascript">
	let viewState = 'grid';
	let offsetState = 12;

	$( ".grid-view-button" ).hide();
	$( ".loading-bar" ).hide();
	$( ".loadmore-button" ).hide();
	getdata(0,'grid');

	$( ".list-view-button" ).click(function() {
		$( ".grid-view-button" ).show();
		$( ".list-view-button" ).hide();
		$('.list-data-berita').empty();
		getdata(0,'list');
		$( ".list-data-berita" ).removeClass( "cards" );
		$( "#viewbutton" ).removeClass( "fa fa-bars" );
		$( "#viewbutton" ).addClass( "fa fa-th-large" );	
		offsetState = 12;
	});

	$( ".grid-view-button" ).click(function() {
		$( ".grid-view-button" ).hide();
		$( ".list-view-button" ).show();
		$('.list-data-berita').empty();
		getdata(0,'grid');
		$( ".list-data-berita" ).addClass( "cards" );
		$( "#viewbutton" ).removeClass( "fa fa-th-large" );
		$( "#viewbutton" ).addClass( "fa fa-bars" );
		offsetState = 12;		
	});

	$( ".loadmore-button" ).click(function() {
		getdata(offsetState,viewState);
	});

	function getdata(offset, view) {
		$( ".loadmore-button" ).hide();
		$( ".loading-bar" ).show();
		viewState = view;
		$.ajax({
			type:"GET",
			url:"<?php base_url() ?>/api/getmoredata/<?= ucfirst($kategori_name)?>/"+ offset +"/" + view,
			success: function(data) {
				offsetState += 12;
				$( ".loading-bar" ).hide();
				if (data == 'empty') {
					$( ".loadmore-button" ).hide();
				} else {
					$('.list-data-berita').append(data).show('slow');
					$( ".loadmore-button" ).show();
				}
			}
		});
	}
</script>