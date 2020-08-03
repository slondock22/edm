<?php

function set_active($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function base64url_encode($plainText)
{
    return strtr(base64_encode($plainText), '+/=', '-__');
}

function base64url_decode($b64Text)
{
    return base64_decode(strtr($b64Text, '-__' ,'+/='));
}