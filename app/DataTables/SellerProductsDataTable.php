<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerProductsDataTable extends DataTable
{
  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
      ->addColumn('Action', function ($query) {
        $editBtn   = "<a href='" .  route('admin.product.edit',  $query->id) . "' class='btn btn-primary'> <i class='far fa-edit'></i> Edit</a>";
        $deleteBtn = "<a href='" .  route('admin.product.destroy',  $query->id) . "' class='btn btn-danger mx-2 delete-item'> <i class='fas fa-trash'></i> Delete</a>";
        $moreBtn = '<div class="btn-group dropleft">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item has-icon" href="' . route('admin.product_image_gallery.index', ['product' => $query->id]) . '"><i class="far fa-heart"></i> Image Gallery</a>
                      <a class="dropdown-item has-icon" href="' . route('admin.product_variant.index', ['product' => $query->id]) . '"><i class="far fa-file"></i> Varients</a>
                    </div>
                  </div>';
        return $editBtn . $deleteBtn . $moreBtn;
      })
      ->addColumn('Image', function ($query) {
        return "<img width='100px' src='" . asset($query->thumb_image) . "'></img>";
      })
      ->addColumn('category', function ($query) {
        return $query->category->name;
      })

      ->addColumn('subcategory', function ($query) {
        return $query->subcategory->name;
      })


      ->addColumn('Product Type', function ($query) {
        switch ($query->product_type) {
          case 'new_arrival':
            return '<i class="badge badge-success">New Arrival</i>';
            break;

          case 'best_product':
            return '<i class="badge badge-warning">Best Product</i>';
            break;

          case 'top_product':
            return '<i class="badge badge-info">Top Product</i>';
            break;

          case 'featured_product':
            return '<i class="badge badge-danger">Featured Product</i>';
            break;

          default:
            return '<i class="badge badge-dark">NONE</i>';
            break;
        }
      })
      ->addColumn('Status', function ($query) {
        if ($query->status == 1) {
          $button = '
          <label class="custom-switch mt-2">
            <input type="checkbox" checked name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status">
            <span class="custom-switch-indicator"></span>
          </label>';
        } elseif ($query->status == 0) {
          $button = '
          <label class="custom-switch mt-2">
            <input type="checkbox" name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status">
            <span class="custom-switch-indicator"></span>
          </label>';
        }
        return $button;
      })
      ->addColumn('vendor', function ($query) {
        return $query->vendor->shop_name;
      })
      ->rawColumns(['Action', 'Image', 'Product Type', 'Status', 'vendor'])
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Product $model): QueryBuilder
  {
    return $model->where('vendor_id', '<>', Auth::user()->vendor->id)->newQuery();
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('sellerproducts-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      //->dom('Bfrtip')
      ->orderBy(0)
      ->selectStyleSingle()
      ->buttons([
        Button::make('excel'),
        Button::make('csv'),
        Button::make('pdf'),
        Button::make('print'),
        Button::make('reset'),
        Button::make('reload')
      ]);
  }

  /**
   * Get the dataTable columns definition.
   */
  public function getColumns(): array
  {
    return [
      Column::make('id'),
      Column::make('vendor'),
      Column::make('name'),
      Column::make('price'),
      Column::make('Image'),
      Column::make('Product Type'),
      Column::make('Status'),
      Column::computed('Action')
        ->exportable(false)
        ->printable(false)
        ->width(300)
        ->addClass('text-center'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'SellerProducts_' . date('YmdHis');
  }
}
