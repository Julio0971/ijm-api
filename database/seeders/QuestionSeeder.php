<?php

namespace Database\Seeders;

use App\Models\Question;

use Illuminate\Http\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run () {
        Storage::deleteDirectory('videos');

        Question::create([
            'name' => 'Camino al trabajo',
            'question' => '¿Consideras apropiado tomar el tren ligero para gastar menos dinero, aunque eso implique llegar veinte minutos tarde al trabajo?',
            'description' => 'Vas un poco tarde al trabajo. Tomar el tren ligero implicaría que llegaras unos veinte minutos tarde, dada la distancia que tienes que caminar para llegar a la estación. Por otro lado, puedes tomar un taxi por medio de una aplicación y así llegar sólo cinco minutos tarde, pero esto te costaría cinco veces lo que costaría tomar el tren.',
            'video' => Storage::putFile('videos', new File(public_path('videos/camino_al_trabajo.mp4')))
        ]);
        
        Question::create([
            'name' => 'La cena',
            'question' => '¿Consideras apropiado invitar a esta persona a un restaurante lujoso, aunque la comida no sea tan buena?',
            'description' => 'Tienes dinero suficiente. Estás indeciso entre dos opciones de restaurantes a los que invitar a comer a una persona con la que pretendes una relación amorosa. Una de las opciones es un restaurante lujoso en el que la comida no es tan buena. La segunda opción es un restaurante carente de lujos en el que la comida es muy buena.',
            'video' => Storage::putFile('videos', new File(public_path('videos/la_cena.mp4')))
        ]);
        
        Question::create([
            'name' => 'Variante 1 (hombre)',
            'question' => '¿Consideras apropiado matar al hombre, herido de muerte, para salvar al resto de la tripulación?',
            'description' => 'Eres capitán de un submarino militar que navega bajo un enorme iceberg. Hay una explosión a bordo que provoca la pérdida de tu reserva de oxígeno y ha herido a un hombre que pierde sangre rápidamente. El hombre morirá sin importar lo que hagas. Lo que queda de oxígeno no es suficiente para que toda la tripulación llegue con vida a la superficie. La única forma de salvar al resto de la tripulación es matar al hombre herido para que haya suficiente oxígeno para que el resto sobreviva.',
            'video' => Storage::putFile('videos', new File(public_path('videos/hombre.mp4')))
        ]);
        
        Question::create([
            'name' => 'Variante 2 (mujer)',
            'question' => '¿Consideras apropiado matar a la mujer, herida de muerte, para salvar al resto de la tripulación?',
            'description' => 'Eres capitán de un submarino militar que navega bajo un enorme iceberg. Hay una explosión a bordo que provoca la pérdida de tu reserva de oxígeno y ha herido a una mujer que pierde sangre rápidamente. La mujer morirá sin importar lo que hagas. Lo que queda de oxígeno no es suficiente para que toda la tripulación llegue con vida a la superficie. La única forma de salvar al resto de la tripulación es matar a la mujer herida para que haya suficiente oxígeno para que el resto sobreviva.',
            'video' => Storage::putFile('videos', new File(public_path('videos/mujer.mp4')))
        ]);
        
        Question::create([
            'name' => 'Variante 3 (neutro)',
            'question' => '¿Consideras apropiado matar a la persona, herida de muerte, para salvar al resto de la tripulación?',
            'description' => 'Eres capitán de un submarino militar que navega bajo un enorme iceberg. Hay una explosión a bordo que provoca la pérdida de tu reserva de oxígeno y ha herido a una persona que pierde sangre rápidamente. La persona morirá sin importar lo que hagas. Lo que queda de oxígeno no es suficiente para que toda la tripulación llegue con vida a la superficie. La única forma de salvar al resto de la tripulación es matar a la mujer herida para que haya suficiente oxígeno para que el resto sobreviva.',
            'video' => Storage::putFile('videos', new File(public_path('videos/neutro.mp4')))
        ]);
    }
}