<?php

namespace App\DataTables;

use App\Helpers\Helper;
use App\Models\MultiPrice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MultiPricesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', 'multiprices.action')
            ->addColumn('harga_modal', function ($product) {
                $harga_modal = '';
                $helper = new Helper();

                foreach ($product->MultiPrice as $multiprice) {
                    if ($multiprice->capital_price != null || $multiprice->capital_price != '') {
                        $harga_modal .= '<p>' . $multiprice->amount . ' ' . $multiprice->unit->unit_name . ' = ' . $helper->formatRupiah($multiprice->capital_price) . '</p>';
                    }
                }

                return $harga_modal;
            })
            ->addColumn('harga_jual', function ($product) {
                $harga_jual = '';
                $helper = new Helper();

                foreach ($product->MultiPrice as $multiprice) {
                    if ($multiprice->selling_price != null || $multiprice->selling_price != '') {
                        $harga_jual .= '<p>' . $multiprice->amount . ' ' . $multiprice->unit->unit_name . ' = ' . $helper->formatRupiah($multiprice->selling_price) . '</p>';
                    }
                }

                return $harga_jual;
            })
            ->addColumn('tanggal', function ($product) {
                $tanggal = '';

                foreach ($product->MultiPrice as $multiprice) {
                    $tanggal .= '<div class="d-flex align-middle">' . '<p class="me-2">' . $multiprice->date_modified . '</p>' . view('multiprices.action', compact('multiprice')) . '</div>';
                }

                return $tanggal;
            })
            ->addIndexColumn()
            ->setRowId('id')
            ->rawColumns(['harga_modal', 'action', 'harga_jual', 'tanggal']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        // return $model->newQuery()->with(['product']);
        $query = Product::with('MultiPrice');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('multiprices-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->searchable(false)->orderable(false)->title('No. ')->width(10),
            'product_id' => new Column([
                'title' => 'Nama Produk',
                'data' => 'product_name',
                'name' => 'product_name'
            ]),
            ['data' => 'harga_modal', 'title' => 'Harga Modal'],
            ['data' => 'harga_jual', 'title' => 'Harga Jual'],
            ['data' => 'tanggal', 'title' => 'Tanggal'],
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'MultiPrices_' . date('YmdHis');
    }
}
