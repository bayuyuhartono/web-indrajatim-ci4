<?php
  header('Content-type: application/xml; charset="ISO-8859-1"',true);  
  $datetime1 = new DateTime(date('Y-m-d H:i:s'));
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    <?php foreach($post as $item) { 
        if($item['tanggal_diubah'] == '0000-00-00 00:00:00'){
            if($item['tanggal_dibuat'] == '0000-00-00 00:00:00'){
                $due =  $item['tanggal'];
            } else {
                $due =  $item['tanggal_dibuat'];
            }
        } else {
            $due =  $item['tanggal_diubah'];
        }
      $datetime = new DateTime($due);
    ?>
    <url>
        <loc><?= base_url('berita/detail/'.$item['slug']) ?></loc>
        <news:news>
            <news:publication>
                <news:name>Indra Jatim</news:name>
                <news:language>id</news:language>
            </news:publication>
            <news:publication_date><?= $datetime->format(DATE_ATOM); ?></news:publication_date>
            <news:title><?= str_replace("-"," ",$item['slug']);; ?></news:title>
        </news:news>
    </url>
    <?php } ?>
</urlset>