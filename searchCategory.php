<?php

$categories = array(
    array(
        'id' => 1,
        "title" => "Обувь",
        'children' => array(
            array(
                'id' => 2,
                'title' => 'Ботинки',
                'children' => array(
                    array(
                        'id' => 10,
                        'title' =>'Херня',
                        'children' => array()
                    ),
                ),
            ),
            array(
                'id' => 5,
                'title' => 'Кроссовки',
            ),
        )
    ),
    array(
        "id" => 6,
        "title" => "Спорт",
        'children' => array(
            array(
                'id' => 7,
                'title' => 'Мячи'
            )
        )
    ),
);

function searchCategory($categories, $id)
{
    foreach ($categories as $category) {
        if (is_array($category) && $category['id'] == $id) {
            return exit ($category['title']);
        } elseif (isset($category['children'])) {
            searchCategory($category['children'], $id);
        }
    }
}
searchCategory($categories, 7);