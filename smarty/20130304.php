<?php
/***
 * smarty模板引擎原理
 * 1：读取模板文件
 * 2：替换模板标签为php可执行代码
 * 3：保存替换成功的php文件
 ***/

/*
问题？
1：每次访问都编译浪费cpu？
编译文件存在，不用在编译直接引入
2：模板文件修改后，必须重新编译该文件
当模板文件修改时间大于编译文件修改时间，说明模板文件被修改了，
因此要重新编译模板文件
*/

class TinySmarty
{
    //模板文件存放目录
    public $template_dir = "./templates/";
    //编译后文件存放目录
    public $compile_dir = "./c_templates/";

    //存放变量值
    public $tpl_vars = array();

    //assign
    //将变量以数组形式存放到该$tpl_var属性
    public function assign($tpl_var, $var = null)
    {
        //传入数组形式，为批量赋值
        if (is_array($tpl_var)) {
            foreach ($tpl_var as $_key => $_val) {
                if ($_key != '') {
                    $this->tpl_vars[$_key] = $_val;
                }
            }
        } else {
            //传入非空字符
            if ($tpl_var != '') {
                $this->tpl_vars[$tpl_var] = $var;
            }
        }
    }

    /*
    name display
    param string $tpl_file 文件名

    */
    public function display($tpl_file)
    {
        //模板文件路径
        $template_file_path = $this->template_dir . $tpl_file;
        //编译文件路径
        $compile_file_path = $this->compile_dir . $tpl_file;
        //判断编译文件是否存在
        if (!file_exists($compile_file_path) || filemtime($template_file_path) > filemtime($compile_file_path)) {
            //判断文件是否存在
            if (!file_exists($template_file_path)) {
                return false;
            }
            //读取文件内容
            $fpl_file_con = file_get_contents($template_file_path);

            //替换模板标签
            //如：{$title} 替换为<?php echo $title; ? >
            //正则表达式//此处正则涉及到正则的反响引用
            $pattern = '/{{\s*([_a-zA-Z][_0-9a-zA-Z]*)\s*\}}/i';
            $replace = '<?= $this->tpl_vars["${1}"];?>';
            $new_file_con = preg_replace($pattern, $replace, $fpl_file_con);
            //写入文件内容
            file_put_contents($compile_file_path, $new_file_con);
        }

        //引入编译后的文件
        include($compile_file_path);
    }
}
