<?php
class Core{    
    static $CREATED     = 2016;
    static $SKIN        = 'default';
    static $CONT        = 'modules';	
    static $DB_NAME     = 'db_study';
    static $DB_HOST     = 'localhost';
    static $DB_USER     = 'root';
    static $DB_PASSWORD = '';
    static $DOMAIN      = 'http://test/';
    static $JS          = array();
    static $CSS         = array();
    static $META        = array(
								'title'       => 'стандартный TITLE',
								'description' => 'd',
								'keywords'    => 'k'
								);
	
}
Core::$JS[] = '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>';

 


