<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\VendorProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductDataTable extends DataTable
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
        $editBtn   = "<a href='" .  route('vendor.products.edit',  $query->id) . "' class='btn btn-primary'> <i class='far fa-edit'></i> Edit</a>";
        $deleteBtn = "<a href='" .  route('vendor.products.destroy',  $query->id) . "' class='btn btn-danger mx-2 delete-item'> <i class='fas fa-trash'></i> Delete</a>";
        $moreBtn = '
            <div class="btn-group dropstart">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-cog"></i>
              </button>
              <ul class="dropdown-menu">
                <a class="dropdown-item has-icon" href="' . route('vendor.products-image-gallery.index', ['product' => $query->id]) . '">
                   Image Gallery
                </a>
                <a class="dropdown-item has-icon" href="' . route('vendor.products-variant.index', ['product' => $query->id]) . '">
                   Varients
                </a>
              </ul>
            </div>';
        return $editBtn . $deleteBtn . $moreBtn;
      })
      ->addColumn('Image', function ($query) {
        return "<img height='90px' src='" . asset($query->thumb_image) . "'></img>";
      })
      ->addColumn('category', function ($query) {
        return $query->category->name;
      })
      ->addColumn('is_approved', function ($query) {
        if ($query->is_approved == 1) {
          return "<span class='badge bg-success'>Approved</span>";
        } elseif ($query->is_approved == 0) {
          return "<span class='badge bg-danger'>Pending</span>";
        }
      })
      ->addColumn('subcategory', function ($query) {
        return $query->subcategory->name;
      })
      ->addColumn('Product Type', function ($query) {
        switch ($query->product_type) {
          case 'new_arrival':
            return '<i class="badge bg-success">New Arrival</i>';
            break;

          case 'best_product':
            return '<i class="badge bg-warning">Best Product</i>';
            break;

          case 'top_product':
            return '<i class="badge bg-info">Top Product</i>';
            break;

          case 'featured_product':
            return '<i class="badge bg-danger">Featured Product</i>';
            break;

          default:
            return '<i class="badge badge-dark">NONE</i>';
            break;
        }
      })
      ->addColumn('Status', function ($query) {
        if ($query->status == 1) {


          $button = '
              <div class="form-check form-switch">
                <input class="form-check-input change-status" checked type="checkbox" data-id="' . $query->id . '" id="flexSwitchCheckDefault">
              </div>
           ';
        } elseif ($query->status == 0) {


          $button = '
          <div class="form-check form-switch">
            <input class="form-check-input change-status" type="checkbox" data-id="' . $query->id . '" id="flexSwitchCheckDefault" >
          </div>
       ';
        }
        return $button;
      })
      ->rawColumns(['Action', 'Image', 'is_approved', 'Product Type', 'Status'])
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(Product $model): QueryBuilder
  {
    return $model->where('vendor_id', Auth::user()->vendor->id)->newQuery();
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('vendorproduct-table')
      ->columns($this->getColumns())
      ->minifiedAjax()
      //->dom('Bfrtip')
      ->orderBy(1)
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
      Column::make('name'),
      Column::make('price'),
      Column::make('is_approved'),
      Column::make('Image'),
      Column::make('Product Type'),
      Column::make('Status'),
      Column::make('category'),
      Column::make('subcategory'),
      Column::computed('Action')
        ->exportable(false)
        ->printable(false)
        ->addClass('text-center'),
    ];
  }

  /**
   * Get the filename for export.
   */
  protected function filename(): string
  {
    return 'VendorProduct_' . date('YmdHis');
  }
}