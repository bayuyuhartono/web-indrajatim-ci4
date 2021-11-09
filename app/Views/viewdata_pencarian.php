<?= $this->include('template/header'); ?>
<section id="page-content">    
	<div class="container">      
		<div class="row">         
			<div class="page-title col-6 col-sm-10">         
				<h2>Pencarian</h2>    
			</div>       
			<div class="page-view col-6 col-sm-2">
				<div class="list-view-button"><i class="fa fa-bars" aria-hidden="true"></i> List view</div>
				<div class="grid-view-button"><i class="fa fa-th-large" aria-hidden="true"></i> Grid view</div>
			</div>           
		</div>   
		<div class="row">
			<div class="page-title col-12">  
				<div class="form-group searchpanel">
					<div class="input-group">
						<input type="text" class="form-control searchvalue" value="<?= $searchvalue;?>" placeholder="Ketik Kata Kunci">
						<button class="btn btn-default cari-button">Cari</button>
					</div>  
				</div>  
			</div>
		</div>
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
	let offsetState = 0;

	$( ".grid-view-button" ).hide();
	$( ".loading-bar" ).hide();
	$( ".loadmore-button" ).hide();
	getdata(0,'grid');

	$( ".list-view-button" ).click(function() {
		$( ".grid-view-button" ).show();
		$( ".list-view-button" ).hide();
		$('.list-data-berita').empty();
		offsetState = 0;
		getdata(offsetState,'list');
		$( ".list-data-berita" ).removeClass( "cards" );
		$( "#viewbutton" ).removeClass( "fa fa-bars" );
		$( "#viewbutton" ).addClass( "fa fa-th-large" );	
	});

	$( ".grid-view-button" ).click(function() {
		$( ".grid-view-button" ).hide();
		$( ".list-view-button" ).show();
		$('.list-data-berita').empty();
		offsetState = 0;		
		getdata(offsetState,'grid');
		$( ".list-data-berita" ).addClass( "cards" );
		$( "#viewbutton" ).removeClass( "fa fa-th-large" );
		$( "#viewbutton" ).addClass( "fa fa-bars" );
	});

	$( ".loadmore-button" ).click(function() {
		getdata(offsetState,viewState);
	});

	function getdata(offset, view) {
		let searchvalue = $(".searchvalue").val();
		if (searchvalue == '') {
			$( ".loading-bar" ).hide();
			return
		}
		$( ".loadmore-button" ).hide();
		$( ".loading-bar" ).show();
		viewState = view;
		$.ajax({
			type:"GET",
			url:"<?php base_url() ?>/api/getMoreDataPencarian/"+ offset +"/" + view +"/" + searchvalue,
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

	$( ".cari-button" ).click(function() {
		getsearch()
	});

	$('.searchvalue').keypress(function (e) {
		if (e.which == 13) {
			getsearch()
			return false;
		}
	});

	function getsearch() {
		let searchvalue = $(".searchvalue").val();
		if (searchvalue.trim() == '') {

		} else {
			window.location.href = '<?php base_url() ?>/pencarian/' + searchvalue;
		}
	}

</script>