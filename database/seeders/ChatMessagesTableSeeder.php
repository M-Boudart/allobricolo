<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Helper;

class ChatMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('chat_messages')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $chatMessages = [
            [
                'chat_id' => 1,
                'sender_login' => 'bob123',
                'message' => 'Bonjour, comment allez vous ?',
                'written_at' => '2021-10-30 14:00:00',
                'status' => 'seen',
            ],
            [
                'chat_id' => 3,
                'sender_login' => 'bob123',
                'message' => 'Bonjour, je me propose de vous aider pour le changement de cuisine que vous voulez effectuer.',
                'written_at' => '2021-10-30 09:23:48',
                'status' => 'seen',
            ],
            [
                'chat_id' => 4,
                'sender_login' => 'pierre123',
                'message' => 'Salut mec, je te fais ça gratuitement si tu veux.',
                'written_at' => '2021-10-30 06:59:09',
                'status' => 'seen',
            ],
            [
                'chat_id' => 1,
                'sender_login' => 'marie123',
                'message' => 'ça va très bien et vous ? Je suppose que vous me contacté car j\'ai proposée mon aide à votre annonce.',
                'written_at' => '2021-10-30 14:10:15',
                'status' => 'seen',
            ],
            [
                'chat_id' => 2,
                'sender_login' => 'john123',
                'message' => 'Bonjour, je vous contacte suite à l\'annonce que vous avez posté à propos de votre douche. ALors je me présente, je m\'appelle John, je suis plombier chaffagiste depuis maintenant 2 ans en tant qu\'indépendant et je me ferais un plaisir de vous aider. Par contre je trouve que le prix indiqué dans l\'annonce est très peu élevé pour la charge de treavail que cela représente.',
                'written_at' => '2021-11-01 16:10:15',
                'status' => 'not seen',
            ],
            [
                'chat_id' => 1,
                'sender_login' => 'bob123',
                'message' => 'Tout à fait, alors comme ça vous êtes une femme plombière... Je ne sais pas que ça existait...',
                'written_at' => '2021-10-30 14:12:00',
                'status' => 'not seen',
            ],
            [
                'chat_id' => 3,
                'sender_login' => 'alain123',
                'message' => 'Bonjour, c\'est gentil de votre aide mais je viens de trouver quelqu\'un pour m\'aider. BOnne journée.',
                'written_at' => '2021-10-31 09:23:48',
                'status' => 'seen',
            ],
        ];

        foreach ($chatMessages as &$chatMessage) {
            $user = User::firstWhere('login', $chatMessage['sender_login']);

            $chatMessage['sender'] = $user->id;
            unset($chatMessage['sender_login']);
        }

        DB::table('chat_messages')->insert(
            $chatMessages,
        );
    }
}
