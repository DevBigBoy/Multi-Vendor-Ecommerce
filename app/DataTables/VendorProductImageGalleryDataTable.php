<?php

namespace App\DataTables;

use App\Models\ProductImage;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\VendorProductImageGallery;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class VendorProductImageGalleryDataTable extends DataTable
{
  /**
   * Build the DataTable class.
   *
   * @param QueryBuilder $query Results from query() method.
   */
  public function dataTable(QueryBuilder $query): EloquentDataTable
  {
    return (new EloquentDataTable($query))
      ->addColumn('action', function ($query) {
        return "<a href='" .  route('vendor.products-image-gallery.destroy',  $query->id) . "' class='btn btn-danger mx-2 delete-item'> <i class='fas fa-trash'></i> Delete</a>";
      })
      ->addColumn('image', function ($query) {
        return "<img width='100px' src='" . asset($query->image_path) . "'></img>";
      })
      ->rawColumns(['image', 'action'])
      ->setRowId('id');
  }

  /**
   * Get the query source of dataTable.
   */
  public function query(ProductImage $model): QueryBuilder
  {
    return $model->where('product_id', request()->product)->newQuery();
  }

  /**
   * Optional method if you want to use the html builder.
   */
  public function html(): HtmlBuilder
  {
    return $this->builder()
      ->setTableId('vendorproductimagegallery-table')
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
      Column::make('image'),
      Column::computed('action')
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
    return 'VendorProductImageGallery_' . date('YmdHis');
  }
}
