<?php

namespace App\DataTables;

use App\Helpers\Helper;
use App\Models\Homepage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class HomepageDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
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
                    $tanggal .= '<p class="me-2">' . $multiprice->date_modified . '</p>';
                }

                return $tanggal;
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . URL::asset('storage/' . $query->img_path) . '" style="height: 200px; width: 200px; object-fit: cover;">';
            })
            ->addIndexColumn()
            ->setRowId('id')
            ->rawColumns(['harga_jual', 'tanggal', 'image']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        $query = Product::with('MultiPrice');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('homepage-table')
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
            Column::computed('image')->title('Foto Produk')->width(250),
            'product_id' => new Column([
                'title' => 'Nama Produk',
                'data' => 'product_name',
                'name' => 'product_name'
            ]),
            ['data' => 'harga_jual', 'title' => 'Harga Jual'],
            ['data' => 'tanggal', 'title' => 'Tanggal']
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Homepage_' . date('YmdHis');
    }
}
