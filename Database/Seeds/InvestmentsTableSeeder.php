<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Raffles\Modules\Linkre\Models\Financial;
use Raffles\Modules\Linkre\Models\Investment;

use Illuminate\Database\Seeder;

class InvestmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->_artTower();
        $this->_assamblagePark();
        $this->_championsgate();
        $this->_chariarse();
        $this->_citabella();
        $this->_irsa();
        $this->_jardinesMarYSol();
        $this->_linkTowers();
        $this->_maldonadoStreetCenter();
        $this->_remerosBeach();
        $this->_remerosPlazaShopping();
    }

    private function _artTower()
    {
        $fillable = [
            'id' => '3',
            'name' => 'Art Tower',
            'company_id' => '5',
            'description' => '<p>ART es un proyecto de usos mixtos que contempla 130 departamentos que ofrecen comfort, servicios y amenities en la mejor zona de asunción.</p><p>Albergará actividades vinculadas al Arte y entre los amenities se destacan un gran SUM, piscina, gimnasio, spa, etc...</p><p>La ubicación estratégica del proyecto se debe a la proximidad con los sectores más ricos de la ciudad. La zona se caracteriza por ser la conjunción de un barrio residencial de baja y media densidad con una marcada tendencia a incorporar una oferta comercial.</p>',
            'promoter_id' => '5',
            'slug' => 'art-tower',
            'total_area' => '20000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['country' => 'Paraguay', 'state' => 'Asunción']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();

        $investment->featured_photo()->create(['location' => 'uploads/projects/art-tower/cover.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/art-tower/imagenGale01.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/art-tower/imagenGale02.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/art-tower/imagenGale03.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/art-tower/imagenGale04.jpg']);

        $investment->map()->create(['lat' => '-25.2845135', 'lng' => '-57.5712848']);
    }

    private function _assamblagePark()
    {
        $fillable = [
            'id' => '147',
            'name' => 'Assamblage Park',
            'company_id' => '5',
            'promoter_id' => '5',
            'slug' => 'assamblage-park',
            'total_area' => '20000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'New York', 'country' => 'USA']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();

        $investment->featured_photo()->create(['location' => 'uploads/projects/assamblage-park/TirbvRCOVFblnYGp.png']);

        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/assamblage-park/tEZFtQ0LlMmb19ns.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/assamblage-park/rlEsnWhVkZY7tWaU.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/assamblage-park/e2Q4tgC8bp2pgVnZ.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/assamblage-park/qiGesGOFyTBoYRlp.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/assamblage-park/W7uekmouojlwATgJ.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/assamblage-park/wcP5N5BaxTMe08UO.jpeg']);

        $investment->map()->create(['lat' => '40.7412717', 'lng' => '-73.9866278']);
    }

    private function _citabella()
    {
        $fillable = [
            'id' => '1',
            'name' => 'Citabella',
            'company_id' => '1',
            'description' => 'Citabella es el primer complejo de usos mixtos de la ciudad de Asunción en Paraguay.<br>
                Ubicado en el barrio de Villamorra, eje central de la ciudad a una distancia equidistante del centro hitórico de Asunción y de las nuevas zonas de desarrollo.<br>
                El complejo se situa en un terreno de 10.000m2, cuenta con dos edificios de oficinas de planta libre y modulable, un edificio de viviendas y un paseo comercial, además el complejo cuenta con estacionamiento para 400 autos dedicados exclusivamente al área comercial.',
            'promoter_id' => '1',
            'slug' => 'citabella',
            'total_area' => '10000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Asunción', 'country' => 'Paraguay']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();

        $investment->featured_photo()->create(['location' => 'uploads/projects/citabella/552eb6456ffe0_cam_aerea-05.jpg']);

        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/citabella/552eb67c44a12_of_grande.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/citabella/552eb658b5e31_cam03-05.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/citabella/552eb6456ffe0_cam_aerea-05.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/citabella/552eb66417ff5_cam04-05.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/citabella/552eb68181ab3_ofi_chica.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/citabella/552eb68741d3f_oficina.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/citabella/552eb65085961_cam02-05_01.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/citabella/552eb67657619_gym.jpg']);

        $investment->map()->create(['lat' => '-25.2858256', 'lng' => '-57.6236456']);
    }

    private function _championsgate()
    {
        $fillable = [
            'id' => '6',
            'name' => 'Championsgate',
            'company_id' => '2',
            'description' => 'El proyecto turístico inmobiliario permite la integración de inversores o Family Office que buscan un negocio de renta mensual y valorización del activo. Un negocio muy similar al de tener un hotel boutique o resort en una zona vacacional. Para ellos LENNAR propone abrir el negocio e invitarlos a sumar su equity y ser parte de un complejo que tiene actividad todo el año. Lo cual produce renta sobre las casas y townhouse con servicios de hotel y cuidados bajo gestión administrada por una compañía de Property Manager.

El modelo de negocio que proponer LENNAR permite comprar desde 2 casas y obtener rentas en el orden del 12% (antes de impuestos) libre de gastos de servicios y mantenimiento, La cercanía a los Parques Disney World, a tan solo 11Km, y el entorno desarrollado del complejo ofrecen un atractivo adicional a la inversión, brindando la posibilidad de hasta disfrutarlos personalmente más allá del negocio inmobiliario.',
            'promoter_id' => '2',
            'slug' => 'championsgate',
            'total_area' => '10000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Orlanda', 'country' => 'USA', 'state' => 'Florida']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();


        $investment->featured_photo()->create(['location' => 'uploads/projects/championsgate/mcocha-omni-orlando-resort-championsgate-pool-aerial.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/championsgate/imagenGale01.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/championsgate/imagenGale02.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/championsgate/imagenGale03.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/championsgate/imagenGale04.jpg']);

        $investment->map()->create(['lat' => '28.2744402', 'lng' => '-81.6225528']);
    }

    private function _chariarse()
    {
        $fillable = [
            'id' => '150',
            'name' => 'Chariarse',
            'company_id' => '12',
            'description' => '<p>Proyecto en etapa de gestión y recaudación de fondos. Enfocado a un publico de clase media.<br></p>',
            'promoter_id' => '12',
            'slug' => 'chariarse',
            'total_area' => '632870',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Lima', 'country' => 'Perú']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();

        $investment->featured_photo()->create(['location' => 'uploads/projects/chariarse/BI1YTmrelvMqfzfv.png']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/chariarse/ouAXhhgbU3pwh6qZ.png']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/chariarse/NJVtRu1KnJMBx2e4.png']);

        $investment->map()->create(['lat' => '-12.1285502', 'lng' => '-77.0258049']);
    }

    private function _irsa()
    {
        $fillable = [
            'id' => '2',
            'name' => 'IRSA',
            'company_id' => '3',
            'promoter_id' => '3',
            'slug' => 'irsa',
            'total_area' => '35000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Buenos Aires', 'country' => 'Argentina', 'state' => 'Buenos Aires']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();

        $investment->featured_photo()->create(['location' => 'uploads/projects/irsa/dotbaires.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/irsa/001g.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/irsa/002g.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/irsa/003g.jpg']);

        $investment->map()->create(['lat' => '-25.2858256', 'lng' => '-57.6236456']);
    }

    private function _jardinesMarYSol()
    {
        $fillable = [
            'id' => '148',
            'name' => 'Jardines Mar y Sol',
            'company_id' => '11',
            'promoter_id' => '11',
            'slug' => 'jardines-mar-y-sol',
            'total_area' => '10000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Punta del Este', 'country' => 'Uruguay', 'state' => 'Maldonado']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();

        $investment->featured_photo()->create(['location' => 'uploads/projects/jardines-mar-y-sol/marysol.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/jardines-mar-y-sol/BLwJOdA.jpg']);

        $investment->map()->create(['lat' => '-34.8999607', 'lng' => '-54.9910146']);
    }

    private function _linkTowers()
    {
        $fillable = [
            'id' => '56',
            'description' => '<h3>El Proyecto</h3><ul><li>+ 2 torres de 33 pisos y 260 departamentos.</li><li>+ Unidades de 1, 2, 3 y 4 dormitorios, dúplex y tríplex.</li><li>+ Superficie cubierta y semicubierta total: 52.000 m².</li><li>400 cocheras. Bauleras, áreas técnicas y áreas de servicios.</li></ul><p>Conectar los sentidos es la búsqueda principal de The Link Towers, por eso se reemplazaron los tradicionales amenties por espacios de encuentro para compartir experiencias. Habrá Health Club, Fitness Center, In & Out Pool, Lobby & Living, Gourmet & Wine, Fireplace, Marinas, Fun Room para los adolescentes y Kids Place para los más chiquitos.</p>',
            'name' => 'Link Towers',
            'company_id' => '6',
            'promoter_id' => '6',
            'slug' => 'link-tower',
            'total_area' => '500000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Puerto Madero', 'country' => 'Argentina', 'state' => 'Buenos Aires']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();

        $investment->featured_photo()->create(['location' => 'uploads/projects/link-towers/NmkIoMJIZQSuwfCK.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/link-towers/2q7hyaF5rRSzGf1z.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/link-towers/7K3Xx65022Ig6O3n.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/link-towers/WF6NX03pDgFZjTWV.jpeg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/link-towers/LgVIhnVvMtfSjrX5.jpeg']);

        $investment->map()->create(['lat' => '-34.6197370', 'lng' => '-58.3615170']);
    }

    private function _maldonadoStreetCenter()
    {
        $fillable = [
            'id' => '149',
            'name' => 'Maldonado Street Center',
            'company_id' => '11',
            'promoter_id' => '11',
            'slug' => 'maldonado-street-center',
            'total_area' => '500000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Punta del Este', 'country' => 'Uruguay']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();

        $investment->featured_photo()->create(['location' => 'uploads/projects/maldonado-street-center/1du12a6Gvr9JLRST.jpeg']);

        $investment->map()->create(['lat' => '-34.9603104', 'lng' => '-54.9436932']);
    }

    private function _remerosBeach()
    {
        $fillable = [
            'amenities' => '<h3>El Proyecto</h3><p>Sobre un predio de 17 hectáreas en el Camino de los Remeros, Partido de Tigre, Remeros Beach es un desarrollo urbano distinto en la zona por su protagonista única: la laguna de 3.5 hectáreas, con agua cristalina y playas de arena blanca. Alrededor de la laguna convivirán tres barrios residenciales con características bien definidas:</p><ul><li>+ Open Boulevard: La zona más urbana del proyecto tendrá tres torres: Wind Residences, Sky Residences y Water Residences. En el paseo alrededor de la laguna habrá restaurante, gimnasio y salón para eventos, entre otros amenities exclusivos.</li><li>+ Beach: El área donde el concepto de lifestyle playero llega a su máxima expresión. Edificios aterrazados con vistas privilegiadas a la laguna central.</li><li>+ Beach: El área donde el concepto de lifestyle playero llega a su máxima expresión. Edificios aterrazados con vistas privilegiadas a la laguna central.</li><li>+ Árboris Town: Ubicado en el centro del complejo, tendrá edificios de hasta siete pisos y ofrecerá una propuesta más familiar, con jardines privados, pileta cubierta, salón para eventos y water park.</li></ul>',
            'context' => '<p>Sobre un predio de 17 hectáreas en el Camino de los Remeros, Partido de Tigre, Remeros Beach es un desarrollo urbano distinto en la zona por su protagonista única: la laguna de agua cristalina con playas de arena blanca.</p><p>Alrededor de la laguna convivirán tres barrios residenciales con características bien definidas:</p><ul><li>+ BARRIO Open Boulevard Contará con torres de distintas tipologías: Wind Residences, Sky Residences y Water Residences.</li><li>+ BARRIO Árboris Town Compuesto por 4 edificios con piscina propia, amplios jardines, SUM, entre otros amenities.</li><li>+ BARRIO Beach Compuesto por diferentes tipologías de edificios, con 2 aterrazados como remate de la laguna.</li></ul>',
            'id' => '5',
            'name' => 'Remeros Beach',
            'company_id' => '7',
            'promoter_id' => '7',
            'slug' => 'remeros-beach',
            'total_area' => '70000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Buenos Aires', 'country' => 'Argentina', 'state' => 'Buenos Aires']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();


        $investment->featured_photo()->create(['location' => 'uploads/projects/remeros-beach/4URXCLXhpgL9Nksx.png']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/remeros-beach/a4EGoaltAVZu80K1.png']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/remeros-beach/HqSbktdWH5HVwQmA.png']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/remeros-beach/dqFhqPY0HRZQAUei.png']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/remeros-beach/ZUKUWeKNMgwD0s2h.png']);

        $investment->map()->create(['lat' => '-34.4089160', 'lng' => '-58.6191110']);
    }

    private function _remerosPlazaShopping()
    {
        $fillable = [
            'id' => '4',
            'description' => '<p>Remeros Plaza es un espacio de recreación y soluciones pensado para toda la familia, y preparado para recibir a la gran cantidad de turistas que visitan el barrio bonaerense de Tigre, Argentina.</p><p>Es un espacio abierto de fácil acceso, en un entorno natural y espacioso, agradable, cómodo, moderno y seguro.</p><p>El complejo se situa en un terreno de 20.000m2, cuenta con cocheras para 600 automóviles y más de 100 locales comerciales, entre los que puede encontrar restaurantes, cines, parque de juegos, salón de eventos y un hipermercado.</p>',
            'name' => 'Remeros Plaza Shopping',
            'company_id' => '7',
            'promoter_id' => '7',
            'slug' => 'remeros-plaza-shopping',
            'total_area' => '20000',
        ];

        $investment = Investment::create($fillable);
        $investment->address()->create(['locality' => 'Tigre', 'country' => 'Argentina', 'state' => 'Buenos Aires']);

        $financial = factory(Financial::class)->create();
        $financial->investment()->associate($investment);
        $financial->save();


        $investment->featured_photo()->create(['location' => 'uploads/projects/remeros-plaza-shopping/imagen01.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/remeros-plaza-shopping/imagen01.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/remeros-plaza-shopping/imagen02.jpg']);
        $investment->unfeatured_photos()->create(['location' => 'uploads/projects/remeros-plaza-shopping/imagen03.jpg']);

        $investment->map()->create(['lat' => '-34.4049779', 'lng' => '-58.6180452']);
    }
}
