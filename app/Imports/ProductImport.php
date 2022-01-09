<?php 
namespace App\Imports;

use App\Models\Import;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $row)
    {
        DB::beginTransaction();

        try {
            $import = Import::create([
                'supplier_id' => 1,
                'impo_total' => 0,
                'impo_process' => 2,
                'impo_qty' => 0,
                'created_by' => 1,
                'updated_by' => 1
            ]);

            $total=0;
            $qty = 0;

            foreach($row as $key => $value){
                $product = Product::where('prod_name',$value['product_name'])->first();
                $category = Category::where('cate_name',$value['category'])->first();

                if(!$category){
                    $category = Category::create([
                        'cate_name' => $value['category'],
                        'cate_status' => 1
                    ]);
                }

                if(!$product){
                    $product = Product::create([
                        'category_id' => $category->id,
                        'prod_name' => $value['product_name'],
                        'prod_unit' =>$value['unit'],
                        'prod_cost' =>$value['price'],
                        'prod_price' =>$value['price'],
                        'prod_qty' => 0,
                        'prod_discount' => 0,
                        'prod_bar_code' => null,
                        'prod_picture' => null,
                        'prod_status' => 1,
                    ]);
                }

                $import->items()->create([
                    'product_id' => $product->id,
                    'ipi_name' => $value['product_name'],
                    'ipi_qty' => $value['quantity'],
                    'ipi_unit' => $value['unit'],
                    'ipi_price' => $value['price'],
                    'ipi_total' => $value['price'] * $value['quantity'],
                ]);

                $total += $value['price'] * $value['quantity'];
                $qty += $value['quantity'];
            }

            $import->impo_total = $total;
            $import->impo_qty = $qty;
            $import->save();


            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
}