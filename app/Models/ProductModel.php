<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class ProductModel extends Model
{
	use HasFactory;
	protected $table='tbl_products';
	 


	public function category()
	{
		// id cate->id product
		return $this->hasOne(CategoryModel::class, 'category_id', 'product_id');
	}
}
