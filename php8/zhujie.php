<?php

namespace php8;
require_once dirname(__DIR__) . '/vendor/autoload.php';

#[myattr("api", "http://www.yzmedu.com/api")]
#[api("http://www.yzmedu.com/api")]
/*** @api http://www.yzmedu.com/api */
function show($name)
{
}

//$ref = new \ReflectionFunction("show");
//$doc = $ref->getDocComment();
//$api = substr($doc, strpos($doc, "@api") + strlen("@api "), -2);
//print_r($api);
//$session = 11;
//echo $session?->user?->getAddress()?->country;
//$name = match ($request_method) {
//    'post' => $this->handlePost(),
//    'get', 'head' => $this->handleGet(),
//};
//echo $name;
/*$code = '<?php echo 123 ?>';*/
//$arr = token_get_all($code);
//$arr=\PhpToken::tokenize($code);
//var_dump($arr);
//try {
//    substr('linux', []);
//} catch (\TypeError $e) {
//    echo $e->getMessage();
//}
//try {
//    json_decode('"foo"', true, -1);
//} catch (\ValueError $e) {
//    echo $e->getMessage();
//}
