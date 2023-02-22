
<?php
if (!function_exists('checkSuper')) {
    function checkSuper()
    {
        return session()->get('user')['level'] === 1;
    }
}
