<?php

/**
 * @param null $name Tên từ khóa của parameter url
 * @param string $value Giá trị của từ khóa
 * @param array $skipKey Params key bỏ qua (unset)
 * @param bool $hasUri trả về với URI
 * @return string
 */
function updateParamUrl($name = null, $value = '', $skipKey = [], $hasUri = false)
{
    $params = $_GET;
    if (!empty($skipKey)) {
        foreach ($skipKey as $key) {
            unset($params[$key]);
        }
    }
    unset($params[$name]);
    $params[$name] = $value;
    $new_query_string = http_build_query($params);
    if ($hasUri) {
        return (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] .
            $_SERVER['REQUEST_URI'] . '?' . $new_query_string;
    }
    return '?' . $new_query_string;

}

function getParamsInput($skipKey = '')
{
    foreach ($_GET as $key => $value) {
        if ($key != $skipKey) {
            echo("<input type='hidden' name='$key' value='$value'/>");
        }

    }
}

function getCustomPosts($arg){
    $argDefault=[
        'post_type' => 'post',
        'post_status' => 'publish',
        'tax_query' => [
            [
                'taxonomy' => 'product_category',
                'operator' => 'EXISTS'
            ],
        ],
        'posts_per_page' => $postPPage,
        'paged' => $paged,
    ];
    $query=array_merge($argDefault,$arg);
    return new WP_Query($argDefault);
}