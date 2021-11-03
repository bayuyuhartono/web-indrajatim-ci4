<!DOCTYPE html>
<html lang="id-ID">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T3KH7JK37T"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-T3KH7JK37T');
    </script>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NP2T99J');</script>
    <!-- End Google Tag Manager -->

    <title><?= isset($judul_berita) ? $judul_berita : 'Berita Terkini Jawa Timur';?> - indrajatim.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INDRA JATIM" />
    <meta name="description" content="<?= isset($caption) ? $caption : 'Berita terkini dan terbaru dari Jawa Timur mengenai politik, budaya, sejarah, hiburan dan informasi masyarakat.';?>">
    <meta name="keywords" content="<?= isset($tag) ? $tag : 'berita terkini, berita jatim, berita politik, berita terbaru, berita hari ini, budaya';?>">
    <meta name="news_keywords" content="<?= isset($tag) ? $tag : 'berita terkini, berita jatim, berita politik, berita terbaru, berita hari ini, budaya';?>">
    <meta content='id' name='language'/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="googlebot" content="index, follow" />
    <meta name="author" content="Indra Jatim">
    <meta name="robots" content="index, follow" />
    <meta name="language" content="id" />
    <meta name="geo.country" content="id" />
    <meta http-equiv="content-language" content="In-Id" />
    <meta name="geo.placename" content="Indonesia" />

    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?= $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta property="og:title" content="<?= isset($judul_berita) ? $judul_berita : 'Berita Terkini Jawa Timur';?> - indrajatim.com">
    <meta property="og:description" content="<?= isset($caption) ? $caption : 'Berita terkini dan terbaru dari Jawa Timur mengenai politik, budaya, sejarah, hiburan dan informasi masyarakat';?>">
    <meta property="og:image" content="<?= isset($gambar_berita) ? base_url('assets/admin/upload/berita/'.$gambar_berita) : base_url('assets/indrajatim_assets/indrajatim-og.png');?>">
    <meta property="og:image:secure_url" content="<?= isset($gambar_berita) ? base_url('assets/admin/upload/berita/'.$gambar_berita) : base_url('assets/indrajatim_assets/indrajatim-og.png');?>">
    <meta property="og:site_name" content="INDRAJATIM.com" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:alt" content="Indrajatim">
    <meta name="twitter:site" content="@indrajatimcom" />
    <meta name="twitter:creator" content="@indrajatimcom">
    <meta name="twitter:title" content="<?= isset($judul_berita) ? $judul_berita : 'Berita Terkini Jawa Timur';?> - indrajatim.com">
    <meta name="twitter:description" content="<?= isset($caption) ? $caption : 'Berita terkini dan terbaru dari Jawa Timur mengenai politik, budaya, sejarah, hiburan dan informasi masyarakat';?>">
    <meta name="twitter:image" content="<?= isset($gambar_berita) ? base_url('assets/admin/upload/berita/'.$gambar_berita) : base_url('assets/indrajatim_assets/indrajatim-og.png');?>">
    
    <meta name="google-site-verification" content="2wEnOD0KzP2P4JJj45kb9w9EgQfvf5pfWGCuhOIWOks" />

    <link rel="shortcut icon" href="<?= base_url('assets/indrajatim_assets/favicon_ijt1.ico');?>" />
    <link rel="canonical" href="<?= str_replace("index.php/","",current_url()); ?>" />

    <link href="<?= base_url('assets/temp/css/plugins.css');?>" rel="stylesheet">
    <link href="<?= base_url('assets/temp/css/style.css');?>" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9619114306536943"
     crossorigin="anonymous"></script>

</head>
<style type="text/css">
    .struktur_new {
        text-align:left;
    }

    .struktur_new ul {
        display: inline-block; 
        list-style: none;
    }

    .struktur_new ul li {
        text-align: center;
        float: left;
    }

    .struktur_new ul li a {
        display: block;
        text-decoration: none;
        padding: 0px 10px;
    }
    .post-item-description h2 {
        height: 80px;
    }

    input:-moz-placeholder {
        color: #999;
    }
    input::-webkit-input-placeholder {
        color: #999;
    }

    input:not([type=checkbox]):not([type=radio]),
    select {
        min-height: 15px !important;
    }
    
    textarea:focus,
    input[type="search"]:focus,
    .uneditable-input:focus {   
        border-color: none;
        box-shadow: inset 0 1px 1px rgb(222, 222, 222), 0 0 8px rgb(222, 222, 222);
        outline: 0 none;
    }

</style>
<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP2T99J"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="body-inner">
        <header id="header" class="header-always" data-fullwidth="true">
            <div class="header-inner">
                <div class="container">
                    <div id="logo">
                        <a href="<?= base_url('home');?>">
                            <!-- <span class="logo-default"><?= $subtitle;?></span> -->
                            <img src="<?= base_url('assets/indrajatim_assets/logoindrajatim.png');?>" alt="">
                        </a>
                    </div>
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li>
                                        <div id="demo-2" method="post" action="<?= base_url('pencarian');?>">
                                            <a href="<?= base_url('pencarian') ?>" class="fa fa-search"></a>
                                        </div>
                                    </li>
                                    <li><a href="<?= base_url('infoterkini');?>">Info Terkini</a></li>
                                    <li><a href="<?= base_url('kabarjatim');?>">Kabar Jatim</a></li>
                                    <li><a href="<?= base_url('politik');?>">Politik</a></li>
                                    <li><a href="<?= base_url('budaya');?>">Budaya</a></li>
                                    <li><a href="<?= base_url('sejarah');?>">Sejarah</a></li>
                                    <li><a href="<?= base_url('hiburan');?>">Hiburan</a></li>
                                    <li><a href="<?= base_url('catatanakhirpekan');?>">Catatan Akhir Pekan</a></li>
                                    <li><a href="<?= base_url('tokoh');?>">Tokoh</a></li>
                                    <li><a href="<?= base_url('advertorial');?>">Advertorial</a></li>
                                    <?php if (session('nama')) { ?>
                                        <li><a href="<?= base_url('login/logout');?>">Logout</a></li>
                                    <?php }else{ ?>    
                                        <li><a href="<?= base_url('login');?>">Login</a></li> 
                                    <?php } ?>   
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php if (count($list_slide) > 0) { ?>
            <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-fade="true">
                <?php foreach ($list_slide as $data) { ?>
                    <div class="slide" data-bg-image="<?= base_url('assets/admin/upload/berita/'.$data['gambar']);?>">
                        <div class="bg-overlay"></div>
                        <div class="container">
                            <div class="slide-captions text-left text-light">
                                <h1><a href="<?= base_url(strtolower(str_replace(' ','',$kategori_name)).'/detail/'.$data['slug']);?>"><?= $data['judul'];?></a></h1> 
                                <!-- <p class="text-small">Sub Judul</p> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>    
            </div>
        <?php  } ?>
    </div>   

    <script>
      function buttonUp() {
          var inputVal = $('.searchbox-input').val();
          inputVal = $.trim(inputVal).length;
          if (inputVal !== 0) {
              $('.searchbox-icon').css('display', 'none');
          } else {
              $('.searchbox-input').val('');
              $('.searchbox-icon').css('display', 'block');
          }
      }

      $('.searchhead').keypress(function (e) {
            if (e.which == 13) {
                getsearch()
                return false;
            }
        });

        function getsearch() {
            let searchhead = $(".searchhead").val();
            if (searchhead.trim() == '') {

            } else {
                window.location.href = '<?php base_url() ?>/pencarian/' + searchhead;
            }
        }
    </script>