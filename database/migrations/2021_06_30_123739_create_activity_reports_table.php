<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement($this->dropView());

        \Illuminate\Support\Facades\DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement($this->dropView());
    }


    protected function dropView(): string
    {
        return <<<SQL
DROP VIEW IF EXISTS `activity_reports`;
SQL;
    }

    protected function createView(): string
    {
return <<<SQL
        CREATE VIEW `activity_reports` AS
        SELECT
            trainer_id,
            dog_activity_id,
            SUM(duration) AS hours_taken,
            MIN(STATUS) AS session_status,
            DATE(created_at) AS created_at
        FROM
            `activity_sessions`
        GROUP BY
            dog_activity_id,
            created_at,
            trainer_id
SQL;
    }
}
