<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unidadmedida;

/**
 * unidadmedidaSearch represents the model behind the search form of `app\models\Unidadmedida`.
 */
class unidadmedidaSearch extends Unidadmedida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_unidadmedida', 'id_usuario'], 'integer'],
            [['unidadmedida', 'fechareg'], 'safe'],
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
        $query = Unidadmedida::find();

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
            'id_unidadmedida' => $this->id_unidadmedida,
            'id_usuario' => $this->id_usuario,
            'fechareg' => $this->fechareg,
            'estatus' => $this->estatus,
        ]);

        $query->andFilterWhere(['ilike', 'unidadmedida', $this->unidadmedida]);

        return $dataProvider;
    }
}
