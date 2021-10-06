<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ChMessage;
use App\Models\User;

class ChMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        ChMessage::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $messages = [
            [
                'id' => 1,
                'type' => 'user',
                'from_id' => 2,
                'to_id' => 1,
                'body' => 'CECI EST UN MESSAGE AUTOMATIQUE DU SITE : John Doe vient de postuler pour votre annonce "Changer ma douche. ". N\'hésitez pas à entrer en communication avec.',
                'attachment' => null,
                'seen' => 1,
                'created_at' => '2021-10-06 09:30:00',
                'updated_at' => '2021-10-06 09:30:00',
            ],
            [
                'id' => 2,
                'type' => 'user',
                'from_id' => 2,
                'to_id' => 1,
                'body' => 'Bonjour Bob comment vas tu? Je suis partant pour changer ta doucher!',
                'attachment' => null,
                'seen' => 1,
                'created_at' => '2021-10-06 09:31:00',
                'updated_at' => '2021-10-06 09:31:00',
            ],
            [
                'id' => 3,
                'type' => 'user',
                'from_id' => 1,
                'to_id' => 2,
                'body' => 'Très bien et toi? Super, j\'aimerais poser une douche italienne à la place de mon anciennce baignoire. Serais tu le faire?',
                'attachment' => null,
                'seen' => 1,
                'created_at' => '2021-10-06 09:32:00',
                'updated_at' => '2021-10-06 09:32:00',
            ],
            [
                'id' => 4,
                'type' => 'user',
                'from_id' => 2,
                'to_id' => 1,
                'body' => 'Oui, cela fait maintenant 2 ans que j\'ai commencé à travailler et j\'ai fait des études de plombier quand j\'étais plus jeune',
                'attachment' => null,
                'seen' => 1,
                'created_at' => '2021-10-06 09:33:00',
                'updated_at' => '2021-10-06 09:33:00',
            ],
            [
                'id' => 5,
                'type' => 'user',
                'from_id' => 1,
                'to_id' => 2,
                'body' => 'D\'accord, je te recontacte pour la date alors',
                'attachment' => null,
                'seen' => 1,
                'created_at' => '2021-10-06 09:34:00',
                'updated_at' => '2021-10-06 09:34:00',
            ],
            [
                'id' => 6,
                'type' => 'user',
                'from_id' => 2,
                'to_id' => 1,
                'body' => 'Très bien, à bientot !',
                'attachment' => null,
                'seen' => 1,
                'created_at' => '2021-10-06 09:35:00',
                'updated_at' => '2021-10-06 09:35:00',
            ],
        ];

        DB::table('ch_messages')->insert(
            $messages,
        );
    }
}
