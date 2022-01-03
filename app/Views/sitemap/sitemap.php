<?php
  header('Content-type: application/xml; charset="ISO-8859-1"',true);  
  $datetime1 = new DateTime(date('Y-m-d H:i:s'));
?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc><![CDATA[<?= base_url('infoterkini/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
    <sitemap>
        <loc><![CDATA[<?= base_url('kabarjatim/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
    <sitemap>
        <loc><![CDATA[<?= base_url('politik/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
    <sitemap>
        <loc><![CDATA[<?= base_url('budaya/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
    <sitemap>
        <loc><![CDATA[<?= base_url('sejarah/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
    <sitemap>
        <loc><![CDATA[<?= base_url('hiburan/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
    <sitemap>
        <loc><![CDATA[<?= base_url('catatanakhirpekan/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
    <sitemap>
        <loc><![CDATA[<?= base_url('tokoh/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
    <sitemap>
        <loc><![CDATA[<?= base_url('advertorial/sitemap.xml') ?>]]></loc>
        <lastmod><![CDATA[<?= $datetime1->format(DATE_ATOM); ?>]]></lastmod>
    </sitemap>
</sitemapindex>