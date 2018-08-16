<?php

/**
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env($key, $default = null)
{
    $value = getenv($key) ?? $_ENV[$key] ?? $_SERVER[$key];
    if ($value === false) {
        return $default;
    }
    switch (strtolower($value)) {
        case 'true':
        case '(true)':
            return true;
        case 'false':
        case '(false)':
            return false;
    }
    return $value;
}


/**
 * this is shortcut function collect
 */

if (! function_exists("app")) {

    /**
     * @return \yii\console\Application|\yii\web\Application
     */
    function app()
    {
        return Yii::$app;
    }
}


if (! function_exists("env")) {

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key) ?? $_ENV[$key] ?? $_SERVER[$key];
        if ($value === false) {
            return $default;
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
        }
        return $value;
    }
}



if (! function_exists("url")) {

    /**
     * @param array|string $url the parameter to be used to generate a valid URL
     * @param bool|string $scheme the URI scheme to use in the generated URL:
     *
     * - `false` (default): generating a relative URL.
     * - `true`: returning an absolute base URL whose scheme is the same as that in [[\yii\web\UrlManager::$hostInfo]].
     * - string: generating an absolute URL with the specified scheme (either `http`, `https` or empty string
     *   for protocol-relative URL).
     *
     * @return string the generated URL
     * @throws InvalidParamException a relative route is given while there is no active controller
     */
    function url($url, $scheme = false )
    {
        return call_user_func_array(['\yii\helpers\Url', 'to'], func_get_args());
    }
}



if (! function_exists("request")) {

    /**
     * @return \yii\console\Request|\yii\web\Request
     */
    function request()
    {
        return app()->request;
    }
}


if (! function_exists("response")) {

    /**
     * @return \yii\console\Response|\yii\web\Response
     */
    function response()
    {
        return app()->response;
    }
}

if (! function_exists("dd")) {

    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed  $args
     * @return void
     */
    function dd(...$args)
    {
        foreach ($args as $item) {
            \yii\helpers\VarDumper::dump($item);
        }
        return ;
    }
}


if (! function_exists("array_get")) {

    /**
     * array_get
     *
     * @param $array
     * @param $key
     * @param null $default
     */
    function array_get($array, $key, $default = null)
    {
        \yii\helpers\ArrayHelper::getValue($array, $key, $default);
    }
}


if (! function_exists("get_ip")) {

    /**
     * get request ip
     *
     * @return mixed|null|string
     */
    function get_ip()
    {
        return request()->userIP;
    }
}





if (! function_exists("get_tree")) {
    /**
     *
     * format array
     * @param $data
     * @param int $pid
     * @param int $level
     * @param string $separator
     * @param string $path
     * @return array
     */
   function get_tree($data, $pid = 0, $path = 0, $level = 1,  $separator = "|__")
   {
       $tree = [];
       foreach ($data as $value) {
           if ($value['pid'] == $pid) {
               $value['level'] = $level;
               $value['path'] = $path;
               $value['name'] = str_repeat($separator, $level) . $value['name'];
               $tree[] = $value;
               $_path = $path . '-' . $value['id'];
               $tree = array_merge($tree, get_tree($data, $value['id'], $_path, $level + 1,  $separator));
           }
        }
        return $tree;
    }
}


