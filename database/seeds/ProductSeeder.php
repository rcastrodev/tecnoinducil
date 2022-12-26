<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'SIAF',
            'description' => '<p>Cable unipolar flexible
            con aislación caucho silicona</p>',
            'application' => '<p>Cable para instalaciones internas de artefactos electrodomésticos e industriales y de iluminación donde exista una protección mecánica y de sustancias químicas que puedan dañar la vaina</p>',
            'characteristic' => '<div>
            <p>Conductor: <strong>Cobre rojo / estañado</strong></p>
            <p>Tensión de ejercicio máxima: <strong>450/750 V</strong></p>
            <p>Aislación: <strong>Caucho silicona</strong></p>
            <p>Tensión de prueba: <strong>2500 V</strong></p>
            <p>Especificaciones: <strong>NORMA IRAM - NM 274 :2003</strong></p>
            <p>Tensión de spark-test: <strong>7500 V / 10000 V 12500 V</strong></p>
            <p>Tensión de trabajo: <strong>-60 + 180ºC</strong></p>
            </div>',
            'outstanding' => 1,
        ]);
    }
}


