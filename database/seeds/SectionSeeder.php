<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home_id    = Page::where('name', 'home')->first()->id;
        $empresa_id = Page::where('name', 'empresa')->first()->id;

        /** Home */
        Section::create([
            'page_id' => $home_id,
            'name' => 'section_1'
        ]);

        Section::create([
            'page_id' => $home_id,
            'name' => 'section_2'
        ]);

        /** Empresa */

        Section::create([
            'page_id' => $empresa_id,
            'name' => 'section_1'
        ]);

        Section::create([
            'page_id' => $empresa_id,
            'name' => 'section_2'
        ]);


        /** calidad */

        Section::create([
            'page_id' => Page::where('name', 'calidad')->first()->id,
            'name' => 'section_1'
        ]);

        /** descargas */

        Section::create([
            'page_id' => Page::where('name', 'descargas')->first()->id,
            'name' => 'section_1'
        ]);
    }
}
