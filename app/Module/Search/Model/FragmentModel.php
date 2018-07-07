<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 07.07.18
 * Time: 1:22
 */

namespace App\Module\Search\Model;


use App\Module\Search\Entity\FragmentEntity;
use Structure\Base\Model\Model;

class FragmentModel extends Model
{

    protected $table = 'fragments';

    protected $entityClassName = FragmentEntity::class;

    public $timestamps = true;

    public function searchResults() {
        return $this->hasMany(SearchResultModel::class);
    }
}