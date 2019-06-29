<?php
ob_start();
session_start();
if (!function_exists('URL')) {
    function URL($path = '')
    {

        return "http://localhost/rojgar/" . $path;
    }
}


if (!function_exists('page_path')) {
    function page_path($path = '')
    {
        return dirname(dirname(__FILE__)) . '/' . $path;
    }
}

if (!function_exists('redirect_to')) {
    function redirect_to($path = '')
    {
        $redirectPath = URL($path);
        header('Location:' . $redirectPath);
        exit();
    }

}


if (!function_exists('Messages')) {
    function Messages()
    {
        if (isset($_SESSION['success'])) {
            $class = 'alert alert-success';
            $message = $_SESSION['success'];
            unset($_SESSION['success']);


        }
        if (isset($_SESSION['error'])) {
            $class = 'alert alert-danger';
            $message = $_SESSION['error'];
            unset($_SESSION['error']);
        }

        $output = '';
        if (isset($message)) {
            $output .= "<div class='{$class}'>";
            $output .= $message;
            $output .= "</div>";

        }
        return $output;
    }


}

if (!function_exists('diffForHumans')) {
    function diffForHumans($expireDate = '')
    {
        $expiry = $expireDate;
        $exp = date_create($expiry);
        $current = date('Y-m-d');
        $cur = date_create($current);
        $dif = date_diff($exp, $cur);

        if ($exp >= $cur) {
            return $dif->days . 'days';
        } else {
            return "This job is expired.";
        }
    }

}


if (!function_exists('back')) {
    function back()
    {
        $headers = getallheaders();
        if (isset($headers['Referer'])) {
            header('Location:' . $headers['Referer']);
            return $this;
        }

        return false;

    }
}