<?php
defined('BASEPATH') or exit('No direct script access allowed');

$resources = [
    // 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css',
    'https://cdn.jsdelivr.net/npm/bootswatch@4.6.0/dist/solar/bootstrap.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
    'https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/date-1.0.2/r-2.2.7/sc-2.0.3/sb-1.0.1/datatables.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css',
    'https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css',
    'https://fonts.googleapis.com/css2?family=Nunito&display=swap',
    base_url('assets/css/style.css'),
];

foreach ($resources as $output) {
    echo '<link rel="stylesheet" href="' . $output . '">';
}
