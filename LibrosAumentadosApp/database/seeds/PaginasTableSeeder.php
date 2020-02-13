<?php

use Illuminate\Database\Seeder;

class PaginasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Libro 1
        //Capitulo 1
        DB::table('paginas')->insert([
            'numero_pagina' => 10,
            'texto' => 'BRAN \n 
                        El  día  había  amanecido  fresco  y  despejado,  con  un  frío  vivificante  que  señalaba  el  final  del verano.
                        Se  pusieron  en  marcha  con  la  aurora  para  ver  la  decapitación  de  un  hombre.
                        Eran  veinte  en total,  y  Bran  cabalgaba  entre  ellos,  nervioso  y  emocionado.
                        Era  la  primera  vez  que  lo  consideraban suficientemente  mayor  para  acompañar  a  su  padre  y  a  sus  hermanos  a  presenciar
                        la  justicia  del  rey. Corría el noveno año de verano, y el séptimo de la vida de Bran.
                        \n Habían sacado al hombre de un pequeño fortín de las colinas. Robb creía que se trataba de un
                        salvaje, que había puesto su espada al servicio de Mance Rayder, el Rey-más-allá-del-Muro. A Bran se
                        le ponía la carne de gallina sólo con pensarlo. Recordaba muy bien las historias que la Vieja Tata les
                        había contado junto a la chimenea. Los salvajes eran crueles, les decía, esclavistas, asesinos y
                        ladrones. Se apareaban con gigantes y con espíritus malignos, se llevaban a los niños de las cunas en
                        mitad de la noche y bebían sangre en cuernos pulidos. Y sus mujeres yacían con los Otros durante la
                        Larga Noche, para dar a luz espantosos hijos medio humanos.
                        \n Pero el hombre que vieron atado de pies y manos al muro del fortín, esperando la justicia del
                        rey, era viejo y huesudo, poco más alto que Robb. Había perdido en alguna helada las dos orejas y un
                        dedo, y vestía todo de negro, como un hermano de la Guardia de la Noche, aunque las pieles que
                        llevaba estaban sucias y hechas jirones.
                        \n El aliento del hombre y el caballo se entremezclaban en nubes de vapor en la fría mañana
                        cuando su señor padre hizo que cortaran las ligaduras que ataban al hombre al muro y lo arrastraran
                        ante él. Robb y Jon permanecieron montados, muy quietos y erguidos, mientras Bran, a lomos de su
                        poni, intentaba aparentar que tenía más de siete años y que no era la primera vez que veía algo así.
                        Una brisa ligera sopló por la puerta del fortín. En lo alto ondeaba el estandarte de los Stark de
                        Invernalia: un lobo huargo corriendo sobre un campo color blanco hielo.
                        \n El padre de Bran se erguía solemne a lomos de su caballo, con el largo pelo castaño agitado
                        por el viento. Llevaba la barba muy corta, salpicada de canas, que le hacían parecer más viejo de los
                        treinta y cinco años que tenía. Aquel día tenía una expresión adusta y no se parecía en nada al hombre
                        que por las noches se sentaba junto al. fuego y hablaba con voz suave de la edad de los héroes y los
                        niños del bosque. Bran pensó que se había quitado la cara de padre y se había puesto la de Lord Stark
                        de Invernalia.
                        \n En aquella mañana fría hubo preguntas y respuestas, pero más adelante Eran no recordaría
                        gran cosa de lo que allí se había dicho. Al final, su señor padre dio una orden, y dos de los guardias
                        arrastraron al hombre harapiento hasta un tocón de tamarindo en el centro de la plaza. Lo obligaron a
                        apoyar la cabeza en la dura madera negra. Lord Stark desmontó y Theon Greyjoy, su pupilo, le llevó la
                        espada. Se llamaba Hielo. Era tan ancha como la mano de un hombre y en posición vertical era incluso
                        más alta que Robb. La hoja era de acero valyriano, forjada con encantamientos y negra como el humo.
                        Nada tenía un filo comparable al acero valyriano.
                        \n Su padre se quitó los guantes y se los tendió a Jory Cassel, el capitán de la guardia de su casa.
                        Blandió a Hielo con ambas manos.                    
                        ',
            'capitulo_id' => 1,
        ]);
        DB::table('paginas')->insert([
            'numero_pagina' => 11,
            'texto' => 'Durante el largo camino de regreso a Invernalia parecía hacer más frío, aunque el viento ya
                        había cesado y el sol brillaba alto en el cielo. Bran cabalgaba con sus hermanos, que iban a buena
                        distancia por delante del grupo, aunque el poni tenía que esforzarse para mantener el paso de los
                        caballos.
                        \n El desertor murió como un valiente dijo Robb. Era fuerte y corpulento, y parecía crecer a
                        ojos vistas; tenía la piel clara de su madre, y también el pelo castaño rojizo y los ojos azules de los
                        Tully de Aguas dulces. Al menos tenía coraje.
                        \n No dijo Jon Nieve con voz tranquila. Eso no era coraje. Estaba muerto de miedo. Se le
                        veía en los ojos, Stark.
                        \n Los ojos de Jon eran de un gris tan oscuro que casi parecían negros, y se fijaban en todo. Tenía
                        más o menos la edad de Robb, pero no se parecían en nada. Jon era esbelto y Robb musculoso, era
                        moreno y Robb rubio, era ágil y ligero mientras que su medio hermano era fuerte y rápido.
                        \n Que los Otros se lleven sus ojos maldijo Robb sin mostrarse impresionado. Murió
                        como un hombre. ¿Una carrera hasta el puente?
                        \n De acuerdo, asintió Jon espoleando su montura.
                        \n Robb soltó una maldición y salió disparado tras él, y galoparon juntos sendero abajo. Robb iba
                        riendo y provocándolo, y Jon galopaba silencioso y concentrado. Los cascos de sus caballos
                        levantaban nubes de nieve.
                        \n Bran no intentó seguirlos. El poni no podría mantener aquel paso. También él se había fijado
                        en los ojos del hombre andrajoso, y estaba recordándolos. Al cabo de un rato, el sonido de las risas de
                        Robb se perdió a lo lejos, y los bosques quedaron de nuevo en silencio.
                        ',
            'capitulo_id' => 1,
        ]);

        //Capitulo 2
        DB::table('paginas')->insert([
            'numero_pagina' => 15,
            'texto' => 'A Catelyn nunca le había gustado aquel bosque de dioses.
                        \n La sangre Tully le corría por las venas, había nacido y se había criado en Aguasdulces, muy al
                        sur, en el Forca Roja del Tridente. Allí el bosque de dioses era un jardín alegre y despejado, en el que
                        las altas secuoyas proyectaban sombras sobre las aguas de arroyuelos cristalinos, los pájaros cantaban
                        desde sus nidos escondidos y el aroma de las flores impregnaba el aire.
                        \n Los dioses de Invernalia tenían un bosque muy diferente. Era un lugar oscuro y primitivo, tres
                        acres de árboles viejos que nadie había tocado en miles de años, mientras el castillo se alzaba a su
                        alrededor. Olía a tierra húmeda y a putrefacción. Allí no crecían las secuoyas. Era un bosque de recios
                        árboles centinela parapetados tras agujas color verde grisáceo, robles imponentes y tamarindos tan
                        viejos como el propio reino. Allí los gruesos troncos negros estaban muy juntos, y las ramas retorcidas
                        tejían una techumbre tupida, mientras las raíces deformes se entrelazaban bajo la tierra. El silencio y
                        las sombras imperaban, y los dioses de aquel bosque no tenían nombres.
                        \n Pero sabía que allí era donde estaría su esposo aquella noche. Siempre que le quitaba la vida a
                        un hombre, buscaba la tranquilidad del bosque de dioses.
                        \n Catelyn había sido ungida con los siete óleos y había recibido su nombre en el arco iris de luz
                        que llenaba el sept de Aguasdulces. Profesaba la Fe, igual que su padre, que su abuelo y que el padre
                        de su abuelo antes de ellos. Sus dioses tenían nombres y unos rostros que le eran tan familiares como
                        los de sus progenitores. El culto consistía en un septon con un incensario, el olor del incienso, un
                        cristal de siete facetas lleno de luz y voces que entonaban cánticos. Los Tully tenían un bosque de
                        dioses, como todas las grandes casas, pero no era más que un lugar por donde pasear, leer o tomar el
                        sol. El culto quedaba reservado para el sept.
                        \n Ned había hecho construir para ella un pequeño sept donde pudiera cantar a las siete caras de
                        dios, pero la sangre de los primeros hombres corría aún por las venas de los Stark, sus dioses eran
                        antiguos, eran los dioses sin rostro y sin nombre de la espesura, los mismos a los que habían adorado
                        los niños del bosque.
                        ',
            'capitulo_id' =>2,
        ]);

        DB::table('paginas')->insert([
            'numero_pagina' => 16,
            'texto' => 'Debe aprender a enfrentarse a sus miedos. —Ned frunció el ceño—. No va a tener tres
                        años toda la vida. Y se acerca el invierno.
                        \n Es verdad asintió Catelyn.
                        \n Aquellas palabras le provocaron un escalofrío, como siempre. Eran el lema de los Stark.
                        Todas las familias nobles tenían un lema. Y esas consignas familiares, piedras de toque, aquella
                        especie de plegarias, eran alardes de honor y gloria, promesas de lealtad y sinceridad, juramentos
                        de valor y fidelidad... Todos menos el de los Stark. El lema de los Stark era: «Se acerca el
                        Invierno». Catelyn reflexionó sobre lo extraños que eran aquellos norteños. No era la primera vez
                        que lo hacía.
                        \n He de reconocer que ese hombre murió bien dijo Ned. Tenía en la mano un retal de
                        cuero engrasado. Mientras hablaba, lo pasaba con suavidad por la hoja del espadón, haciendo que
                        el metal cobrara un brillo oscuro—. Me alegré por Bran. Habrías estado orgullosa de él.
                        \n Siempre me enorgullezco de Bran señaló Catelyn.
                        \n No apartaba la vista de la espada. Se veían claramente las ondulaciones del interior del
                        acero, donde el metal fuera plegado cien veces sobre sí mismo en la forja. A Catelyn no le
                        gustaban las espadas, pero era innegable que Hielo poseía una belleza propia. La habían forjado
                        en Valyria, antes de que la Condenación cayera sobre el antiguo Feudo Franco, donde los herreros
                        trabajaban el metal tanto con hechizos como con martillos. Hielo tenía cuatrocientos años y
                        conservaba el filo del día en que la forjaron. Su nombre era aún más antiguo, un legado de la edad
                        de los héroes, cuando los Stark eran los Reyes en el Norte
                        ',
            'capitulo_id' =>2,
        ]);

        //Capitulo 3
        DB::table('paginas')->insert([
            'numero_pagina' => 2,
            'texto' =>  'Su hermano le mostró el traje largo para que lo examinara.
                        "\n" Mira qué belleza. Tócalo. Venga, acaricia la tela.
                        \n Dany lo tocó. El tejido era tan suave que parecía deslizarse como agua entre los dedos. 
                        Nunca había llevado nada tan delicado. Se asustó y apartó la mano.
                        \n ¿De verdad es para mí?
                        \n Un  regalo  del  magíster  Illyrio  asintió  Viserys  con  una  sonrisa.  Aquella  noche,
                         su hermano estaba de buen humor. Este color te resaltará el violeta de los ojos. Y también dispondrás 
                         de joyas de oro, muchas. Me lo ha prometido Illyrio. Esta velada debes parecer una princesa.
                         \n Una princesa, pensó Dany. Ya se había olvidado de cómo era aquello. 
                         Quizá nunca lo había sabido del todo.
                         \n ¿Por qué nos ayuda tanto? preguntó. ¿Qué quiere de nosotros?
                         \n Llevaban casi medio año  viviendo en la casa del  magíster, comiendo en su mesa y  mimados por sus 
                         criados. Dany tenía trece años, edad suficiente para saber que regalos como aquéllos rara vez eran 
                         desinteresados allí, en la ciudad libre de Pentos.
                        ',
            'capitulo_id' =>2,
        ]);

        //Libro 2
        DB::table('paginas')->insert([
            'numero_pagina' => 3,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 2,
        ]);
        DB::table('paginas')->insert([
            'numero_pagina' => 4,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 2,
        ]);
        DB::table('paginas')->insert([
            'numero_pagina' => 5,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 2,
        ]);
        //Libro 3
        DB::table('paginas')->insert([
            'numero_pagina' => 6,
            'texto' => 'Capitulo: '.Str::random(8),
            'capitulo_id' => 3,
        ]);
    }
}
