<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: zhangyajun <448901948@qq.com>
// +----------------------------------------------------------------------

namespace think\model;

use think\Collection as BaseCollection;
use think\Model;

class Collection extends BaseCollection
{
    /**
     * 返回数组中指定的一列
     * @access public
     * @param  string        $column_key
     * @param  string|null   $index_key
     * @return array
     */
    public function column($column_key, $index_key = null)
    {
        return array_column($this->toArray(), $column_key, $index_key);
    }

    /**
     * 延迟预载入关联查询
     * @access public
     * @param  mixed $relation 关联
     * @return $this
     */
    public function load($relation)
    {
        $item = current($this->items);
        $item->eagerlyResultSet($this->items, $relation);

        return $this;
    }

    /**
     * 设置需要隐藏的输出属性
     * @access public
     * @param  array $hidden   属性列表
     * @param  bool  $override 是否覆盖
     * @return $this
     */
    public function hidden(array $hidden, bool $override = false)
    {
        $this->each(function (Model $model) use ($hidden, $override) {
            $model->hidden($hidden, $override);
        });

        return $this;
    }

    /**
     * 设置需要输出的属性
     * @access public
     * @param  array $visible
     * @param  bool  $override 是否覆盖
     * @return $this
     */
    public function visible(array $visible, bool $override = false)
    {
        $this->each(function (Model $model) use ($visible, $override) {
            $model->visible($visible, $override);
        });

        return $this;
    }

    /**
     * 设置需要追加的输出属性
     * @access public
     * @param  array $append   属性列表
     * @param  bool  $override 是否覆盖
     * @return $this
     */
    public function append(array $append, bool $override = false)
    {
        $this->each(function (Model $model) use ($append, $override) {
            $model && $model->append($append, $override);
        });

        return $this;
    }

}
