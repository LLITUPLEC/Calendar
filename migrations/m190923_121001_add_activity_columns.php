<?php

use yii\db\Migration;

/**
 * Class m190923_121001_add_activity_columns
 */
class m190923_121001_add_activity_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('activity', 'create_act', $this->string()->after('description'));
        $this->alterColumn('activity', 'update_act', $this->string()->after('description'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity', 'create_act');
        $this->dropColumn('activity', 'update_act');
    }

}
