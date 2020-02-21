<?php

use Illuminate\Database\Seeder;

class LibroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libros = [
            ['IDLibro' => null,
            'Autor' => 'James Dashner',
            'Descripcion' => '«Bienvenido al bosque. Verás que una vez a la semana, siempre el mismo día y a la misma hora, nos llegan víveres. Una vez al mes, siempre el mismo día y a la misma hora, aparece un nuevo chico, como tú. Siempre un chico. Como ves, este lugar está cercado por muros de piedra… Has de saber que estos muros se abren por la mañana y se cierran por la noche, siempre a la hora exacta. Al otro lado se encuentra el laberinto. De noche, las puertas se cierran… y, si quieres sobrevivir, no debes estar allí para entonces».

            Todo sigue un orden… y, sin embargo, al día siguiente suena una alarma. Significa que ha llegado alguien más. Para asombro de todos, es una chica. Su llegada vendrá acompañada de un mensaje que cambiará las reglas del juego.
            
            ¿Y si un día abrieras los ojos y te vieses en un lugar desconocido sin saber nada más que tu nombre?
            
            Cuando Thomas despierta, se encuentra en una especie de ascensor. No recuerda qué edad tiene, quién es ni cómo es su rostro. Sólo su nombre.
            
            De pronto, el ascensor da un zarandeo y se detiene. Las puertas se abren y una multitud de rostros le recibe. «Bienvenido al Claro -dice uno de los adolescentes-. Aquí es donde vivimos. Esta es nuestra casa. Fuera está el laberinto. Yo soy Alby; él, Newt. Y tú eres el primero desde que mataron a Nick».',
            'Nombre' => 'El corredor del laberinto',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 9788493801311],

            ['IDLibro' => null,
            'Autor' => 'James Dashner',
            'Descripcion' => 'EL LABERINTO ERA SÓLO EL PRINCIPIO.
            Resolver el laberinto se suponía que era el final. No más pruebas, no más huidas. Thomas creía que salir significaba que todos recobrarían sus vidas, pero ninguno sabía a qué clase de vida estaban volviendo.
            Árida y carbonizada, gran parte de la tierra es un territorio inservible. El sol abrasa, los gobiernos han caído y una misteriosa enfermedad se ha ido apoderando poco a poco de la gente. Sus causas son desconocidas; su resultado, la locura.
            En un lugar infestado de miseria y ruina, y por donde la gente ha enloquecido y deambula en busca de víctimas, Thomas conoce a una chica, Brenda, que asegura haber contraído la enfermedad y estar a punto de sucumbir a sus efectos. Entretanto, Teresa ha desaparecido, la organización CRUEL les ha dejado un mensaje, un misterioso chico ha llegado y alguien ha tatuado unas palabras en los cuellos de los clarianos. La de Minho dice «el líder»; la de Thomas, «el que debe ser asesinado».',
            'Nombre' => 'Las pruebas',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 9788493920005],

            ['IDLibro' => null,
            'Autor' => 'James Dashner',
            'Descripcion' => '«MÁTAME. SI ALGUNA VEZ HAS SIDO MI AMIGO, MÁTAME».
            Desde hace tres semanas, Thomas vive en una habitación sin ventanas, de un blanco resplandeciente y siempre iluminada. Sin reloj y sin contacto con nadie, más allá de las tres bandejas de comida que alguien le lleva a diario (aunque a horas distintas, como para desorientarle).
            
            Al vigésimo sexto día, la puerta se abre y un hombre le conduce a una sala llena de viejos amigos.
            
            —Muy bien, damas y caballeros. Estáis a punto de recuperar todos vuestros recuerdos. Hasta el último de ellos.',
            'Nombre' => 'La cura mortal',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 9788493975036],

            ['IDLibro' => null,
            'Autor' => 'J. K. Rowling',
            'Descripcion' => 'Harry Potter se ha quedado huérfano y vive en casa de sus abominables tíos y el insoportable primo Dudley. Harry se siente muy triste y solo, hasta que un buen día recibe una carta que cambiará su vida para siempre. En ella le comunican que ha sido aceptado como alumno en el Colegio Hogwarts de Magia. A partir de ese momento, la suerte de Harry da un vuelco espectacular. En esa escuela tan especial aprenderá encantamientos, trucos fabulosos y tácticas de defensa contra las malas artes. Se convertirá en el campeón escolar de Quidditch, especie de fútbol aéreo que se juega montado sobre escobas, y hará un puñado de buenos amigos... aunque también algunos temibles enemigos. Pero, sobre todo, conocerá los secretos que le permitirán cumplir su destino. Pues, aunque no lo parezca a primera vista, Harry no es un chico común y corriente: ¡es un verdadero mago!',
            'Nombre' => 'Harry Potter y la Piedra Filosofal',
            'Genero' => 'Fantasia',
            'ISBN' => 9780439554930],

            ['IDLibro' => null,
            'Autor' => 'J. K. Rowling',
            'Descripcion' => 'Tras derrotar una vez más a lord Voldemort, su siniestro enemigo en Harry Potter y la piedra filosofal, Harry espera impacientemente en casa de sus insoportables tíos el inicio del segundo curso del Colegio Hogwarts de Magia y Hechicería. Sin embargo, la espera dura poco, pues un elfo aparece en su habitación y le advierte que una amenaza mortal se cierne sobre la escuela. Así pues, Harry no se lo piensa dos veces y, acompañado de Ron, su mejor amigo, se dirige a Hogwarts en un coche volador. Pero ¿puede un aprendiz de mago defender la escuela de los malvados que pretenden destruirla? Sin saber que alguien ha abierto la Cámara de los Secretos, dejando escapar una serie de monstruos peligrosos, Harry y sus amigos Ron y Hermione tendrán que enfrentarse con arañas gigantes, serpientes encantadas, fantasmas enfurecidos y, sobre todo, con la mismísima reencarnación de su más temible adversario.',
            'Nombre' => 'Harry Potter y la Camara Secreta',
            'Genero' => 'Fantasia',
            'ISBN' => 9788478884957],

            ['IDLibro' => null,
            'Autor' => 'J. K. Rowling',
            'Descripcion' => 'Por la cicatriz que lleva en la frente, sabemos que Harry Potter no es un niño como los demás, sino el héroe que venció a lord Voldemort, el mago más terrible y maligno de todos los tiempos y culpable de la muerte de los padres de Harry. Desde entonces, Harry no tiene más remedio que vivir con sus pesados tíos y su insoportable primo Dudley, todos ellos muggles, o sea, personas no magas, que desprecian a su sobrino debido a sus poderes.
            Igual que en las dos primeras partes de la serie -La piedra filosofal y La cámara secreta- Harry aguarda con impaciencia el inicio del tercer curso en el Colegio Hogwarts de Magia y Hechicería. Tras haber cumplido los trece años, solo y lejos de sus amigos de Hogwarts, Harry se pelea con su bigotuda tía Marge, a la que convierte en globo, y debe huir en un autobús mágico. Mientras tanto, de la prisión de Azkaban se ha escapado un terrible villano, Sirius Black, un asesino en serie con poderes mágicos que fue cómplice de lord Voldemort y que parece dispuesto a eliminar a Harry del mapa. Y por si esto fuera poco, Harry deberá enfrentarse también a unos terribles monstruos, los dementores, seres abominables capaces de robarles la felicidad a los magos y de borrara todo recuerdo hermoso de aquellos que osan mirarlos. Lo que ninguno de estos malvados personajes sabe es que Harry, con la ayuda de sus fieles amigos Ron y Hermione, es capaz de todo y mucho más.',
            'Nombre' => 'Harry Potter y el Prisionero de Azkaban',
            'Genero' => 'Fantasia',
            'ISBN' => 9788478885190],

            ['IDLibro' => null,
            'Autor' => 'J. K. Rowling',
            'Descripcion' => 'Tras otro abominable verano con los Dursley, Harry se dispone a iniciar el cuarto curso en Hogwarts, la famosa escuela de magia y hechicería. A sus catorce años, a Harry le gustaría ser un joven mago como los demás y dedicarse a aprender nuevos sortilegios, encontrarse con sus amigos Ron y Hermione y asistir con ellos a los Mundiales de quidditch. Sin embargo, al llegar al colegio le espera una gran sorpresa que lo obligará a enfrentarse a los desafíos más temibles de toda su vida. Si logra superarlos, habrá demostrado que ya no es un niño y que está preparado para vivir las nuevas y emocionantes experiencias que el futuro le depara.',
            'Nombre' => 'Harry Potter y el Cáliz de Fuego',
            'Genero' => 'Fantasia',
            'ISBN' => 9788478886647],

            ['IDLibro' => null,
            'Autor' => 'J. K. Rowling',
            'Descripcion' => 'Las tediosas vacaciones en casa de sus tíos todavía no han acabado y Harry Potter se encuentra más inquieto que nunca. Apenas ha tenido nocitias de Ron y Hermiones, y presiente que algo extraño está sucediendo en Hogwarts. En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus temores se vuelven realidad. El Ministerio de Magia niega que Voldemort haya regresado y ha iniciado una campaña de desprestigio contra Harry Pottery Dumbledore, para lo cual ha asignado a la horrible profesora Dolores Umbridge la tarea de vigilar todos sus movimientos. Así pues, además de sentirse solo e incomprendido, Harry sospecha que Voldemort puede adivinar sus pensamientos, e intuye que el temible mago trata de apoderarse de un objeto secreto que le permitiría recuperar su poder destructivo.',
            'Nombre' => 'Harry Potter y la Orden del Fénix',
            'Genero' => 'Fantasia',
            'ISBN' => 9788478888849],

            ['IDLibro' => null,
            'Autor' => 'J. K. Rowling',
            'Descripcion' => 'Con dieciséis años cumplidos, Harry Potter inicia el sexto curso en Hogwarts en medio de terribles acontecimientos que asolan Inglaterra. Elegido capitán del equipo de Quidditch, los entrenamientos, los exámenes y las chicas ocupan todo su tiempo, pero la tranquilidad dura poco. A pesar de los férreos controles de seguridad que protegen la escuela, dos alumnos son brutalmente atacados. Dumbledore sabe que se acerca el momento, anunciado por la Profecía, en que Harry Potter y Voldemort se enfrentarán a muerte: «El único con poder para vencer al Señor Tenebroso se acerca... Uno de los dos debe morir a manos del otro, pues ninguno de los dos podrá vivir mientras siga el otro con vida.». El anciano director solicitará la ayuda de Harry y juntos emprenderán peligrosos viajes para intentar debilitar al enemigo, para lo cual el joven mago contará con la ayuda de un viejo libro de pociones perteneciente a un misterioso príncipe, alguien que se hace llamar Príncipe Mestizo.',
            'Nombre' => 'Harry Potter y el misterio del príncipe',
            'Genero' => 'Fantasia',
            'ISBN' => 9788478889938],

            ['IDLibro' => null,
            'Autor' => 'J. K. Rowling',
            'Descripcion' => 'La fecha crucial se acerca. Cuando cumpla diecisiete años, Harry perderá el encantamiento protector que lo mantiene a salvo. El anunciado enfrentamiento a muerte con lord Voldemort es inminente, y la casi imposible misión de encontrar y destruir los restantes Horrocruxes más urgente que nunca. Ha llegado la hora final, el momento de tomar las decisiones más difíciles. Harry debe abandonar la calidez y seguridad de La Madriguera para seguir sin miedo ni vacilaciones el inexorable sendero trazado para él. Consciente de lo mucho que está en juego, sólo dentro de sí mismo encontrará la fuerza necesaria que lo impulse en la vertiginosa carrera para enfrentarse con su destino.',
            'Nombre' => 'Harry Potter y las Reliquias de la Muerte',
            'Genero' => 'Fantasia',
            'ISBN' => 9788498381450],

            ['IDLibro' => null,
            'Autor' => 'Suzanne Collins',
            'Descripcion' => 'EL MUNDO ESTARÁ OBSERVANDO

            GANAR SIGNIFICA FAMA Y RIQUEZA.
            PERDER SIGNIFICA UNA MUERTE SEGURA.
            
            Es una oscura versión del futuro próximo, doce chicos y doce chicas se ven obligados a participar en un reality show llamados Los Juegos del Hambre. Solo hay una regla: matar o morir.
            
            Cuando Katniss Everdeen, una joven de dieciséis años, se presenta voluntaria para ocupar el lugar de su hermana en los juegos, lo entiende como una condena a muerte. Sin embargo, Katniss ya ha visto la muerte de cerca; y la supervivencia forma parte de su naturaleza.
            
            ¡QUE EMPIECEN LOS SEPTUAGÉSIMO CUARTOS JUEGOS DEL HAMBRE!',
            'Nombre' => 'Los Juegos Del Hambre',
            'Genero' => 'Ficcion',
            'ISBN' => 9789581414444],

            ['IDLibro' => null,
            'Autor' => 'Suzanne Collins',
            'Descripcion' => 'Contra todo prónostico, Katniss ha ganado Los Juegos del Hambre. Es un milagro que ella y su compañero del Distrito 12, Peeta Mellark, sigan vivos. Katniss debería sentirse aliviada, incluso contenta, ya que, al fin y al cabo, ha regresado con su familia y su amigo de toda la vida, Gale. Sin embargo, nada es como a ella le gustaría. Gale guarda las distancias y Peeta le ha dado la espalda por completo. Además se rumorea que existe una rebelión contra el Capitolio...',
            'Nombre' => 'En llamas',
            'Genero' => 'Ficcion',
            'ISBN' => 9788427200005],

            ['IDLibro' => null,
            'Autor' => 'Suzanne Collins',
            'Descripcion' => 'Katnis Everdeen ha sobrevivido dos veces a Los Juegos del Hambre, pero no está a salvo. La revolución se extiende y, al parecer, todos han tenido algo que ver en el meticuloso plan, todos excepto Katniss. Aun así su papel en la batalla final es el más importante de todos. Katniss debe convertirse en el Sinsajo, en el símbolo de la rebelión... a cualquier precio.',
            'Nombre' => 'Sinsajo',
            'Genero' => 'Ficcion',
            'ISBN' => 9788427200388],

            ['IDLibro' => null,
            'Autor' => 'Stephen King',
            'Descripcion' => '¿Quién o qué mutila y mata a los niños de un pequeño pueblo norteamericano? ¿Por qué llega cíclicamente el horror a Derry en forma de un payaso siniestro que va sembrando la destrucción a su paso? Esto es lo que se proponen averiguar los protagonistas de esta novela. Tras veintisiete años de tranquilidad y lejanía, una antigua promesa infantil les hace volver al lugar en el que vivieron su infancia y juventud como una terrible pesadilla. Regresan a Derry para enfrentarse con su pasado y enterrar definitivamente la amenaza que los amargó durante su niñez. Saben que pueden morir, pero son conscientes de que no conocerán la paz hasta que aquella cosa sea destruida para siempre.',
            'Nombre' => 'It (Eso)',
            'Genero' => 'Horror',
            'ISBN' => 9788497593793],

            ['IDLibro' => null,
            'Autor' => 'Robert Louis Stevenson',
            'Descripcion' => 'Cuando el joven Jim Hawkins encuentra el mapa de una isla desierta en la que se ha escondido un tesoro, recurre a influyentes amigos para fletar la Hispaniola y emprender el viaje. Cuenta con su audacia, la experiencia del capitán Smollet y la inteligencia del doctor Livesey. Pero la tripulación está formada por una banda de filibusteros a las órdenes de John Silver, un verdadero pirata sanguinario que codicia el mismo tesoro.',
            'Nombre' => 'La isla del tesoro',
            'Genero' => 'Clasicos',
            'ISBN' => 9788496246089],

            ['IDLibro' => null,
            'Autor' => 'Orson Scott Card',
            'Descripcion' => 'La Tierra se ve amenazada por una especie extraterrestre de insectos, seres que se comunica telepáticamente y que se consideran totalmente distintos de los humanos, a los que quieren destruir. Para vencerlos, la humanidad necesita un genio militar, y por ello se permite el nacimiento de Ender, que es el tercer hijo de una pareja en un mundo que ha limitado estrictamente a dos el número de descendientes.

            Ender nace para ser entrenado en una estación espacial después de que su hermana mayor y su sádico hermano Peter hayan sido declarados no aptos. Los jóvenes se distribuyen en grupos que compiten entre sí, en gravedad cero, con armas que paralizan sus armaduras. Ender asciende rápidamente en la jerarquía de la estación y se convierte en un líder nato, en la persona capaz de dirigir a las flotas terrestres contra los insectos de otros mundos.',
            'Nombre' => 'El juego de Ender',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 9788466616898],

            ['IDLibro' => null,
            'Autor' => 'George Orwell',
            'Descripcion' => 'En el año 1984 Londres es una ciudad lúgubre en la que la Policía del Pensamiento controla de forma asfixiante la vida de los ciudadanos. Winston Smith es un peón de este engranaje perverso, su cometido es reescribir la historia para adaptarla a lo que el Partido considera la versión oficial de los hechos... hasta que decide replantearse la verdad del sistema que los gobierna y somete.',
            'Nombre' => '1984',
            'Genero' => 'Clasicos',
            'ISBN' => 9781471331435]
        ];
            
        foreach ($libros as $libro) {
            DB::table('libro')->insert([
                'IDLibro' => $libro['IDLibro'],
                'Autor' => $libro['Autor'],
                'Descripcion' => $libro['Descripcion'],
                'Nombre' => $libro['Nombre'],
                'Genero' => $libro['Genero'],
                'ISBN' => $libro['ISBN']
            ]);
        }
    }
}
