<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pcs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('xuxemon_id');
            $table->foreign('xuxemon_id')->references('id')->on('xuxemons')->onDelete('cascade');
            $table->integer('hp_remaining');
            $table->integer('candies');
            $table->string('size')->nullable(); // Change the field type to string
            $table->timestamps();
        });

        // Create a trigger to set the size based on candies and xuxemon evolution requirements before INSERT
        DB::unprepared('
            CREATE TRIGGER set_size_trigger_before_insert BEFORE INSERT ON pcs
            FOR EACH ROW
            BEGIN
                DECLARE evo1_candies INT;
                DECLARE evo2_candies INT;

                SELECT evo1 INTO evo1_candies FROM xuxemons WHERE id = NEW.xuxemon_id;
                SELECT evo2 INTO evo2_candies FROM xuxemons WHERE id = NEW.xuxemon_id;

                IF NEW.candies < evo1_candies THEN
                    SET NEW.size = "small";
                ELSEIF NEW.candies < evo2_candies THEN
                    SET NEW.size = "medium";
                ELSE
                    SET NEW.size = "big";
                END IF;
            END;
        ');

        // Create a trigger to set the size based on candies and xuxemon evolution requirements before UPDATE
        DB::unprepared('
            CREATE TRIGGER set_size_trigger_before_update BEFORE UPDATE ON pcs
            FOR EACH ROW
            BEGIN
                DECLARE evo1_candies INT;
                DECLARE evo2_candies INT;

                SELECT evo1 INTO evo1_candies FROM xuxemons WHERE id = NEW.xuxemon_id;
                SELECT evo2 INTO evo2_candies FROM xuxemons WHERE id = NEW.xuxemon_id;

                IF NEW.candies < evo1_candies THEN
                    SET NEW.size = "small";
                ELSEIF NEW.candies < evo2_candies THEN
                    SET NEW.size = "medium";
                ELSE
                    SET NEW.size = "big";
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the triggers
        DB::unprepared('DROP TRIGGER IF EXISTS set_size_trigger_before_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS set_size_trigger_before_update');
        Schema::dropIfExists('pcs');
    }
};
