<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder {
    public function run() {
        Produto::create([
            'nome' => 'Notebook Dell XPS',
            'descricao' => 'Notebook potente para programadores.',
            'preco' => 7899.99,
            'quantidade_estoque' => 10
        ]);

        Produto::create([
            'nome' => 'Mouse Gamer Razer',
            'descricao' => 'Mouse com alta precisão e iluminação RGB.',
            'preco' => 299.90,
            'quantidade_estoque' => 25
        ]);

        Produto::create([
            'nome' => 'Teclado Mecânico Redragon',
            'descricao' => 'Teclado mecânico RGB com switches Outemu.',
            'preco' => 349.99,
            'quantidade_estoque' => 15
        ]);
    }
}

