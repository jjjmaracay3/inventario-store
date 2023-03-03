<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InventarioEmpresas;

/**
 * empresasSearch represents the model behind the search form of `app\models\InventarioEmpresas`.
 */
class empresasSearch extends InventarioEmpresas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_empresa', 'id_usuario'], 'integer'],
            [['rif', 'nombre', 'direccion', 'correo', 'telefono1', 'telefono2', 'redes', 'slogan', 'logo', 'fechareg'], 'safe'],
            [['estatus'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = InventarioEmpresas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_empresa' => $this->id_empresa,
            'id_usuario' => $this->id_usuario,
            'fechareg' => $this->fechareg,
            'estatus' => $this->estatus,
        ]);

        $query->andFilterWhere(['ilike', 'rif', $this->rif])
            ->andFilterWhere(['ilike', 'nombre', $this->nombre])
            ->andFilterWhere(['ilike', 'direccion', $this->direccion])
            ->andFilterWhere(['ilike', 'correo', $this->correo])
            ->andFilterWhere(['ilike', 'telefono1', $this->telefono1])
            ->andFilterWhere(['ilike', 'telefono2', $this->telefono2])
            ->andFilterWhere(['ilike', 'redes', $this->redes])
            ->andFilterWhere(['ilike', 'slogan', $this->slogan])
            ->andFilterWhere(['ilike', 'logo', $this->logo]);

        return $dataProvider;
    }
}
