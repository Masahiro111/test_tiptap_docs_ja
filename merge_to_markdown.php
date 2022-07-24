<?php

$file_dir = "src/ja/";
$filelist = array(

    // Getting started
    $file_dir . 'introduction.md',
    $file_dir . 'installation.md',
    $file_dir . 'installation/react.md',
    $file_dir . 'installation/nextjs.md',
    $file_dir . 'installation/vue3.md',
    $file_dir . 'installation/vue2.md',
    $file_dir . 'installation/nuxt.md',
    $file_dir . 'installation/svelte.md',
    $file_dir . 'installation/alpine.md',
    $file_dir . 'installation/php.md',

);

$data = "";
foreach ($filelist as $file) {
    $filedata = file_get_contents($file);
    $filedata = str_replace("[[toc]]\n\n", "", $filedata);
    $filedata = preg_replace("/import .*\n/", "",  $filedata);

    $filedata = preg_replace('/\-\-\-\n[\s\S]*?\-\-\-\n/', "\n", $filedata);
    // $filedata = preg_replace('/^---$(.)^---$/', '', $filedata);
    $data .= $filedata . "\n";
}
file_put_contents("publish.md", $data);
