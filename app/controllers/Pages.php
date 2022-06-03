<?php
class Pages extends Controller {
    public function __construct(){
        //
    }

    public function index(){
        $data = [
            'title' => 'Rinnegan Blog',
            'description' => 'Simple blog page build on Rinnegan MVC framework.'
        ];

        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us',
            'description' => 'Share your thoughts with others.'
        ];

        $this->view('pages/about', $data);
    }
}