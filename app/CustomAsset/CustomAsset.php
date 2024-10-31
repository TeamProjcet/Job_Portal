<?php

if (! function_exists('asset_custom')) {
    function asset_custom($path)
    {
        if (env('PUBLIC_PATH')){
            return env('PUBLIC_PATH').'/'.$path;
        }
        return asset($path);
    }
}