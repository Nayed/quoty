<?php 

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteTableSeeder extends Seeder
{
    public funcion run()
    {
        Quote::create([
            'text' => 'Success is going from failure to failure without losing your enthusiasm',
            'author' => 'Winston Churchill',
            'background' => '1.jpg'     // don't forget to provide img in the public folder
        ]);

        Quote::create([
            'text' => 'Dream big and dare to fail',
            'author' => 'Norman Vaughan',
            'background' => '2.jpg'
        ]);

        Quote::create([
            'text' => 'It does not matter how slowly you go as long as you do not stop',
            'author' => 'Confucius',
            'background' => '3.jpg'
        ]);

        Quote::create([
            'text' => 'Do not wish for an easy life. Wish for the strength to endure a difficult one',
            'author' => 'Bruce Lee',
            'background' => '4.jpg'
        ]);
    }
}