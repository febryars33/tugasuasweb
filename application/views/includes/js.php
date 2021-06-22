<?php
defined('BASEPATH') or exit('No direct script access allowed');

$resources = [
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js',
    'https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/date-1.0.2/r-2.2.7/sc-2.0.3/sb-1.0.1/datatables.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/id.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js',
    // base_url('assets/js/script.js'),
];

foreach ($resources as $output) {
    echo '<script src="' . $output . '"></script>';
}
