<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 *
 * @property Contract[] $contracts
 * @property Contract[] $contracts0
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email'], 'required'],
            [['name', 'surname', 'email'], 'string', 'max' => 255],
            ['email','email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Contracts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuyers()
    {
        return $this->hasMany(Contract::className(), ['buyer_client' => 'id']);
    }

    /**
     * Gets query for [[Contracts0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSellers()
    {
        return $this->hasMany(Contract::className(), ['seller_client' => 'id']);
    }

    /** Get clients record for populating dropdown menu
     * @return array
     */
    public static function getAllClientForDropDownMenu()
    {
        return ArrayHelper::map(Client::find()->asArray()->all(), 'id', 'name');
    }
}
