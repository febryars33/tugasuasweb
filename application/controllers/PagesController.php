<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PagesController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // login validation
        need_login('username');
    }

    /**
     * Home Method Function
     *
     * @return void
     */
    public function home(): void
    {
        /**
         * @var object
         */
        $faker = Faker\Factory::create('id_ID');

        /**
         * @var array
         */
        $data = [
            'title' =>  'Beranda',
            'page'  =>  'home',
            'faker' =>  $faker
        ];
        render('core', $data);
    }
}
