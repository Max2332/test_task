<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 07.07.18
 * Time: 1:28
 */

namespace App\Module\Search\Model;


use App\Module\Search\Entity\SearchResultEntity;
use Structure\Base\Model\Model;

class SearchResultModel extends Model
{
    protected $table = 'search_results';

    protected $entityClassName = SearchResultEntity::class;

    public function fragment() {
        return $this->belongsTo(FragmentModel::class, 'fragment_id');
    }
}