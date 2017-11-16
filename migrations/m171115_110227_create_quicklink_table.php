<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quicklink`.
 */
class m171115_110227_create_quicklink_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quicklink', [
            'id' => $this->primaryKey(),
            'userid' => $this->integer()->notNull(),
            'link' => $this->text()->notNull(),
            'title' => $this->string(255),
            'icon' => $this->string(255),
            'newwindow' => $this->integer(1)->notNull()->defaultValue(1),
            'position' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('quicklink');
    }
}
