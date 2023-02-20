<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidadmedida".
 *
 * @property int $idunidadmedida llave primaria de la unidad de medida
 * @property string $nombre Nombre de la unidad de media
 * @property int $idusuario id del usuario que realizo el registro
 * @property string $fechareg Fecha de creacion del registro
 */
class Unidadmedida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidadmedida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idunidadmedida', 'nombre', 'idusuario', 'fechareg'], 'required'],
            [['idunidadmedida', 'idusuario'], 'integer'],
            [['fechareg'], 'safe'],
            [['nombre'], 'string', 'max' => 50],
            [['idunidadmedida'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idunidadmedida' => 'Idunidadmedida',
            'nombre' => 'Nombre',
            'idusuario' => 'Idusuario',
            'fechareg' => 'Fechareg',
        ];
    }
}
