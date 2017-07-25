<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AuthorAvatarsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('author_avatars');
        $this->primaryKey('id');

        $this->addBehavior('Proffer.Proffer', [
            'avatar' => [
                'dir' => 'avatar_dir',
                'thumbnailSizes' => [
                    'mid' => ['w' => 450, 'h' => 300, 'crop' => true]
                ]
            ]
        ]);
    }

}