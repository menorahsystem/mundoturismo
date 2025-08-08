<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TouristAttraction;

class TouristAttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attractions = [
            [
                'cidade' => 'Rio de Janeiro',
                'pais' => 'Brasil',
                'categoria' => 'Histórico',
                'imagem_url' => 'https://images.unsplash.com/photo-1483729558449-99ef09a8c325?w=800',
                'endereco' => 'Parque Nacional da Tijuca, Alto da Boa Vista, Rio de Janeiro - RJ',
                'nome_pt' => 'Cristo Redentor',
                'nome_en' => 'Christ the Redeemer',
                'nome_es' => 'Cristo Redentor',
                'descricao_pt' => 'O Cristo Redentor é uma estátua art déco de Jesus Cristo, localizada no topo do morro do Corcovado, a 709 metros acima do nível do mar, no Parque Nacional da Tijuca, com vista para a maior parte da cidade do Rio de Janeiro.',
                'descricao_en' => 'Christ the Redeemer is an Art Deco statue of Jesus Christ, located at the top of Corcovado mountain, 709 meters above sea level, in Tijuca National Park, overlooking most of the city of Rio de Janeiro.',
                'descricao_es' => 'El Cristo Redentor es una estatua art déco de Jesucristo, ubicada en la cima del monte Corcovado, a 709 metros sobre el nivel del mar, en el Parque Nacional de Tijuca, con vista a la mayor parte de la ciudad de Río de Janeiro.',
            ],
            [
                'cidade' => 'Cusco',
                'pais' => 'Peru',
                'categoria' => 'Histórico',
                'imagem_url' => 'https://images.unsplash.com/photo-1587595431973-160d0d94add1?w=800',
                'endereco' => 'Machu Picchu, 08680, Peru',
                'nome_pt' => 'Machu Picchu',
                'nome_en' => 'Machu Picchu',
                'nome_es' => 'Machu Picchu',
                'descricao_pt' => 'Machu Picchu é uma cidade inca bem conservada, localizada no topo de uma montanha, a 2.400 metros de altitude, no vale do rio Urubamba, atual Peru.',
                'descricao_en' => 'Machu Picchu is a well-preserved Inca city, located on top of a mountain, 2,400 meters above sea level, in the Urubamba River valley, present-day Peru.',
                'descricao_es' => 'Machu Picchu es una ciudad inca bien conservada, ubicada en la cima de una montaña, a 2.400 metros sobre el nivel del mar, en el valle del río Urubamba, actual Perú.',
            ],
            [
                'cidade' => 'Agra',
                'pais' => 'Índia',
                'categoria' => 'Religioso',
                'imagem_url' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=800',
                'endereco' => 'Taj Mahal, Agra, Uttar Pradesh 282001, Índia',
                'nome_pt' => 'Taj Mahal',
                'nome_en' => 'Taj Mahal',
                'nome_es' => 'Taj Mahal',
                'descricao_pt' => 'O Taj Mahal é um mausoléu de mármore branco marfim, localizado na cidade de Agra, na Índia. Foi construído pelo imperador mogol Shah Jahan em memória de sua esposa favorita, Mumtaz Mahal.',
                'descricao_en' => 'The Taj Mahal is an ivory-white marble mausoleum, located in the city of Agra, India. It was built by the Mughal emperor Shah Jahan in memory of his favorite wife, Mumtaz Mahal.',
                'descricao_es' => 'El Taj Mahal es un mausoleo de mármol blanco marfil, ubicado en la ciudad de Agra, India. Fue construido por el emperador mogol Shah Jahan en memoria de su esposa favorita, Mumtaz Mahal.',
            ],
            [
                'cidade' => 'Paris',
                'pais' => 'França',
                'categoria' => 'Arquitetônico',
                'imagem_url' => 'https://images.unsplash.com/photo-1511739001486-6bfe10ce785f?w=800',
                'endereco' => 'Champ de Mars, 5 Avenue Anatole France, 75007 Paris, França',
                'nome_pt' => 'Torre Eiffel',
                'nome_en' => 'Eiffel Tower',
                'nome_es' => 'Torre Eiffel',
                'descricao_pt' => 'A Torre Eiffel é uma torre treliçada de ferro forjado localizada no Champ de Mars, em Paris, França. Construída de 1887 a 1889, foi projetada pelo engenheiro Gustave Eiffel.',
                'descricao_en' => 'The Eiffel Tower is a wrought-iron lattice tower located on the Champ de Mars in Paris, France. Built from 1887 to 1889, it was designed by engineer Gustave Eiffel.',
                'descricao_es' => 'La Torre Eiffel es una torre de celosía de hierro forjado ubicada en el Champ de Mars en París, Francia. Construida de 1887 a 1889, fue diseñada por el ingeniero Gustave Eiffel.',
            ],
            [
                'cidade' => 'Ilha de Páscoa',
                'pais' => 'Chile',
                'categoria' => 'Cultural',
                'imagem_url' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                'endereco' => 'Ilha de Páscoa, Valparaíso, Chile',
                'nome_pt' => 'Moai',
                'nome_en' => 'Moai',
                'nome_es' => 'Moai',
                'descricao_pt' => 'Os Moai são estátuas monolíticas humanas esculpidas pelos Rapa Nui na Ilha de Páscoa, no Chile, entre os anos 1250 e 1500. Representam os ancestrais deificados dos Rapa Nui.',
                'descricao_en' => 'The Moai are monolithic human figures carved by the Rapa Nui people on Easter Island, Chile, between the years 1250 and 1500. They represent the deified ancestors of the Rapa Nui.',
                'descricao_es' => 'Los Moai son figuras humanas monolíticas talladas por el pueblo Rapa Nui en la Isla de Pascua, Chile, entre los años 1250 y 1500. Representan a los ancestros deificados de los Rapa Nui.',
            ],
            [
                'cidade' => 'Honshu',
                'pais' => 'Japão',
                'categoria' => 'Natural',
                'imagem_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800',
                'endereco' => 'Monte Fuji, Honshu, Japão',
                'nome_pt' => 'Monte Fuji',
                'nome_en' => 'Mount Fuji',
                'nome_es' => 'Monte Fuji',
                'descricao_pt' => 'O Monte Fuji é a montanha mais alta da ilha de Honshu e de todo o arquipélago japonês, com 3.776 metros de altitude. É um vulcão ativo, embora tenha baixo risco de erupção.',
                'descricao_en' => 'Mount Fuji is the highest mountain on the island of Honshu and the entire Japanese archipelago, with an altitude of 3,776 meters. It is an active volcano, although it has a low risk of eruption.',
                'descricao_es' => 'El Monte Fuji es la montaña más alta de la isla de Honshu y de todo el archipiélago japonés, con una altitud de 3.776 metros. Es un volcán activo, aunque tiene un bajo riesgo de erupción.',
            ],
            [
                'cidade' => 'Roma',
                'pais' => 'Itália',
                'categoria' => 'Histórico',
                'imagem_url' => 'https://images.unsplash.com/photo-1552832230-c0197dd311b5?w=800',
                'endereco' => 'Piazza del Colosseo, 1, 00184 Roma RM, Itália',
                'nome_pt' => 'Coliseu',
                'nome_en' => 'Colosseum',
                'nome_es' => 'Coliseo',
                'descricao_pt' => 'O Coliseu é um anfiteatro oval localizado no centro da cidade de Roma, Itália. Construído de tijolo e pedra, é o maior anfiteatro do mundo e um dos maiores exemplos da arquitetura romana.',
                'descricao_en' => 'The Colosseum is an oval amphitheater located in the center of the city of Rome, Italy. Built of brick and stone, it is the largest amphitheater in the world and one of the greatest examples of Roman architecture.',
                'descricao_es' => 'El Coliseo es un anfiteatro ovalado ubicado en el centro de la ciudad de Roma, Italia. Construido de ladrillo y piedra, es el anfiteatro más grande del mundo y uno de los mayores ejemplos de la arquitectura romana.',
            ],
            [
                'cidade' => 'Nova York',
                'pais' => 'Estados Unidos',
                'categoria' => 'Arquitetônico',
                'imagem_url' => 'https://images.unsplash.com/photo-1502602898534-0df0b3f3d3b1?w=800',
                'endereco' => 'Liberty Island, Nova York, NY 10004, Estados Unidos',
                'nome_pt' => 'Estátua da Liberdade',
                'nome_en' => 'Statue of Liberty',
                'nome_es' => 'Estatua de la Libertad',
                'descricao_pt' => 'A Estátua da Liberdade é uma escultura neoclássica colossal localizada na Ilha da Liberdade no porto de Nova York. Foi um presente dos franceses aos americanos em 1886.',
                'descricao_en' => 'The Statue of Liberty is a colossal neoclassical sculpture located on Liberty Island in New York Harbor. It was a gift from the French to the Americans in 1886.',
                'descricao_es' => 'La Estatua de la Libertad es una escultura neoclásica colosal ubicada en la Isla de la Libertad en el puerto de Nueva York. Fue un regalo de los franceses a los estadounidenses en 1886.',
            ],
            [
                'cidade' => 'Petra',
                'pais' => 'Jordânia',
                'categoria' => 'Histórico',
                'imagem_url' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                'endereco' => 'Petra, Jordânia',
                'nome_pt' => 'Petra',
                'nome_en' => 'Petra',
                'nome_es' => 'Petra',
                'descricao_pt' => 'Petra é uma cidade histórica e arqueológica no sul da Jordânia, famosa por sua arquitetura esculpida em rocha e seu sistema de condutos de água. Foi a capital do reino nabateu.',
                'descricao_en' => 'Petra is a historical and archaeological city in southern Jordan, famous for its rock-cut architecture and water conduit system. It was the capital of the Nabataean Kingdom.',
                'descricao_es' => 'Petra es una ciudad histórica y arqueológica en el sur de Jordania, famosa por su arquitectura tallada en roca y su sistema de conductos de agua. Fue la capital del reino nabateo.',
            ],
            [
                'cidade' => 'Sydney',
                'pais' => 'Austrália',
                'categoria' => 'Arquitetônico',
                'imagem_url' => 'https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?w=800',
                'endereco' => 'Bennelong Point, Sydney NSW 2000, Austrália',
                'nome_pt' => 'Casa da Ópera de Sydney',
                'nome_en' => 'Sydney Opera House',
                'nome_es' => 'Casa de la Ópera de Sídney',
                'descricao_pt' => 'A Casa da Ópera de Sydney é um centro de artes cênicas multivenue em Sydney, Austrália. É um dos edifícios mais famosos e distintos do século XX.',
                'descricao_en' => 'The Sydney Opera House is a multi-venue performing arts centre in Sydney, Australia. It is one of the most famous and distinctive buildings of the 20th century.',
                'descricao_es' => 'La Casa de la Ópera de Sídney es un centro de artes escénicas multivenue en Sídney, Australia. Es uno de los edificios más famosos y distintivos del siglo XX.',
            ],
            [
                'cidade' => 'Marrakech',
                'pais' => 'Marrocos',
                'categoria' => 'Cultural',
                'imagem_url' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                'endereco' => 'Jemaa el-Fnaa, Marrakech, Marrocos',
                'nome_pt' => 'Jemaa el-Fnaa',
                'nome_en' => 'Jemaa el-Fnaa',
                'nome_es' => 'Jemaa el-Fnaa',
                'descricao_pt' => 'Jemaa el-Fnaa é a principal praça e mercado de Marrakech, Marrocos. É um dos espaços públicos mais famosos do mundo árabe e um Patrimônio Cultural Imaterial da Humanidade.',
                'descricao_en' => 'Jemaa el-Fnaa is the main square and market in Marrakech, Morocco. It is one of the most famous public spaces in the Arab world and an Intangible Cultural Heritage of Humanity.',
                'descricao_es' => 'Jemaa el-Fnaa es la plaza principal y mercado de Marrakech, Marruecos. Es uno de los espacios públicos más famosos del mundo árabe y un Patrimonio Cultural Inmaterial de la Humanidad.',
            ],
        ];

        foreach ($attractions as $attraction) {
            TouristAttraction::create($attraction);
        }
    }
}
