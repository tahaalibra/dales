<?php namespace dales\view;

class HTML
{
    public static function sanitize($data)
    {
        return mysql_real_escape_string($data);
    }

    public static function includeJs($fileName)
    {    //echo file_get_contents(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'js'.DS.$fileName.'.js');
         echo '<script src="'.BP.'js/'.$fileName.'.js"></script>';
    }

    public static function includeCss($fileName)
    {    //echo file_get_contents(ROOT.DS.'app'.DS.'views'.DS.THEME.DS.'css'.DS.$fileName.'.css');
         echo '<link rel="stylesheet" type="text/css" href="'.BP.'css/'.$fileName.'.css">';
    }
    
    public static function import($path)
    {
        require_once VIEW.DS.$path.".php";
    }

    public static function parse_variables($input, $array)
    {
//        $search = preg_match_all("/@import(.*)/", $input, $output_array);
//
//        for ($i = 0; $i < $search; $i++) {
//            $output_array[1][$i] = str_replace(array('(', ')'), null, $output_array[1][$i]);
//        }
//
//        foreach ($output_array[1] as $value) {
//
//            ob_start();
//            require_once str_replace(".",DS,VIEW.DS.trim($value)).".php";
//            $result = ob_get_clean();
//            //$input  = substr_replace('@import(' . $value . ')', $result, $input);
//            $input = str_replace('@import(' . $value . ')', "hsb", $input);
//        }



        $search = preg_match_all('/\${{.*?}}/', $input, $matches);

        for ($i = 0; $i < $search; $i++) {
            $matches[0][$i] = str_replace(array('$', '{', '}'), null, $matches[0][$i]);
        }

        foreach ($matches[0] as $value) {
            if (isset($array[$value])) {
                $input = str_replace('${{' . $value . '}}', $array[$value], $input);
            } else
                $input = str_replace('${{' . $value . '}}', '', $input);
        }

        return $input;
    }

}
