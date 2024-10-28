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