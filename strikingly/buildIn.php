<?php
if (!function_exists('buildIn')) {
    /**
     * 将字符串中{{}}包含的key解析并替换为给定数组中key对应的值
     * @param string $pending
     * @param array $values
     * @return string
     * @throws Exception
     */
    function buildIn(string $pending, array $values = []): string
    {
        //从字符串中解析出需要替换的变量
        $pattern = '/\{{.*?\}}/';
        preg_match_all($pattern, $pending, $keys);
        if (empty($keys[0])) return $pending;

        //需要替换的变量映射到给定的值，缺少则抛出异常
        $replaceArr = [];
        foreach ($keys[0] as $key) {
            $tmpkey = trim($key, '{} ');
            if (!array_key_exists($tmpkey, $values)) {
                throw new \Exception('Error, because the variable "' . $tmpkey . '" is missing.');
            }
            $replaceArr[$key] = $values[$tmpkey];
        }

        //替换变量为给定的值
        foreach ($replaceArr as $k => $value) {
            $pending = str_replace($k, $value, $pending);
        }

        return $pending;
    }
}

/**
 * 请在cli模式下执行此脚本
 * @example php /YOUR_PATH/buildIn.php 'My name is {{ name }} and I am forever {{ age }}.' '{ "name": "Bill", "age": 21 }'
 */
$string = $argv[1] ?? 'My name is {{ name }} and I am forever {{ age }}.';
$values = isset($argv[2]) ? json_decode($argv[2], true) :  ['name' => 'fuliang', 'age' => 18];
print_r(buildIn($string, $values));
