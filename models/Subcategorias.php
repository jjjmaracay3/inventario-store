<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario.subcategorias".
 *
 * @property int $id_subcategoria identificador de la subcategoria
 * @property int $id_categoria
 * @property string $nombre
 * @property int $id_usuario
 * @property string $fechareg
 * @property bool $estatus
 */
class Subcategorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventario.subcategorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categoria', 'nombre', 'id_usuario', 'fechareg'], 'required'],
            [['id_categoria', 'id_usuario'], 'default', 'value' => null],
            [['id_categoria', 'id_usuario'], 'integer'],
            [['fechareg'], 'safe'],
            [['estatus'], 'boolean'],
            [['nombre'], 'string', 'max' => 50],
            [['nombre'], 'unique'],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['id_categoria' => 'id_categoria']],
            //[['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_subcategoria' => 'Id Subcategoria',
            'id_categoria' => 'Id Categoria',
            'nombre' => 'Nombre',
            'id_usuario' => 'Id Usuario',
            'fechareg' => 'Fechareg',
            'estatus' => 'Estatus',
        ];
    }
}
