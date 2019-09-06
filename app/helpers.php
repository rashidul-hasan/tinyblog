<?php

if (! function_exists('null_unless')) {
    /**
     * Return value from array if key exists, otherwise return null
     * @param $arr
     * @param $key
     * @return mixed
     * @internal param $value
     * @internal param string $name
     */
    function null_unless($arr, $key)
    {
        if (isset($arr[$key]))
        {
            return $arr[$key];
        }

        return null;
    }
}

if (! function_exists('active_link')) {

    function active_link()
    {
        $class = '';
        $urls = func_get_args();
        $current_uri = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($urls as $i){
            $class = $i === $current_uri ? 'active' : '';
        }

        return $class;
    }
}

if (! function_exists('formatBdt')) {

    function formatBdt($value)
    {
//        return '&#2547;&nbsp;' . $value;
        return 'BDT ' . $value;
    }

}

if (! function_exists('replace')) {

    function replace($stub, $data)
    {
        preg_match_all('/{(.*?)}/', $stub, $placeholders);

        // if data is object
        if (is_object($data))
        {
            $data = get_object_vars($data);
        }

        $replaceable = [];

        // prepare data
        foreach ($placeholders[1] as $i)
        {
            $replaceable[] = $data[$i];
        }

        return str_replace($placeholders[0], $replaceable, $stub);
    }
}

if (! function_exists('get_stub')) {

    function get_stub($filename)
    {
        return file_get_contents(app_path('Modules/Site/Resources/stubs/' . $filename . '.stub'));
    }
}

if (! function_exists('default_unless')) {

    function default_unless($value, $default)
    {
        if (isset($value) && $value != NULL)
        {
            return $value;
        }

        return $default;
    }
}

if (! function_exists('eloquent_to_array')) {

    function eloquent_to_array($obj)
    {
        if (is_null($obj))
        {
            return [];
        }

        if ( ! $obj instanceof Illuminate\Database\Eloquent\Model)
        {
            return [];
        }

        return $obj->toArray();
    }
}

if (! function_exists('url_localised')) {

    function url_localised($url)
    {
        $locale = app()->getLocale();

        if (in_array($locale, ['ar', 'som'])){
            return url($url . '?lang=' . $locale);
        }

        return url($url);
    }
}

if (! function_exists('request_input')) {

    function request_input($request, $input, $default = null)
    {
        if ($request->has($input) && $request->get($input) != null && $request->get($input) != ''){
            return $request->get($input);
        }

        return $default;
    }
}

if (! function_exists('set_setting')) {

    function set_setting($key, $value)
    {
        if ($value != null && $value != ''){
            Setting::set($key, $value);

            return true;
        }

        return false;
    }
}

// check if request has input which is not null & not empty
if (! function_exists('request_has')) {

    function request_has($input)
    {
        $request = app(\Illuminate\Http\Request::class);

        if ($request->has($input) && $request->get($input) != null && $request->get($input) != ''){
            return true;
        }

        return false;
    }
}