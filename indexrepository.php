<?php

namespace App\Repositories\Human;


use App\Models\Human\Human;
use App\Interaface\Human\IndexInterface;

class IndexRepository implements IndexInterface
{

    /**
     *  Возвращает массив сущнойсте человека со сранице $page в колл. $limit
     *  включая модули $modulus, по правилам фильтрации $filters
     *
     * @param $limit - колл. элементов выдачи
     * @param $page - номер страницы
     * @param $modulus - модули которые нужно включить в ответ
     * @param $filters - правила фильтрации
     *
     * return array objects human
     *
     * @return mixed
     */
    public function getAll($limit,$page,$modulus,$filters)
    {
        return Human::getAll($limit, $page, $modulus,$filters);
    }
}
