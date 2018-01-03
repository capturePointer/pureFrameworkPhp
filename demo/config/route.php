<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 *      ':any' => '[^/]+',
 *      ':num' => '[0-9]+',
 *      ':all' => '.*'
 */
Router::get('/:any', 'Index@index');
Router::get('page', 'Index@page');
Router::get('view/(:num)', 'Index@view');


