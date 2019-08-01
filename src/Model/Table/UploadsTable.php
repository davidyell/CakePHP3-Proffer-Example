<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uploads Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Posts
 *
 * @method \App\Model\Entity\Upload get($primaryKey, $options = [])
 * @method \App\Model\Entity\Upload newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Upload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Upload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Upload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Upload[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Upload findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UploadsTable extends Table
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

        $this->setTable('uploads');
        $this->setDisplayField('filename');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Proffer.Proffer', [
            'filename' => [
                'dir' => 'file_dir'
            ]
        ]);

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['post_id'], 'Posts'));

        return $rules;
    }
}
