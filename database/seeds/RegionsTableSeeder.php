<?php

use Illuminate\Database\Seeder;
use App\Piloto;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = factory(App\Region::class)->create([
            'extra' => 'I',
            'nombre' => 'Tarapacá',
            'country_id' => '1'
        ]);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Iquique','nombre' => 'Aeropuerto Internacional Diego Aracena','oaci' => 'SCDA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pica','nombre' => 'Aeródromo Coposa','oaci' => 'SCKP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pozo Almonte','nombre' => 'Aeródromo Nueva Victoria','oaci' => 'SCNV']);



        $r = factory(App\Region::class)->create([
            'extra' => 'II',
            'nombre' => 'Antofagasta',
            'country_id' => '1'
        ]);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Calama','nombre' => 'Aeropuerto El Loa','oaci' => 'SCCF']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Antofagasta', 'nombre' => 'Aeropuerto Internacional Andrés Sabella', 'oaci' => 'SCFA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Antofagasta','nombre' => 'Aeródromo Aguas Blancas','oaci' => 'SCGU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Antofagasta','nombre' => 'Aeródromo Cerro Coloso','oaci' => 'SCOO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Antofagasta','nombre' => 'Aeródromo La Escondida','oaci' => 'SCLE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Antofagasta','nombre' => 'Aeródromo Paranal','oaci' => 'SCPA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Antofagasta','nombre' => 'Aeródromo Universidad del Norte','oaci' => 'SCWU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Chuquicamata','nombre' => 'Aeródromo Chuquicamata','oaci' => 'SCKU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'María Elena','nombre' => 'Aeródromo María Elena','oaci' => 'SCNE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Michilla','nombre' => 'Aeródromo Carolina','oaci' => 'SCMY']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Salar de Atacama','nombre' => 'Aeródromo El Salar','oaci' => 'SCSL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Salar de Atacama','nombre' => 'Aeródromo Minsal','oaci' => 'SCSM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Pedro de Atacama','nombre' => 'Aeródromo San Pedro de Atacama','oaci' => 'SCPE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Taltal','nombre' => 'Aeródromo Las Breas','oaci' => 'SCTT']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Taltal','nombre' => 'Aeródromo Guanaco','oaci' => 'SCUA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Sierra Gorda','nombre' => 'Aeródromo Algorta','oaci' => 'SCOR']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Tocopilla','nombre' => 'Aeródromo Barriles','oaci' => 'SCBE']);



        $r = factory(App\Region::class)->create([
            'extra' => 'III',
            'nombre' => 'Atacama',
            'country_id' => '1'
        ]);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Alto del Carmen','nombre' => 'Aeródromo Tres Quebradas','oaci' => 'SCTQ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Caldera (Copiapó)','nombre' => 'Aeródromo Desierto de Atacama','oaci' => 'SCAT']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Caldera','nombre' => 'Aeródromo Caldera','oaci' => 'SCCL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Chañaral','nombre' => 'Aeródromo Chañaral','oaci' => 'SCRA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Copiapó','nombre' => 'Aeródromo Perales','oaci' => 'SCPS']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Copiapó','nombre' => 'Aeródromo Chamonate','oaci' => 'SCHA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Diego de Almagro','nombre' => 'Aeródromo Potrerillos','oaci' => 'SCEI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Caleta Chañaral de Aceituno','nombre' => 'Aeródromo Punta Gaviota','oaci' => 'SCGV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'El Salvador','nombre' => 'Aeródromo Ricardo García Posada','oaci' => 'SCES']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Freirina','nombre' => 'Aeródromo Freirina','oaci' => 'SCFF']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Huasco','nombre' => 'Aeródromo Gran Cañón','oaci' => 'SCHU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vallenar','nombre' => 'Aeródromo Vallenar','oaci' => 'SCLL']);



        $r = factory(App\Region::class)->create([
            'extra' => 'IV',
            'nombre' => 'Coquimbo',
            'country_id' => '1'
        ]);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'La Serena','nombre' => 'Aeródromo La Florida','oaci' => 'SCSE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Ovalle','nombre' => 'Aeródromo El Tuquí','oaci' => 'SCOV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Ovalle','nombre' => 'Aeródromo Estancia Los Loros','oaci' => 'SCOA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Ovalle','nombre' => 'Aeródromo Fray Jorge','oaci' => 'SCFJ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Ovalle','nombre' => 'Aeródromo Huayanay','oaci' => 'SCOY']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Ovalle','nombre' => 'Aeródromo Santa Adriana','oaci' => 'SCAD']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Ovalle','nombre' => 'Aeródromo Santa Rosa de Tabalí','oaci' => 'SCOT']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Ovalle','nombre' => 'Aeródromo Tabalí Bajo','oaci' => 'SCOB']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Combarbalá','nombre' => 'Aeródromo Pedro Villarroel','oaci' => 'SCCB']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Combarbalá','nombre' => 'Aeródromo La Pelícana','oaci' => 'SCCG']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Coquimbo','nombre' => 'Aeródromo Tambillos','oaci' => 'SCCQ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cuncumén','nombre' => 'Aeródromo Los Pelambres','oaci' => 'SCNK']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Estación Chañar','nombre' => 'Aeródromo Pelícano','oaci' => 'SCEC']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Illapel','nombre' => 'Aeródromo Aucó','oaci' => 'SCIL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Illapel','nombre' => 'Aeródromo Pintacura','oaci' => 'SCRX']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Illapel','nombre' => 'Aeródromo El Peral','oaci' => 'SCUU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Las Tacas','nombre' => 'Aeródromo Las Tacas','oaci' => 'SCQT']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Los Vilos','nombre' => 'Aeródromo La Viña','oaci' => 'SCLV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Los Vilos','nombre' => 'Aeródromo Punta Chungo','oaci' => 'SCHO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Los Vilos','nombre' => 'Aeródromo Tilama','oaci' => 'SCLA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Mialqui','nombre' => 'Aeródromo Los Tricahues','oaci' => 'SCMI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pichidangui','nombre' => 'Aeródromo Pichidangui','oaci' => 'SCDI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Punitaqui','nombre' => 'Aeródromo Bellavista de Punitaqui','oaci' => 'SCUN']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Salamanca','nombre' => 'Aeródromo Las Brujas','oaci' => 'SCXB']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Tongoy','nombre' => 'Aeródromo Tongoy','oaci' => 'SCTG']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vicuña','nombre' => 'Aeródromo El Indio','oaci' => 'SCVC']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vicuña','nombre' => 'Aeródromo Huancara','oaci' => 'SCVN']);


        $r = factory(App\Region::class)->create([
            'extra' => 'V',
            'nombre' => 'Valparaiso',
            'country_id' => '1'
        ]);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Algarrobo','nombre' => 'Aeródromo San Gerónimo','oaci' => 'SCSG']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Isla de Pascua','nombre' => 'Aeropuerto Internacional Mataveri','oaci' => 'SCIP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Archipiélago Juan Fernández','nombre' => 'Aeródromo Robinson Crusoe','oaci' => 'SCIR']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Casablanca','nombre' => 'Aeródromo El Tapihue','oaci' => 'SCTW']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Casablanca','nombre' => 'Aeródromo Fundo Loma Larga','oaci' => 'SCFL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Casablanca','nombre' => 'Aeródromo Santa Rita','oaci' => 'SCCS']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Casablanca','nombre' => 'Aeródromo Viñamar','oaci' => 'SCVA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cabildo','nombre' => 'Aeródromo El Algarrobo','oaci' => 'SCDL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cartagena','nombre' => 'Aeródromo El Rosario','oaci' => 'SCRS']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'La Ligua','nombre' => 'Aeródromo Diego Portales','oaci' => 'SCLQ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Los Andes','nombre' => 'Aeródromo San Rafael','oaci' => 'SCAN']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Olmué','nombre' => 'Aeródromo Olmué','oaci' => 'SCOM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Petorca','nombre' => 'Aeródromo El Sobrante','oaci' => 'SCSP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Quillota','nombre' => 'Aeródromo El Boco','oaci' => 'SCQL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Quintero','nombre' => 'Aeródromo Quintero','oaci' => 'SCER']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Felipe','nombre' => 'Aeródromo Víctor Lafón','oaci' => 'SCSF']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Santo Domingo','nombre' => 'Aeródromo Santo Domingo','oaci' => 'SCSN']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Valparaíso','nombre' => 'Aeródromo Rodelillo','oaci' => 'SCRD']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Zapallar','nombre' => 'Aeródromo Casas Viejas','oaci' => 'SCZC']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Zapallar','nombre' => 'Aeródromo La Empastada','oaci' => 'SCZA']);


    $r = factory(App\Region::class)->create([
        'extra' => 'VI',
        'nombre' => "Bernardo O'Higgins",
        'country_id' => '1'
    ]);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Chépica','nombre' => 'Aeródromo Chépica','oaci' => 'SCEK']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'El Manzano','nombre' => 'Aeródromo Marina de Rapel','oaci' => 'SCMZ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Lago Rapel','nombre' => 'Aeródromo Costa del Sol','oaci' => 'SCSO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Litueche','nombre' => 'Aeródromo Litueche','oaci' => 'SCTU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Litueche','nombre' => 'Aeródromo Topocalma','oaci' => 'SCLT']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Lolol','nombre' => 'Aeródromo Palo Alto','oaci' => 'SCAO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Marchihue','nombre' => 'Aeródromo El Carrizal','oaci' => 'SCRZ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Marchihue','nombre' => 'Aeródromo La Esperanza','oaci' => 'SCMH']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Marchihue','nombre' => 'Aeródromo La Laguna','oaci' => 'SCLU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Marchihue','nombre' => 'Aeródromo Paredes Viejas','oaci' => 'SCVJ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Palmilla','nombre' => 'Aeródromo Agua Santa','oaci' => 'SCAG']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Paredones','nombre' => 'Aeródromo Rucalonco','oaci' => 'SCRW']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Peralillo','nombre' => 'Aeródromo Viña Sutil','oaci' => 'SCSV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Peumo','nombre' => 'Aeródromo Peumo','oaci' => 'SCPW']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pichidegua','nombre' => 'Aeródromo Almahue','oaci' => 'SCHG']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pichilemu','nombre' => 'Aeródromo Panilonco','oaci' => 'SCMU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pichilemu','nombre' => 'Aeródromo Pichilemu','oaci' => 'SCPM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pichilemu','nombre' => 'Aeródromo Monaco','oaci' => 'SCMN']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Quinta de Tilcoco','nombre' => 'Aeródromo Los Paltos','oaci' => 'SCPO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Rapel','nombre' => 'Aeródromo La Estrella','oaci' => 'SCRL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Rapel','nombre' => 'Aeródromo Las Águilas','oaci' => 'SCGL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Rapel','nombre' => 'Aeródromo Las Águilas Oriente','oaci' => 'SCMR']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Rapel','nombre' => 'Aeródromo Rapelhuapi','oaci' => 'SCRP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Rengo','nombre' => 'Aeródromo Los Gomeros','oaci' => 'SCGM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Rengo','nombre' => 'Aeródromo Fundo Naicura','oaci' => 'SCNR']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Fernando','nombre' => 'Aeródromo San Fernando','oaci' => 'SCSD']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Vicente de Tagua Tagua','nombre' => 'Aeródromo El Tambo','oaci' => 'SCET']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Santa Cruz','nombre' => 'Aeródromo Aerosantacruz','oaci' => 'SCUZ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Santa Cruz','nombre' => 'Aeródromo El Boldal','oaci' => 'SCBD']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Santa Cruz','nombre' => 'Aeródromo La Puerta','oaci' => 'SCPT']);
                

    $r = factory(App\Region::class)->create([
        'extra' => 'VII',
        'nombre' => 'Del Maule',
        'country_id' => '1'
    ]);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cauquenes','nombre' => 'Aeródromo Alto Cauquenes','oaci' => 'SCCN']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cauquenes','nombre' => 'Aeródromo El Arenal','oaci' => 'SCCE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cauquenes','nombre' => 'Aeródromo El Boldo','oaci' => 'SCCA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Constitución','nombre' => 'Aeródromo Quivolgo','oaci' => 'SCCT']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cumpeo','nombre' => 'Aeródromo La Obra','oaci' => 'SCUM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cumpeo','nombre' => 'Aeródromo Lontuecito','oaci' => 'SCUP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Curepto','nombre' => 'Aeródromo Los Zorrillos de Tonlemu','oaci' => 'SCZR']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Curicó','nombre' => 'Aeródromo General Freire','oaci' => 'SCIC']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Curicó','nombre' => 'Aeródromo Los Lirios','oaci' => 'SCKI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Curicó','nombre' => 'Aeródromo La Montaña','oaci' => 'SCTM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Duao','nombre' => 'Aeródromo San Damián','oaci' => 'SCDM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Hualañé','nombre' => 'Aeródromo Los Coipos','oaci' => 'SCOI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Licantén','nombre' => 'Aeródromo Licancel','oaci' => 'SCKN']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Linares','nombre' => 'Aeródromo Achibueno','oaci' => 'SCAV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Linares','nombre' => 'Aeródromo Fundo La Caña','oaci' => 'SCAV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Linares','nombre' => 'Aeródromo Municipal de Linares','oaci' => 'SCLN']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Llico','nombre' => 'Aeródromo Torca','oaci' => 'SCLI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Longaví','nombre' => 'Aeródromo Las Moras','oaci' => 'SCMS']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Longaví','nombre' => 'Aeródromo Verfrut Sur','oaci' => 'SCUT']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Molina','nombre' => 'Aeródromo Los Petiles','oaci' => 'SCLP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Molina','nombre' => 'Aeródromo Alupenhue','oaci' => 'SCXA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Molina','nombre' => 'Aeródromo La Cascada','oaci' => 'SCKK']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Molina','nombre' => 'Aeródromo Los Monos','oaci' => 'SCMO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Molina','nombre' => 'Aeródromo Viña San Pedro','oaci' => 'SCMV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Panimávida','nombre' => 'Aeródromo Panimávida','oaci' => 'SCIV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Parral','nombre' => 'Aeródromo El Salto','oaci' => 'SCEO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Parral','nombre' => 'Aeródromo Hospital Villa Baviera','oaci' => 'SCVB']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pelarco','nombre' => 'Aeródromo La Reforma','oaci' => 'SCFO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pelluhue','nombre' => 'Aeródromo Piedra Negra','oaci' => 'SCKE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pencahue','nombre' => 'Aeródromo La Aguada','oaci' => 'SCLG']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pencahue','nombre' => 'Aeródromo La Peña','oaci' => 'SCUE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Retiro','nombre' => 'Aeródromo Copihue','oaci' => 'SCHP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Retiro','nombre' => 'Aeródromo Las Alpacas','oaci' => 'SCAJ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Retiro','nombre' => 'Aeródromo Los Maitenes','oaci' => 'SCYR']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Retiro','nombre' => 'Aeródromo San Andrés','oaci' => 'SCDS']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Retiro','nombre' => 'Aeródromo San Guillermo','oaci' => 'SCGI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Retiro','nombre' => 'Aeródromo Bureo','oaci' => 'SCBU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Retiro','nombre' => 'Aeródromo El Almendro','oaci' => 'SCRT']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Río Claro','nombre' => 'Aeródromo Bellavista','oaci' => 'SCBV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Romeral','nombre' => 'Aeródromo San Miguel','oaci' => 'SCOE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Romeral','nombre' => 'Aeródromo Santa Bárbara','oaci' => 'SCRO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Sagrada Familia','nombre' => 'Aeródromo Los Cedros','oaci' => 'SCED']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Clemente','nombre' => 'Aeródromo Colorado','oaci' => 'SCSK']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Javier de Loncomilla','nombre' => 'Aeródromo San Javier','oaci' => 'SCSJ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Javier de Loncomilla','nombre' => 'Aeródromo El Parrón','oaci' => 'SCJV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Javier de Loncomilla','nombre' => 'Aeródromo Las Mercedes','oaci' => 'SCLM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'San Javier de Loncomilla','nombre' => 'Aeródromo Santa María de Mingre','oaci' => 'SCMG']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Talca','nombre' => 'Aeródromo Panguilemo','oaci' => 'SCTL']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Teno','nombre' => 'Aeródromo Alempue','oaci' => 'SCAM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Teno','nombre' => 'Aeródromo Unifrutti','oaci' => 'SCUN']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vichuquén','nombre' => 'Aeródromo Cuatro Pantanos','oaci' => 'SCVQ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vichuquén','nombre' => 'Aeródromo El Álamo','oaci' => 'SCVK']);
                

    $r = factory(App\Region::class)->create([
        'extra' => 'VIII',
        'nombre' => 'Biobío',
        'country_id' => '1'
    ]);
            $conce = factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Talcahuano - Concepción','nombre' => 'Aeropuerto Internacional Carriel Sur','oaci' => 'SCIE']);
            $pilotos = Piloto::all();
            foreach ($pilotos as $p) {
                factory(App\PilotoAirport::class)->create([
                'piloto_id' =>  $p->id,'airport_id' => $conce->id]);
            }
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Arauco','nombre' => 'Aeródromo La Playa','oaci' => 'SCLY']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cañete','nombre' => 'Aeródromo Las Misiones','oaci' => 'SCNM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Duqueco','nombre' => 'Aeródromo San Lorenzo','oaci' => 'SCDQ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Huépil','nombre' => 'Aeródromo Rucamanqui','oaci' => 'SCHE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Isla Mocha','nombre' => 'Aeródromo Punta El Saco','oaci' => 'SCHM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Isla Mocha','nombre' => 'Aeródromo Isla Mocha','oaci' => 'SCIM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Isla Santa María','nombre' => 'Aeródromo Puerto Sur','oaci' => 'SCIS']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Lebu','nombre' => 'Aeródromo Los Pehuenches','oaci' => 'SCLB']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Los Ángeles','nombre' => 'Aeródromo Cholguahue','oaci' => 'SCGH']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Los Ángeles','nombre' => 'Aeródromo María Dolores','oaci' => 'SCGE']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Los Ángeles','nombre' => 'Aeródromo San Lorenzo','oaci' => 'SCDQ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Mulchén','nombre' => 'Aeródromo Poco a Poco','oaci' => 'SCPP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Nacimiento','nombre' => 'Aeródromo El Huingan','oaci' => 'SCNM']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Negrete','nombre' => 'Aeródromo Del Bío Bío','oaci' => 'SCBB']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Santa Bárbara','nombre' => 'Aeródromo El Huachi','oaci' => 'SCEH']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Santa Bárbara','nombre' => 'Aeródromo Santa Luisa','oaci' => 'SCTA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Tirúa','nombre' => 'Aeródromo Lequecahue','oaci' => 'SCQK']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Yumbel','nombre' => 'Aeródromo Trilahue','oaci' => 'SCYB']);
                



    $r = factory(App\Region::class)->create([
        'extra' => 'IX',
        'nombre' => 'La Araucanía',
        'country_id' => '1'
    ]);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Freire - Temuco','nombre' => 'Aeropuerto Internacional La Araucanía','oaci' => 'SCQP']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Angol','nombre' => 'Aeródromo Los Confines','oaci' => 'SCGO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Collipulli','nombre' => 'Aeródromo Agua Buena','oaci' => 'SCKO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cunco','nombre' => 'Aeródromo Los Guayes','oaci' => 'SCGY']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cunco','nombre' => 'Aeródromo Roberto Chávez','oaci' => 'SCKC']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Cunco','nombre' => 'Aeródromo Lago Colico','oaci' => 'SCLK']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Curacautín','nombre' => 'Aeródromo de Curacautín','oaci' => 'SCAI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Freire','nombre' => 'Aeródromo Santa Lucía','oaci' => 'SCSU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Lago Caburgua','nombre' => 'Aeródromo Llolle Norte','oaci' => 'SCKB']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Lautaro','nombre' => 'Aeródromo Esperanza','oaci' => 'SCLS']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Lautaro','nombre' => 'Aeródromo General Tovarías','oaci' => 'SCLA']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Icalma','nombre' => 'Aeródromo Icalma','oaci' => 'SCQI']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Lonquimay','nombre' => 'Aeródromo Lolco','oaci' => 'SCCU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Lonquimay','nombre' => 'Aeródromo Villa Portales','oaci' => 'SCQY']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Los Sauces','nombre' => 'Aeródromo Guadaba','oaci' => 'SCGB']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Melipeuco','nombre' => 'Aeródromo Melipeuco','oaci' => 'SCML']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pucón','nombre' => 'Aeródromo Curimanque','oaci' => 'SCKQ']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Pucón','nombre' => 'Aeródromo de Pucón','oaci' => 'SCPC']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Quino','nombre' => 'Aeródromo La Colmena','oaci' => 'SCQC']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Temuco','nombre' => 'Aeródromo Maquehue','oaci' => 'SCTC']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Teodoro Schmidt','nombre' => 'Aeródromo El Budi','oaci' => 'SCSH']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Traiguén','nombre' => 'Aeródromo Traiguén','oaci' => 'SCTR']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Traiguén','nombre' => 'Aeródromo Chufquén','oaci' => 'SCHF']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Victoria','nombre' => 'Aeródromo Victoria','oaci' => 'SCTO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Victoria','nombre' => 'Aeródromo María Ester','oaci' => 'SCVO']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vilcún','nombre' => 'Aeródromo Agromanzún','oaci' => 'SCVU']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vilcún','nombre' => 'Aeródromo Malla','oaci' => 'SCVY']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vilcún','nombre' => 'Aeródromo Ainhoa','oaci' => 'SCNH']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Vilcún','nombre' => 'Aeródromo La Verónica','oaci' => 'SCRV']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Villarrica','nombre' => 'Aeródromo Malloco','oaci' => 'SCMF']);
            factory(App\Airport::class)->create([
                'region_id' =>  $r->id,'ciudad' => 'Villarrica','nombre' => 'Aeródromo Villarrica','oaci' => 'SCVI']);
                


    $r = factory(App\Region::class)->create([
        'extra' => 'X',
        'nombre' => 'De Los Lagos',
        'country_id' => '1'
    ]);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Ancud','nombre' => 'Aeródromo Faro Punta Corona','oaci' => 'SCWF']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Curaco de Vélez','nombre' => 'Aeródromo Tolquién','oaci' => 'SCAH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Montt','nombre' => 'Aeropuerto Internacional El Tepual','oaci' => 'SCTE']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Osorno','nombre' => 'Aeródromo Cañal Bajo Carlos Hott Siebert','oaci' => 'SCJO']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Dalcahue - Castro','nombre' => 'Aeródromo Mocopulli','oaci' => 'SCPQ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Ancud','nombre' => 'Aeródromo Pupelde','oaci' => 'SCAC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Ayacara','nombre' => 'Aeródromo Ayacara','oaci' => 'SCAY']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Caleta Gonzalo','nombre' => 'Aeródromo Caleta Gonzalo','oaci' => 'SCGN']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Castro','nombre' => 'Aeródromo Gamboa','oaci' => 'SCST']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chonchi','nombre' => 'Aeródromo Los Calafates','oaci' => 'SCFS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cochamó','nombre' => 'Aeródromo Rincón Bonito','oaci' => 'SCBT']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cochamó','nombre' => 'Aeródromo Cochamó','oaci' => 'SCKM']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Contao','nombre' => 'Aeródromo Contao','oaci' => 'SCCK']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Frutillar','nombre' => 'Aeródromo Añorada','oaci' => 'SCAA']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Frutillar','nombre' => 'Aeródromo El Avellano','oaci' => 'SCEV']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Frutillar','nombre' => 'Aeródromo Fundo Tehuén','oaci' => 'SCFI']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Frutillar','nombre' => 'Aeródromo Frutillar','oaci' => 'SCFR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Futaleufú','nombre' => 'Aeródromo Futaleufú','oaci' => 'SCFT']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Hualaihué','nombre' => 'Aeródromo Hualaihué','oaci' => 'SCHW']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Hualaihué','nombre' => 'Aeródromo Río Negro','oaci' => 'SCRN']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Apiao','nombre' => 'Aeródromo Isla Apiao','oaci' => 'SCIA']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Butachauques','nombre' => 'Aeródromo Butachauques','oaci' => 'SCIB']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Quenac','nombre' => 'Aeródromo Quenac','oaci' => 'SCQE']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Talcán','nombre' => 'Aeródromo Isla Talcán','oaci' => 'SCIK']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'La Junta','nombre' => 'Aeródromo La Junta','oaci' => 'SCLJ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Llanada Grande','nombre' => 'Aeródromo Llanada Grande','oaci' => 'SCLD']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Ñochaco','nombre' => 'Aeródromo Ñochaco','oaci' => 'SCNO']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Osorno','nombre' => 'Aeródromo Callipulli','oaci' => 'SCCP']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Osorno','nombre' => 'Aeródromo Juan Kemp','oaci' => 'SCJK']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Osorno','nombre' => 'Aeródromo Las Quemas','oaci' => 'SCQM']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Osorno','nombre' => 'Aeródromo Pilauco','oaci' => 'SCOP']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Palena','nombre' => 'Aeródromo Alto Palena','oaci' => 'SCAP']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Peulla','nombre' => 'Aeródromo Peulla','oaci' => 'SCPU']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Poyo','nombre' => 'Aeródromo de Poyo','oaci' => 'SCYO']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puelo Bajo','nombre' => 'Aeródromo Puelo Bajo','oaci' => 'SCPB']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Montt','nombre' => 'Aeródromo Marcel Marchant','oaci' => 'SCPF']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Octay','nombre' => 'Aeródromo Las Araucarias','oaci' => 'SCOC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Varas','nombre' => 'Aeródromo Don Dobri','oaci' => 'SCDD']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Varas','nombre' => 'Aeródromo El Mirador','oaci' => 'SCPV']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Varas','nombre' => 'Aeródromo El Arrayán','oaci' => 'SCRY']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Purranque','nombre' => 'Aeródromo Corte Alto','oaci' => 'SCPR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Purranque','nombre' => 'Aeródromo Cuyumaique','oaci' => 'SCYU']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puyehue','nombre' => 'Aeródromo La Capilla','oaci' => 'SCYC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puyehue','nombre' => 'Aeródromo Licán','oaci' => 'SCYL']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puyehue','nombre' => 'Aeródromo Refugio del Lago','oaci' => 'SCOL']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Queilén','nombre' => 'Aeródromo Queilén','oaci' => 'SCQX']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Quellón','nombre' => 'Aeródromo Quellón','oaci' => 'SCON']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Quellón','nombre' => 'Aeródromo Inio','oaci' => 'SCQU']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Quemchi','nombre' => 'Aeródromo Quemchi','oaci' => 'SCQW']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Reñihué','nombre' => 'Aeródromo Reñihué','oaci' => 'SCRH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Riñihue','nombre' => 'Aeródromo El Vergel','oaci' => 'SCVG']);
        factory(App\Airport::class)->create([   
            'region_id' =>  $r->id,'ciudad' => 'Río Frío','nombre' => 'Aeródromo Río Frío','oaci' => 'SCRI']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'San Pablo','nombre' => 'Aeródromo Quilpe','oaci' => 'SCSQ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Segundo Corral','nombre' => 'Aeródromo Segundo Corral','oaci' => 'SCSR']);
            


    $r = factory(App\Region::class)->create([
        'extra' => 'XI',
        'nombre' => 'Aysén',
        'country_id' => '1'
    ]);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Balmaceda - Coyhaique','nombre' => 'Aeródromo Balmaceda','oaci' => 'SCBA']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Aysén','nombre' => 'Aeródromo Quitralco','oaci' => 'SCQO']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Aysén','nombre' => 'Aeródromo Río Exploradores','oaci' => 'SCEX']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo de Chaitén','oaci' => 'SCTN']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo Chumildén','oaci' => 'SCHD']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo El Amarillo','oaci' => 'SCEA']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo Los Alerces','oaci' => 'SCLR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo Pillán','oaci' => 'SCPN']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo Pumalín','oaci' => 'SCUI']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo Tic Toc','oaci' => 'SCHT']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo Vodudahue','oaci' => 'SCDH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chaitén','nombre' => 'Aeródromo Santa Bárbara Ruta 7','oaci' => 'SCNC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cochrane','nombre' => 'Aeródromo Lago Vargas','oaci' => 'SCVS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cochrane','nombre' => 'Aeródromo Cochrane','oaci' => 'SCHR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cochrane','nombre' => 'Aeródromo Valchac','oaci' => 'SCAL']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chile Chico','nombre' => 'Aeródromo Chile Chico','oaci' => 'SCCC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Coyhaique','nombre' => 'Aeródromo Teniente Vidal','oaci' => 'SCCY']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Entrada Baker','nombre' => 'Aeródromo Entrada Baker','oaci' => 'SCEB']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Entrada Mayer','nombre' => 'Aeródromo Entrada Mayer','oaci' => 'SCEY']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Fachinal','nombre' => 'Aeródromo Fachinal','oaci' => 'SCFC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Las Huichas','nombre' => 'Aeródromo Caleta Andrade','oaci' => 'SCIH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Lago Brown','nombre' => 'Aeródromo Lago Brown','oaci' => 'SCBR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Lago Verde','nombre' => 'Aeródromo Cacique Blanco','oaci' => 'SCBC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Lago Verde','nombre' => 'Aeródromo Lago Verde','oaci' => 'SCVE']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Laguna San Rafael','nombre' => 'Aeródromo Laguna San Rafael','oaci' => 'SCRF']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Melinka','nombre' => 'Aeródromo Melinka','oaci' => 'SCMK']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Ñadis','nombre' => 'Aeródromo Ñadis','oaci' => 'SCND']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Aysén','nombre' => 'Aeródromo Cabo 1° Juan Román','oaci' => 'SCAS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Cisnes','nombre' => 'Aeródromo Puerto Cisnes','oaci' => 'SCPK']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Cisnes','nombre' => 'Aeródromo La Junta','oaci' => 'SCLJ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Guadal','nombre' => 'Aeródromo Meseta Cosmelli','oaci' => 'SCMC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Guadal','nombre' => 'Aeródromo Los Leones','oaci' => 'SCLO']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Guadal','nombre' => 'Aeródromo Punta Baja','oaci' => 'SCHH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Ingeniero Ibáñez','nombre' => 'Aeródromo Puerto Ingeniero Ibáñez','oaci' => 'SCII']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Raúl Marín Balmaceda','nombre' => 'Aeródromo Puerto Marín Balmaceda','oaci' => 'SCMA']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Sánchez','nombre' => 'Aeródromo Puerto Sánchez','oaci' => 'SCSZ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puyuhuapi','nombre' => 'Aeródromo Puyuhuapi','oaci' => 'SCPH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Río Cisnes','nombre' => 'Aeródromo Villa Tapera','oaci' => 'SCRC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Río Cisnes','nombre' => 'Aeródromo Estancia Río Cisnes','oaci' => 'SCRE']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Río Murta','nombre' => 'Aeródromo Río Murta','oaci' => 'SCRU']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Tortel','nombre' => 'Aeródromo Enrique Mayer Soto','oaci' => 'SCCR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Tortel','nombre' => 'Aeródromo Río Bravo','oaci' => 'SCRB']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Tortel','nombre' => 'Aeródromo Río Pascua','oaci' => 'SCTP']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => "Villa O'Higgins",'nombre' => 'Aeródromo Laguna Redonda','oaci' => 'SCIO']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => "Villa O'Higgins",'nombre' => "Aeródromo Villa O'Higgins",'oaci' => 'SCOH']);
            

        

    $r = factory(App\Region::class)->create([
        'extra' => 'XII',
        'nombre' => 'Magallanes',
        'country_id' => '1'
    ]);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Punta Arenas','nombre' => 'Aeropuerto Internacional Presidente Carlos Ibáñez del Campo','oaci' => 'SCCI']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Natales','nombre' => 'Aeródromo Teniente Julio Gallardo','oaci' => 'SCNT']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Bahía Inútil','nombre' => 'Aeródromo Pampa Guanaco','oaci' => 'SCBI']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Bahía Posesión','nombre' => 'Aeródromo Bahía Posesión','oaci' => 'SCBS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cerro Castillo','nombre' => 'Aeródromo Cerro Castillo','oaci' => 'SCPY']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cerro Sombrero','nombre' => 'Aeródromo Franco Bianco','oaci' => 'SCSB']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Dawson','nombre' => 'Aeródromo Almirante Schroeders','oaci' => 'SCDW']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Grande de Tierra del Fuego','nombre' => 'Aeródromo Iván Martínez','oaci' => 'SCIT']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Navarino','nombre' => 'Aeródromo Yendegaia','oaci' => 'SCNY']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla Rey Jorge','nombre' => 'Aeródromo Teniente Rodolfo Marsh Martin','oaci' => 'SCRM']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Porvenir','nombre' => 'Aeródromo Capitán Fuentes Martínez','oaci' => 'SCFM']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Puerto Williams','nombre' => 'Aeródromo Guardiamarina Zañartu','oaci' => 'SCGZ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Punta Arenas','nombre' => 'Aeródromo Marco Davison Bascur','oaci' => 'SCID']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Punta Arenas','nombre' => 'Aeródromo Sandra Scabini','oaci' => 'SCNS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Punta Catalina','nombre' => 'Aeródromo Punta Catalina','oaci' => 'SCPX']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'San Gregorio','nombre' => 'Aeródromo Tres Chorrillos','oaci' => 'SCTH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'San Sebastián','nombre' => 'Aeródromo San Sebastián','oaci' => 'SCSS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Territorio Chileno Antártico','nombre' => 'Aeródromo Patriot Hills','oaci' => 'SCPZ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Territorio Chileno Antártico','nombre' => 'Aeródromo Unión Glaciar','oaci' => 'SCGC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Timaukel','nombre' => 'Aeródromo Azopardo','oaci' => 'SCAZ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Timaukel','nombre' => 'Aeródromo Russfin','oaci' => 'SCFN']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Torres del Paine','nombre' => 'Aeródromo Cerro Guido - Gunter Plüschow','oaci' => 'SCGD']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Villa Cerro Castillo','nombre' => 'Aeródromo Cerro Castillo','oaci' => 'SCPY']);
            


    $r = factory(App\Region::class)->create([
        'extra' => 'RM',
        'nombre' => 'Metropolitana de Santiago',
        'country_id' => '1'
    ]);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Alhué','nombre' => 'Aeródromo San Alfonso','oaci' => 'SCAF']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Santiago (Pudahuel)','nombre' => 'Aeropuerto Internacional Comodoro Arturo Merino Benítez','oaci' => 'SCEL']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Colina','nombre' => 'Aeródromo Chicureo','oaci' => 'SCHC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Colina','nombre' => 'Aeródromo La Victoria de Chacabuco','oaci' => 'SCVH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Curacaví','nombre' => 'Aeródromo Curacaví','oaci' => 'SCCV']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Isla de Maipo','nombre' => 'Aeródromo Viña Tarapacá','oaci' => 'SCVT']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Lampa','nombre' => 'Aeródromo Hacienda Lipangue','oaci' => 'SCHL']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Lampa','nombre' => 'Aeródromo Lipangui','oaci' => 'SCKL']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Melipilla','nombre' => 'Aeródromo Los Cuatro Diablos','oaci' => 'SCME']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Melipilla','nombre' => 'Aeródromo Melipilla','oaci' => 'SCMP']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Melipilla','nombre' => 'Aeródromo Santa Teresa del Almendral','oaci' => 'SCTS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Melipilla','nombre' => 'Aeródromo El Alba','oaci' => 'SCAB']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Paine','nombre' => 'Aeródromo Juan Enrique','oaci' => 'SCAU']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Paine','nombre' => 'Aeródromo Mansel','oaci' => 'SCMN']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Pirque','nombre' => 'Aeródromo El Principal','oaci' => 'SCEP']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Pirque','nombre' => 'Aeródromo Estero Seco','oaci' => 'SCZE']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'San Pedro','nombre' => 'Aeródromo Verfrut','oaci' => 'SCVF']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Santiago','nombre' => 'Aeródromo Eulogio Sánchez','oaci' => 'SCTB']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Santiago','nombre' => 'Aeródromo Los Cerrillos','oaci' => 'SCTI']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Santiago','nombre' => 'Aeródromo Municipal de Vitacura','oaci' => 'SCLC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Talagante','nombre' => 'Aeródromo El Corte','oaci' => 'SCEG']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Talagante','nombre' => 'Aeródromo Entre Ríos','oaci' => 'SCOS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Tiltil','nombre' => 'Aeródromo Alberto Santos Dumont','oaci' => 'SCSA']);
            


    $r = factory(App\Region::class)->create([
        'extra' => 'XIV',
        'nombre' => 'De Los Ríos',
        'country_id' => '1'
    ]);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Mariquina - Valdivia','nombre' => 'Aeródromo Pichoy','oaci' => 'SCVD']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Caleta Hueicolla','nombre' => 'Aeródromo Hueicolla','oaci' => 'SCHK']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Choshuenco','nombre' => 'Aeródromo Molco','oaci' => 'SCCM']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Choshuenco','nombre' => 'Aeródromo Chan Chan','oaci' => 'SCHN']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Futrono','nombre' => 'Aeródromo Loncopan','oaci' => 'SCFU']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Futrono','nombre' => 'Aeródromo Golfo Azúl','oaci' => 'SCGF']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'La Unión','nombre' => 'Aeródromo Los Maitenes de Villa Vieja','oaci' => 'SCVV']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'La Unión','nombre' => 'Aeródromo Pozo Brujo','oaci' => 'SCZB']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'La Unión','nombre' => 'Aeródromo Punta Galera','oaci' => 'SCGA']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Lago Ranco','nombre' => 'Aeródromo Arquilhué','oaci' => 'SCAQ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Lago Ranco','nombre' => 'Aeródromo Las Bandurrias','oaci' => 'SCXR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Llifén','nombre' => 'Aeródromo Calcurrupe','oaci' => 'SCLF']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Llifén','nombre' => 'Aeródromo Chollinco','oaci' => 'SCIF']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Paillaco','nombre' => 'Aeródromo Calpulli','oaci' => 'SCPL']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Paillaco','nombre' => 'Aeródromo Hacienda Cotrilla','oaci' => 'SCCO']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Panguipulli','nombre' => 'Aeródromo Curaco','oaci' => 'SCGP']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Panguipulli','nombre' => 'Aeródromo Municipal de Panguipulli','oaci' => 'SCPG']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Panguipulli','nombre' => 'Aeródromo Papageno','oaci' => 'SCNG']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Río Bueno','nombre' => 'Aeródromo Cotreumo','oaci' => 'SCBN']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Río Bueno','nombre' => 'Aeródromo El Cardal','oaci' => 'SCKD']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Río Bueno','nombre' => 'Aeródromo Purrahuín','oaci' => 'SCRR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Río Bueno','nombre' => 'Aeródromo Rucañanco','oaci' => 'SCRQ']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Río Bueno','nombre' => 'Aeródromo Cuincahin','oaci' => 'SCUH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Valdivia','nombre' => 'Aeródromo Las Marías','oaci' => 'SCVL']);



        
    $r = factory(App\Region::class)->create([
        'extra' => 'XV',
        'nombre' => 'Arica y Parinacota',
        'country_id' => '1'
    ]);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Arica','nombre' => 'Aeropuerto Internacional Chacalluta','oaci' => 'SCAR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Arica','nombre' => 'Aeródromo El Buitre','oaci' => 'SCAE']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Putre','nombre' => 'Aeródromo Zapahuira','oaci' => 'REVISAR']);




    $r = factory(App\Region::class)->create([
        'extra' => 'XVI',
        'nombre' => 'Ñuble',
        'country_id' => '1'
    ]);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chillán','nombre' => 'Aeródromo Fundo El Carmen','oaci' => 'SCFK']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chillán','nombre' => 'Aeródromo General Bernardo O\'Higgins','oaci' => 'SCCH']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Chillán','nombre' => 'Aeródromo La Vertiente','oaci' => 'SCAV']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Bulnes','nombre' => 'Aeródromo El Litral','oaci' => 'SCUL']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Bulnes','nombre' => 'Aeródromo Rucamalén','oaci' => 'SCUR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cholguán','nombre' => 'Aeródromo Siberia','oaci' => 'SCGS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Cobquecura','nombre' => 'Aeródromo Los Morros','oaci' => 'SCQR']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Coelemu','nombre' => 'Aeródromo Torreón','oaci' => 'SCKT']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Coihueco','nombre' => 'Aeródromo Pullami','oaci' => 'SCPI']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Ñiquén','nombre' => 'Aeródromo José Abel Sepúlveda','oaci' => 'SCJS']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Ranguelmo','nombre' => 'Aeródromo James Conrad','oaci' => 'SCJC']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'Recinto','nombre' => 'Aeródromo Atacalco','oaci' => 'SCAK']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'San Carlos','nombre' => 'Aeródromo Santa Marta','oaci' => 'SCKA']);
        factory(App\Airport::class)->create([
            'region_id' =>  $r->id,'ciudad' => 'San Nicolás','nombre' => 'Aeródromo Santa Eugenia','oaci' => 'SCNI']);
            

        
    }
}
