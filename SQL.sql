SELECT
    CONCAT(first_name, ' ', last_name) AS emploeey,
    GROUP_CONCAT(DISTINCT(NAME)) AS childrens,
    model
FROM
    worker
LEFT JOIN child ON worker.id = child.user_id
LEFT JOIN car ON worker.id = car.user_id
WHERE
    car.user_id IS NOT NULL
GROUP BY
    first_name,
    last_name,
    model