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
            'Autor' => 'Autor Prueba1',
            'Descripcion' => 'Descripcion del Libro Prueba1',
            'Nombre' => 'Libro Prueba1',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 1],

            ['IDLibro' => null,
            'Autor' => 'Autor Prueba2',
            'Descripcion' => 'Descripcion del Libro Prueba2',
            'Nombre' => 'Libro Prueba2',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 2],

            ['IDLibro' => null,
            'Autor' => 'Autor Prueba3',
            'Descripcion' => 'Descripcion del Libro Prueba3',
            'Nombre' => 'Libro Prueba3',
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 3],

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
            'Genero' => 'Ciencia-Ficcion',
            'ISBN' => 9780439554930]
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
