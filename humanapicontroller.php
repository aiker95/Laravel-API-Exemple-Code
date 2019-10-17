<?php

namespace App\Http\Controllers\API\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interaface\Human\IndexInterface;


class HumanApiController extends Controller
{

    /**
     * @var IndexInterface
     */

    public function __construct(IndexInterface $human)
    {
        $this->human = $human;
    }


    /**
     *
     * Получить сущности человека с пагинацией
     *
     * @params  page  : 1               Номер страницы
     * @params  limit : 1               Кол-во элементов на странице
     *
     *
     *
     *  при методе POST функция дополнительно принимает массив парметров модулей объекта и правила фильтрации,
     *      Если не передвать модули объекта, по умолчанию будут выведены ["human","phone","email","telegram"]
     *
     *      Возможные мудули человека [
     *          "human", - основные парметры человека
     *          "phone", - телефоны человека
     *          "email", - email человека
     *          "telegram", - telegram человека
     *          "address", - адреса человека
     *          "work",   - информация о работе человека
     *          "education", -  образование человека
     *          "hdoc"       - документы человка
     *      ]
     *
     * @params  filters : [
     *                      {
     *                          "name"   : "inn",         - наименование значения по которому происходит поиск
     *                          "value"  : "502498371272" - значение для сравнения
     *                      }
     *                     ]
     *
     * @params modulus : [ "human","phone","email"]      - модули которые нужно включить в ответ
     *
     * @Response{
     *     array objects human
     * }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll(Request $request)
    {

        $limit    = isset($request->limit)    ? $request->limit    : 100;
        $page     = isset($request->page)     ? $request->page     : 0;
        $modulus  = isset($request->modulus)  ? $request->modulus  : ["human","phone","email","telegram"];
        $filters  = isset($request->filters)  ? $request->filters  : [];

        return response()->json( $this->human->getAll( $limit, $page, $modulus ,$filters ));
    }


}
