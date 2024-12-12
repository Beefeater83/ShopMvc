<?php

    class NotFoundController extends Controller {
        public function index() {
            $this->view('error/error_controller');
        }

 }