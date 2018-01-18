<?php
use App\Message;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();
        for ($i = 1; $i <= 50000; $i++) {

        Message::create([

        		'nombre' => "Usuario {$i}",
					 'email' =>"usuario{$i}@gmail.com",
					 'texto' => "Este es el mensaje numero {$i} para quien corresponda",
						'created_at' => Carbon::now()->subDays(300)->addDays($i)
				]);

				}
    }
}
