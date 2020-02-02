<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Raffles\Models\Article;

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article1 = Article::create(
            [
                'body' => 'Los precios de la propiedad en Colombia siguen subiendo fuerte, con un alza, del 2011 al 2014, del 37% en Bogotá, del 29% en Cali y del 27% en Medellín. Mientras tanto, en Buenos Aires, las propiedades tienen un precio promedio por m2 que oscila entre USD 1750 y USD 2000. En Asunción (Paraguay), el m2 cotiza en aproximadamente USD 1200. Pero… ¿nos sirve a los inmobiliarios esta información?',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('¿Qué variables influyen en el precio de un apartamento en Latinoamérica?'),
                'title' => '¿Qué variables influyen en el precio de un apartamento en Latinoamérica?',
            ]
        );

        $article1->featured_photo()->create(['location' => 'uploads/news/iJOBUxgRuD6I8AkY.jpeg']);

        $article2 = Article::create(
            [
                'body' => 'El licenciado Mario Gómez, director de Le Bleu, explicó a Infobae por qué es necesario crear una verdadera industria de bienes raíces y cuál es el mejor modo para lograrlo. Los que trabajamos en el sector inmobiliario nos estamos transformando, felizmente, en instrumentos para convertir al ahorro en inversión. A partir de nuestra labor diaria, supimos atraer a muchos agentes económicos que se convencieron de que era “negocio” invertir en el sector.',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('Sinergia entre mercado de capitales y el sector inmobiliario'),
                'title' => 'Sinergia entre mercado de capitales y el sector inmobiliario',
            ]
        );

        $article2->featured_photo()->create(['location' => 'uploads/news/VqrRVf6z8c3zPkjw.jpeg']);

        $article3 = Article::create(
            [
                'body' => 'En Colombia, los fondos de capital privado inmobiliarios acumulan un total de US$ 3.300 millones en compromisos de capital este año 2015. Este indicador es una clara señal de la fortaleza de una de las economías más dinámicas y estables de Latinoamérica. Por Carlos Montoya Ramos',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('Fondos de Inversión en Colombia: Una dinámica y creciente industria'),
                'title' => 'Fondos de Inversión en Colombia: Una dinámica y creciente industria',
            ]
        );

        $article3->featured_photo()->create(['location' => 'uploads/news/KwaCKXI41dXQ2fBd.jpeg']);

        $article4 = Article::create(
            [
                'body' => 'La multinacional WeWork, líder mundial en espacios de trabajo colaborativos o “coworking”, abrirá en septiembre de este año sus primeras oficinas en Santiago con el objetivo de conectar a emprendedores y empresas chilenas con la comunidad global y facilitar sus ideas y negocios. En este contexto, Andrea Rodriguez Valdez, directora de PropTech Latam Summit 2018 confirmó que Carlos Gareis, Head of Business Operations Latinoamérica de WeWork (Argentina) será uno de los speakers del evento más disr...',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('Chile: WeWork llega al pais andino con un espacio para más de 2.100 miembros'),
                'title' => 'Chile: WeWork llega al pais andino con un espacio para más de 2.100 miembros',
            ]
        );

        $article4->featured_photo()->create(['location' => 'uploads/news/dygonZRnLEQPmjsm.jpeg']);

        $article5 = Article::create(
            [
                'body' => 'El crecimiento del Nodo Panamericana – General Paz como polo de desarrollo urbano es evidente a simple vista. Los edificios que se fueron construyendo en los últimos años lo convierten en el submercado de oficinas más pujante de la ciudad de Buenos Aires, condición que se confirma al observar las construcciones en curso y lo proyectado para el corto plazo. Para tomar dimensión de este verdadero “Big Bang” del Nodo basta con saber que, de los aproximadamente 50.000 m2 de oficinas que existían en...',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('Argentina – Nodo Panamericana y General Paz: un cruce de oportunidades'),
                'title' => 'Argentina – Nodo Panamericana y General Paz: un cruce de oportunidades',
            ]
        );

        $article5->featured_photo()->create(['location' => 'uploads/news/d4lEpxyPJxqMpbkB.png']);

        $article6 = Article::create(
            [
                'body' => 'Es sabido que Puerto Madero es el barrio más exclusivo y costoso de la Ciudad de Buenos Aires, con un valor promedio del metro cuadrado muy superior al resto de las zonas. Ahora también, luego del alza del 20% que tuvieron sus propiedades en el último año, se convirtió en el barrio más caro de la región, en comparación con las ciudades más dinámicas de Brasil, Chile, México, Perú y Uruguay. El valor actual del metro cuadrado en Puerto Madero es de USD. 7.038, mientras que en Ipanema, la exclusi...',
                'published' => '1',
                'published_at' => \Carbon\Carbon::now(),
                'slug' => str_slug('Argentina: Puerto Madero tiene el valor de m2 más alto en Latinoamerica'),
                'title' => 'Argentina: Puerto Madero tiene el valor de m2 más alto en Latinoamerica',
            ]
        );

        $article6->featured_photo()->create(['location' => 'uploads/news/5El0LTmIMo7nzUPa.jpeg']);
    }
}
