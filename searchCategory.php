<?php

$categories = [
    [
        'id' => 1,
        "title" => "Обувь",
        'children' => [
            [
                'id' => 2,
                'title' => 'Ботинки',
                'children' => [
                    [
                        'id' => 10,
                        'title' =>'Что-то, с чем-то',
                        'children' => []
                    ],
                ],
            ],
            [
                'id' => 5,
                'title' => 'Кроссовки',
            ],
        ]
    ],
    [
        "id" => 6,
        "title" => "Спорт",
        'children' => [
            [
                'id' => 7,
                'title' => 'Мячи'
            ]
        ]
    ],
];

function searchCategory($categories, $id)
{
   $title = false;
    foreach ($categories as $category) {
        if (is_array($category) && $category['id'] == $id) {
            return $category['title'];
        } elseif (isset($category['children'])) {
            $title = searchCategory($category['children'], $id);
            if ($title !== false) {
                return $title;
            };
        }
    }
    return $title;
}
var_dump(searchCategory($categories, 5));