<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario.categorias".
 *
 * @property int $id_categoria Id autoincremental que referencia la clasificación por categoria
 * @property string $nombre Nombre o descriptivo de la categoria
 * @property int $id_usuario id del usuario que hizo el registro
 * @property string $fechareg
 * @property bool $estatus
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventario.categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_usuario', 'fechareg'], 'required'],
            [['id_usuario'], 'default', 'value' => null],
            [['id_usuario'], 'integer'],
            [['fechareg'], 'safe'],
            [['estatus'], 'boolean'],
            [['nombre'], 'string', 'max' => 50],
            [['nombre'], 'unique'],
            //Se comento aún no funciona la regla de usuario logueado
            //[['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'nombre' => 'Nombre',
            'id_usuario' => 'Id Usuario',
            'fechareg' => 'Fechareg',
            'estatus' => 'Estatus',
        ];
    }
}
