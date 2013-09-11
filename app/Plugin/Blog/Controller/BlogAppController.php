<?php

App::uses('AppController', 'Controller');

class BlogAppController extends AppController {
    protected $limitQuery = 5;
}
