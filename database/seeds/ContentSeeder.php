<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        Content::create([
            'section_id'    => 1,
            'image'         => 'images/home/imagerobot2.png',
            'content_1'     => 'ESPECIALISTAS EN CABLES PARA ALTA Y BAJA TEMPERATURA',
            'content_2'     => 'Acompañamos a la industria con productos de alta calidad para las más diversas aplicaciones.'
        ]);

        Content::create([
            'section_id'    => 2,
            'image'         => 'images/home/10171039_645987645510972_5507788890925517890_n[1]1.png',
            'content_1'     => 'SOBRE NOSOTROS', 
            'content_2'     => '<p>Los inicios de nuestra industria se ubican en enero de 1958, cuando, con la experiencia adquirida en por nuestros fundadores se funda nuestra empresa para satisfacer a nuestros clientes, innovar continuamente y ser líderes en el área.</p>'
        ]);

        Content::create([
            'section_id' => 3,
            'image'         => 'images/company/Rectangle205.png',
            'content_1'     => 'Sobre nosotros', 
            'content_2'     => '<p>TECNO-INDUSIL S.A. está situada en Buenos Aires, Argentina y es una empresa dedicada a la fabricación de conductores eléctricos especiales para alta y baja temperatura, teniendo el aval tecnológico de su asociada SILTEK S.p.A., con casa matriz en Italia.
            Contamos con la experiencia y conocimiento del mercado de América Latina, sumando a Cables IMCOEX E.I.R.L. como distribuidora exclusiva para el territorio de Chile.
            Nuestra Empresa posee un parque de máquinas y laboratorio de ensayos de última generación, controles estrictos de producción, materias primas de óptima calidad, garantizando por lo tanto una gama de productos de acuerdo a las exigencias internacionales.
            </p>'
        ]);

        Content::create([
            'section_id'    => 4,
            'order'         => 'A1',
            'image'         => 'images/company/Trazado6951.png',
            'content_1'     => 'Misión', 
            'content_2'     => '<p>Somos un grupo de profesionales con una clara visión: satisfacer a nuestros clientes, crear oportunidades, innovar continuamente y ser líderes en el área.</p>'
        ]);

        Content::create([
            'section_id' => 4,
            'order'         => 'A2',
            'image'         => 'images/company/Trazado6950.png',
            'content_1'     => 'Visión', 
            'content_2'     => '<p>Estamos principalmente enfocados en la confianza y especialmente comprometidos con el desarrollo de una actividad que logre satisfacer siempre.</p>'
        ]);

        Content::create([
            'section_id' => 4,
            'order'         => 'A3',
            'image'         => 'images/company/noun-fast195788.png',
            'content_1'     => 'Valores', 
            'content_2'     => '<p>La disponibilidad permanente de nuestros variados productos, permite enviar en forma rápida y precisa a todos los centros de comercialización.</p>'
        ]);

        Content::create([
            'section_id' => 5,
            'content_1'     => 'Política Integral de Gestión', 
            'content_2'     => '<p>Somos una empresa certificada en busqueda de mejora permanente. La constante investigación de mercados a nivel mundial le brinda a TECNO-INDUSIL una herramienta única: el conocimiento de nuevas propuestas y/o materiales, buscando implementarlas a nivel local.</p>
            <p>Creemos en la importancia de una comunicación fluida, fortaleciendo el crecimiento mutuo y sustentable.</p>'
        ]);
        
        Content::create([
            'section_id' => 6,
            'order'         => 'A1',
            'image'         => 'images/download/Rectangle4050.png',
            'image1'        => 'images/download/Rectangle4050.png',
            'content_1'     => 'Catálogo 2022', 
            'content_2'     => '<p>Descargá nuestro catálogo actualizado con todos nuestros artículos en venta</p>'
        ]);
    
        Content::create([
            'section_id' => 6,
            'order'         => 'A2',
            'image'         => 'images/download/Rectangle4050.png',
            'image1'        => 'images/download/Rectangle4050.png',
            'content_1'     => 'Certificado de producto SIAF y SHIF ', 
            'content_2'     => '<p>Descargá nuestro certificado bajo norma NM 274 : 2003</p>'
        ]);
    }
}
