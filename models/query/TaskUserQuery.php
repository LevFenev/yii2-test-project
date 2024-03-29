<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\TaskUser]].
 *
 * @see \app\models\TaskUser
 */
class TaskUserQuery extends \yii\db\ActiveQuery
{

    /**
     * {@inheritdoc}
     * @return \app\models\TaskUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\TaskUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
