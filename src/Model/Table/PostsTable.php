<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \Cake\ORM\Association\HasMany $Uploads
 *
 * @method \App\Model\Entity\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Post newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Post[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PostsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('posts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Proffer.Proffer', [
            'title_image' => [
                'dir' => 'title_image_dir',
                'thumbnailSizes' => [
                    'mid' => ['w' => 450, 'h' => 300, 'crop' => true]
                ]
            ]
        ]);

        $this->hasMany('Uploads', [
            'foreignKey' => 'post_id',
            'sort' => ['Uploads.created' => 'desc'],
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);

        $this->hasOne('AuthorAvatars', [
            'foreignKey' => 'post_id',
            'dependent' => true,
            'cascadeCallbacks' => true
        ]);
    }


    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('description');

        $validator
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->allowEmpty('title_image', 'update');

        return $validator;
    }
}
