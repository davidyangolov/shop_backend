<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title_product
 * @property string $description
 * @property int $id_category
 * @property int $price
 *
 * @property Category $category
 * @property Liked[] $likeds
 * @property Orders[] $orders
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_product', 'description', 'id_category', 'price'], 'required'],
            [['id_category', 'price'], 'integer'],
            [['title_product', 'description'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_product' => 'Title Product',
            'description' => 'Description',
            'id_category' => 'Id Category',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Likeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikeds()
    {
        return $this->hasMany(Liked::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['Id_product' => 'id']);
    }
}
