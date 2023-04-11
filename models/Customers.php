<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $Full_name
 * @property string $mail
 * @property int $id_user
 *
 * @property Liked[] $likeds
 * @property Orders[] $orders
 * @property Users $user
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Full_name', 'mail', 'id_user'], 'required'],
            [['id_user'], 'integer'],
            [['Full_name'], 'string', 'max' => 255],
            [['mail'], 'string', 'max' => 35],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Full_name' => 'Full Name',
            'mail' => 'Mail',
            'id_user' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Likeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikeds()
    {
        return $this->hasMany(Liked::class, ['id_customer' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['id_customer' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'id_user']);
    }
}
