<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Menu;


class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummyCategory = collect([
            'Entradas','Salgadinhos','Mariscos','Refeições','Sobremesa', 'Bebidas', 'Sobremesas'
        ]);

        $dummyCategory->each(function($value) {
            factory(Category::class)->create(['name' => $value]);
        });

        $this->addEntradas();
        $this->addSalgadinhos();
        $this->addMariscos();
        $this->addRefeicoes();
        $this->addSobremesas();
        $this->addBebidas();
    }

    private function addEntradas()
    {
        factory(Menu::class)->create([
            'name' => 'Cabeças de Lula Panadas',
            'price' => 450,
            'quantityA' => 20,
            'quantityC' => 3,
            'category_id' => 1,
            'description' => 'Cabeças de Lula.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Camarões Panados',
            'price' => 500,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 6,
            'description' => 'Camarões Panados.'
        ]);
    
        factory(Menu::class)->create([
            'name' => 'Pops de Frango',
            'price' => 450,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Pops de frango.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Camarões a Fufuta',
            'price' => 350,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 4,
            'description' => 'Camarões a Fufuta.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Camarão Alhinho',
            'price' => 500,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 1,
            'description' => 'Camarão Alhinho.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Chouriço',
            'price' => 400,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Chouriço.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Ameijoa',
            'price' => 450,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 0,
            'description' => 'Ameijoa.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Mexilhões',
            'price' => 800,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Mexilhões.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Pão de Alho',
            'price' => 200,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 9,
            'description' => 'Pão de Alho.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Ostras 12 unidades',
            'price' => 1000,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 3,
            'description' => 'Ostras 12 unidades.'
        ]);

        factory(Menu::class)->create([
            'name' => '1kg de Camarão Cozido',
            'price' => 500,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => '1kg de Camarão Cozido.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Prego no pão com batatas fritas',
            'price' => 300,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Prego no pão com batatas fritas.'
        ]);
    
        factory(Menu::class)->create([
            'name' => 'Prego no prato com ovo, batata e salada',
            'price' => 500,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Prego no prato com ovo, batata e salada.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Mutlhutlhu de carne/peixe com pão',
            'price' => 300,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Mutlhutlhu de carne/peixe com pão.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Moelas Estufadas',
            'price' => 300,
            'category_id' => 1,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Moelas Estufadas.'
        ]);
    }

    private function addSalgadinhos()
    {
        factory(Menu::class)->create([
            'name' => 'Rissóis',
            'price' => 250,
            'category_id' => 2,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Rissóis.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Chamussas',
            'price' => 250,
            'category_id' => 2,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Chamussas.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Spring roll',
            'price' => 250,
            'category_id' => 2,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Spring roll.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Pastéis de Bacalhau',
            'price' => 250,
            'category_id' => 2,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Pastéis de Bacalhau.'
        ]);
    }

    private function addMariscos()
    {
        factory(Menu::class)->create([
            'name' => 'Camarão Grelhado
            3 Camarões TG c/batatas fritas e salada',
            'price' => 3000,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Camarão Grelhado
            3 Camarões TG c/batatas fritas e salada.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Camarão Grelhado
            6 Camarões G c/batatas fritas e salada',
            'price' => 2100,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Camarão Grelhado
            6 Camarões G c/batatas fritas e salada.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Camarão Grelhado
            6 Camarões M c/batatas fritas e salada',
            'price' => 1800,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Camarão Grelhado
            6 Camarões M c/batatas fritas e salada.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Camarão Grelhado
            10 Camarões 2/S c/batatas fritas e salada',
            'price' => 700,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Camarão Grelhado
            10 Camarões 2/S c/batatas fritas e salada.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Camarão a Kilo
            1/2 kg de Camarão médio frito',
            'price' => 1000,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Camarão a Kilo
            1/2 kg de Camarão médio frito.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Camarão a Kilo
            1 kg de Camarão médio frito',
            'price' => 1000,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Camarão a Kilo
            1 kg de Camarão médio frito.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Mix de lulas e 5 camarões S grelhados
            com batata e salada',
            'price' => 1350,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Mix de lulas e 5 camarões S grelhados
            com batata e salada.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Frigideira de marisco a FAROL
            (Porção de peixe, lulas, camarão com batata arroz e salada) Para 2 Pessoas',
            'price' => 3500,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Frigideira de marisco a FAROL
            (Porção de peixe, lulas, camarão com batata arroz e salada) Para 2 Pessoas.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Frigideira de marisco a FAROL
            (Porção de peixe, lulas, camarão com batata arroz e salada) Para 4 Pessoas',
            'price' => 5500,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Frigideira de marisco a FAROL
            (Porção de peixe, lulas, camarão com batata arroz e salada) Para 4 Pessoas.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Travessa de 30 camarões grelhados(grandes) King',
            'price' => 7000,
            'quantityA' => 20,
            'quantityC' => 2,
            'category_id' => 3,
            'description' => 'Travessa de 30 camarões grelhados(grandes) King.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Travessa de 30 camarões grelhados(médios) Queen',
            'price' => 5000,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Travessa de 30 camarões grelhados(médios) Queen.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Travessa de 30 camarões grelhados(médios) S',
            'price' => 3000,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Travessa de 30 camarões grelhados(médios) S.'
        ]);

        factory(Menu::class)->create([
            'name' => '10 Lagostins',
            'price' => 3000,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => '10 Lagostins.'
        ]);
        
        factory(Menu::class)->create([
            'name' => '20 Lagostins',
            'price' => 5000,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => '20 Lagostins.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Peixe de prato para uma pessoa vermelhão',
            'price' => 900,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Peixe de prato para uma pessoa vermelhão.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Peixe de prato para uma pessoa Garoupa',
            'price' => 1200,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Peixe de prato para uma pessoa Garoupa.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Peixe de prato para uma pessoa filete de peixe',
            'price' => 1200,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Peixe de prato para uma pessoa filete de peixe.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Peixe de prato para uma pessoa 4 Sardinhas batata coziza e salada',
            'price' => 650,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Peixe de prato para uma pessoa 4 Sardinhas batata coziza e salada.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Peixe de prato para uma pessoa Salmão à Farol',
            'price' => 1500,
            'category_id' => 3,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Peixe de prato para uma pessoa Salmão à Farol.'
        ]);
    }

    private function addRefeicoes()
    {
        factory(Menu::class)->create([
            'name' => 'Chicken Fried Rice',
            'price' => 220,
            'category_id' => 4,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Fried rice is dish of cooked rice that has been stir-fried in a wok or a frying pan
            and is usually mixed with other ingredients such as eggs, vegetables, seafood, or meat.It is often eaten 
            by itself or as an accompaniment to another dish.'
        ]);
        
        factory(Menu::class)->create([
            'name' => 'Hainanese Chicken Rice',
            'price' => 250,
            'category_id' => 4,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Hainenese chicken rice is a dish adapted from early Chinese immigrants originally from
            Hainan province in southern China, where it\'s called Wenchang chicken. It is considered one of the national
            dishes of Singapore.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Chicken Chettinad',
            'price' => 280,
            'category_id' => 4,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Chicken Chettinad or Chettinad chicken is a classic Indian recipe, from the cuisine of Chettinad. 
            It consists of chicken marineted. in yogurt, tumeric and a paste of red chillies, kalpasi, coconut, poppy seeds, 
            coriander seeds, cumin seeds, fennel seeds, black pepper, ground nuts, onions, garlic and gingelly oil. '
        ]); 
    }

    private function addSobremesas()
    {
        factory(Menu::class)->create([
            'name' => 'Bebinca',
            'price' => 250,
            'category_id' => 5,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Bebinca.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Mousse(Chocolocate ou Malambe)',
            'price' => 250,
            'category_id' => 5,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Mousse(Chocolocate ou Malambe).'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Magnum',
            'price' => 180,
            'category_id' => 5,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Magnum.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Cornetos',
            'price' => 200,
            'category_id' => 5,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Cornetos.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Chá',
            'price' => 70,
            'category_id' => 5,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Chá.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Café',
            'price' => 80,
            'category_id' => 5,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Café.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Galão',
            'price' => 150,
            'category_id' => 5,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Galão.'
        ]);

        factory(Menu::class)->create([
            'name' => 'Cappuccino',
            'price' => 150,
            'category_id' => 5,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Cappuccino.'
        ]);
    }

    private function addBebidas()
    {
        factory(Menu::class)->create([
            'name' => 'Água pequena 500ml',
            'price' => 70,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Água vumba 500ml.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Água grande 1.5l',
            'price' => 120,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Água grande vumba 1.5l .'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Água das pedras',
            'price' => 120,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Água das pedras.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Sumo Ceres pequeno',
            'price' => 80,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Sumo Ceres pequeno.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Sumo Compal/Santal 0.5l',
            'price' => 140,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Sumo Compal/Santal 0.5l.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Sumo Compal/Santal 0.5l',
            'price' => 140,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Sumo Compal/Santal 0.5l.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Sumo Ceres 1l',
            'price' => 250,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Sumo Ceres 1l.'
        ]);
        
        factory(Menu::class)->create([
            'name' => 'Sumo Compal 1l',
            'price' => 250,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Sumo Compal 1l.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Red Bull',
            'price' => 180,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Red Bull.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Refresco à lata(Sprite, Tónica, Minute Maid, Soda, Ginger ale,...)',
            'price' => 90,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Refresco à lata(Sprite, Tónica, Minute Maid, Soda, Ginger ale,...)'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Txilar à Garrafa',
            'price' => 120,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Txilar à Garrafa.'
        ]);  

        factory(Menu::class)->create([
            'name' => '2M/Manica/Laurentina',
            'price' => 120,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => '2M/Manica/Laurentina.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Castle Lite',
            'price' => 120,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Castle Lite.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Amstel lite/lager',
            'price' => 120,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Amstel lite/lager.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Super bock mini',
            'price' => 120,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Super bock mini.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Heineken Pequena',
            'price' => 140,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Heineken Pequena.'
        ]);  

        factory(Menu::class)->create([
            'name' => 'Budweiser',
            'price' => 140,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Budweiser.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Savana Dry',
            'price' => 140,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Savana Dry.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Hunters Gold/Dry',
            'price' => 140,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Hunters Gold/Dry.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Spin',
            'price' => 140,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Spin.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Strongbow',
            'price' => 200,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Strongbow.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Bacardi Breezer',
            'price' => 200,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Bacardi Breezer.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Stella',
            'price' => 200,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Stella.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Twist',
            'price' => 200,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Twist.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Sol',
            'price' => 200,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Sol.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Corona',
            'price' => 200,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Corona.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Vodka com Redbull',
            'price' => 300,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Vodka com Redbull.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Tipo tinto',
            'price' => 200,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Tipo tinto.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Caipirinha',
            'price' => 350,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Caipirinha.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Copo de Txilar',
            'price' => 100,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Copo de Txilar.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Copo de 2M',
            'price' => 100,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Copo de 2M.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Caneca de Txilar',
            'price' => 150,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Caneca de Txilar.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Caneca de 2M',
            'price' => 150,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Caneca de 2M.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Copo de Heineken',
            'price' => 160,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Copo de Heineken.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Caneca de Heineken',
            'price' => 180,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Caneca de Heineken.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Erdinger',
            'price' => 150,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Erdinger sem Álcool.'
        ]); 

        factory(Menu::class)->create([
            'name' => 'Heineken',
            'price' => 150,
            'category_id' => 6,
            'quantityA' => 20,
            'quantityC' => 2,
            'description' => 'Heineken sem Álcool.'
        ]); 
    }
    //     $categories = factory(\App\Models\Category::class, 5)->create();
        
    //     $categories ->each(function($category) {
    //         factory(\App\Models\Menu::class, 3)->create([
    //             'category_id' => $category->id,
    //         ]); 
    //     });
    // }
}
