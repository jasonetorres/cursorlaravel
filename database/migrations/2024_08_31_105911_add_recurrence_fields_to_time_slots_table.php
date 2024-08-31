<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecurrenceFieldsToTimeSlotsTable extends Migration
{
    public function up()
    {
        Schema::table('time_slots', function (Blueprint $table) {
            if (!Schema::hasColumn('time_slots', 'is_recurring')) {
                $table->boolean('is_recurring')->default(false);
            }
            if (!Schema::hasColumn('time_slots', 'recurrence_type')) {
                $table->string('recurrence_type')->nullable();
            }
            if (!Schema::hasColumn('time_slots', 'recurrence_end_date')) {
                $table->date('recurrence_end_date')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('time_slots', function (Blueprint $table) {
            $table->dropColumn(['is_recurring', 'recurrence_type', 'recurrence_end_date']);
        });
    }
}