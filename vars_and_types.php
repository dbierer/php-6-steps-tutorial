<?php
// working with variables and data types
$int   = 12345;
$float = 123.456;
$str   = 'This is a string';
$bool  = TRUE;
$arr   = ['This','is','an','array'];
$obj   = new class ('Doug', 101) {
    public function __construct(
        public string $name = '',
        public int $id = 0) {}
};

echo '<pre>';
var_dump($int, $float, $str, $bool, $arr, $obj);
echo '</pre>';
