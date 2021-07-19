<?php

namespace app\controllers;


use app\components\TestService;
use app\models\Product;
use app\models\User;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TestController extends Controller
{
    /**
     * @return string
     */

    public function actionIndex()
    {
        $user = User::findOne(1);
        $users = User::find()->with("createdTasks")->all();
        foreach ($users as $user){
            echo VarDumper::dumpAsString($user, 5, true);
        }
        $service = \Yii::$app->test->launch();
        return $this->render('index', [
            'product' => $user,
            'service' => $service,
        ]);
    }

    public function actionInsert()
    {
        \Yii::$app->db
            ->createCommand()
            ->insert('user', [
            'username' => 'Serj',
            'password_hash' => '12345',
            'creator_id' => 1,
            'created_at' => 1548252061])
            ->execute();
        \Yii::$app->db
            ->createCommand()
            ->insert('user', [
                'username' => 'Olga',
                'password_hash' => '000000',
                'creator_id' => 2,
                'created_at' => 1548252061])
            ->execute();
        \Yii::$app->db
            ->createCommand()
            ->insert('user', [
                'username' => 'Sonya',
                'password_hash' => '007',
                'creator_id' => 3,
                'created_at' => 1548252061])
            ->execute();
    }
    public function actionSelect()
    {
        $query = new Query();
        $result4 = $query
            ->from('task')
            ->innerJoin('user', 'task.creator_id = user.id')
            ->all();
        echo \yii\helpers\VarDumper::dumpAsString($result4, 5, true);
    }
}