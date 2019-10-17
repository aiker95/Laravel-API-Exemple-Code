<?php

namespace App\Models\Human;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Entity\Human\IndexEntity;

/**
 *
 * Модель таблицы Human.
 * Здесь описаны свойства и методы модели Human.
 */

class Human extends Model
{
    use SoftDeletes;

    /**
     *
     * Имя таблицы.
     *
     * @var string
     */
    protected $table = 'human.human';

    /**
     * Отключаем автоматическое создание записей updated_at и created_at
     *
     * @var boolean
     */
    //public $timestamps = false;

    /**
     * Включение мягких удалений.
     *
     * @var boolean
     */
    protected $softDelete = true;

    /**
     * Добовляем в массив имя столбца для мягких удалений.
     *
     * @var  array
     */
    protected $dates = ['deleted_at'];

    /**
     * Установка первичного ключа для данной модели.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * Отключить autoincrementing ID.
     *
     * @var boolean
     */
    //public $incrementing = false;

    /**
     * Тип переменной первичного ключа.
     *
     * @var string.
     */
    protected $keyType = 'string';

    protected $guarded = [];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected static $availableBaseFields = [
        'snils',
        'inn',
        'last_name',
        'first_name',
        'father_name',
        'gender',
        'birthday',
    ];

    /**
     * @return string
     */
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

    /**
     *
     * @var integer максимальное количество вывода элементов за раз
     */
    protected static $limit = 100;

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
    public static function getAll($limit, $page, $modulus,$filters)
    {
        $HumanEntity =  new IndexEntity();
        return $HumanEntity->module( $modulus )
            ->where($filters)
            ->get($limit,$page);
    }

}
