<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contract".
 *
 * @property int $id
 * @property int|null $number
 * @property int $buyer_client
 * @property int $seller_client
 * @property string|null $date
 * @property int|null $financial_amount
 * @property string|null $description
 *
 * @property Client $buyerClient
 * @property Client $sellerClient
 */
class Contract extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contract';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'buyer_client', 'seller_client', 'financial_amount'], 'integer'],
            [['buyer_client', 'seller_client'], 'required'],
            [['description'], 'string'],
            [['date'], 'string', 'max' => 255],
            ['date', 'date','format' => 'php:Y-m-d'],
            [['buyer_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['buyer_client' => 'id']],
            [['seller_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['seller_client' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'buyer_client' => 'Buyer Client',
            'seller_client' => 'Seller Client',
            'date' => 'Date',
            'financial_amount' => 'Financial Amount',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[BuyerClient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuyerClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'buyer_client']);
    }

    /**
     * Gets query for [[SellerClient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSellerClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'seller_client']);
    }
}
