<?php

$tags = [
    '<p>',
    '<strong>',
    '<div>',
    '</p>',
    '</div>',
    '</strong>',
];

$tags_1 = [
    '<p>',
    '<strong>',
    '<div>',
    '</div>',
    '</strong>',
    '</p>',
];

$tags_2 = [
    '<p>',
    '<strong>',
    '</strong>',
    '<div>',
    '</div>',
    '</p>',
    '<p>',
];

function tagsCheck($tagList) {
    $openTags = [];
    foreach ($tagList as $k => $tag) {
        if (!strpos($tag, '/')) {
            $openTags[] = $tag;
        } else {
            $lastOpenTag = array_pop($openTags);
            if (substr_replace($lastOpenTag, '/', 1, 0) != $tag) {
                return false;
            }
        }
    }
    $result = !empty($openTags) ? false : true;

    return $result;
}

if (tagsCheck($tags_2))
    echo 'корректная структура';
else
    echo 'некорректная структура';