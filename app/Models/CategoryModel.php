<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table='tbl_category_product';
    protected $fillable=['category_name','category_desc','category_parent','category_status'];
    protected $primaryKey='category_id';
    
    public function scopeGetbyidchild($query,$category_parent )
    {
        $data = $query
        ->join('tbl_products','tbl_products.category_id','=','tbl_category_product.category_id')
        ->where('tbl_category_product.category_id',$category_parent )->get();
        return $data;
    } 
    public function scopeGetbyiddaddy($query,$category_parentt )
    {
        $data = $query
        ->join('tbl_products','tbl_products.category_id','=','tbl_category_product.category_id')
        ->where('tbl_category_product.category_id',$category_parentt)->orwhere('tbl_category_product.category_parent',$category_parentt )->paginate(20);
        return $data;
    }

    public function scopeAdddata($query )
    {
      
        $data = array();
        //Tên cột trong database=tên input truyền vào
        $data['category_name']= request()->category_product_name;
        $data['category_desc']= request()->category_product_desc;
        $data['category_parent']= request()->category_parent;
        $data['category_status']= request()->category_product_status;       
        //Add data
        return $query->insert($data);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    }
    public function scopeEdit($query,$category_product_id)
    {
        $data=$query->where('category_id',$category_product_id)->get();
        return $data;    
    }
    public function scopeUpdatedata($query,$category_product_id)
    {
        //$this->AuthLogin();
        $data=array();  
        $data['category_name']= request()->category_product_name;
        $data['category_desc']= request()->category_product_desc;
        $data['category_parent']= request()->category_parent;
        //update data
        return  $query->where('category_id',$category_product_id)->update($data);
    }
    public function scopeDeletedata($query,$category_product_id)
    {
        return $query->where('category_id',$category_product_id)->delete();

    }
    public function scopeActive($query,$category_product_id)
    {
          return $query->where('category_id',$category_product_id)->update(['category_status'=>0]);
    }
    public function scopeUnactive($query,$category_product_id)
    {
        return $query->where('category_id',$category_product_id)->update(['category_status'=>1]);
    }

    public function product()
    {
        return $this->hasMany(ProductModel::class, 'category_id', 'category_id')->limit(5);
    }
    public function children()
    {
         return $this->hasMany(CategoryModel::class,'category_parent', 'category_id')->limit(4);
    }
    public function getProduct($id) 
	{
        $danhmuccha = CategoryModel::where('category_id', $id)->get();
		$danhmuc = CategoryModel::where('category_id', $id)->get();
		$arr = [];
        foreach($danhmuc as $d){
            
                array_push($arr, $d->children()->get());
           
        }
        $newArr = [];
        foreach($arr as $ar)
        {
            foreach($ar as $a)
            {
                foreach($a->product as $hf)
                {

                    array_push($newArr, $hf);
                }
            }
        };
       
        $newArr1 = [];
        foreach($danhmuccha as $dmc)
        {
            foreach($dmc->product as $c)
            {
                array_push($newArr1, $c);
            }
            
        }
        
        $dd = array_merge($newArr, $newArr1);
       
        return $dd;
    }   

}

