<?php
require_once './models/Venta.php';

class ReporteController
{
    private $ventaModel;

    public function __construct()
    {
        $this->ventaModel = new Venta();
    }

    public function index()
    {
        $ventas = $this->ventaModel->getAllWithDetalle(); // Ventas con productos y totales
        require 'views/reportes/index.php';
    }

    public function exportCSV()
    {
        $ventas = $this->ventaModel->getAllWithDetalle();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="reporte_ventas.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID Venta', 'Cliente', 'Fecha', 'Producto', 'Cantidad', 'Precio Unitario', 'Subtotal']);

        foreach ($ventas as $v) {
            foreach ($v['productos'] as $p) {
                fputcsv($output, [
                    $v['id'],
                    $v['cliente'],
                    $v['fecha'],
                    $p['nombre'],
                    $p['cantidad'],
                    $p['precio_unitario'],
                    $p['subtotal']
                ]);
            }
        }
        fclose($output);
        exit;
    }
}
