<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->morphs('reviewable');
            $table->tinyInteger('status')->default(0)->comment('审核状态 0：待审核，1：通过，-1：拒绝');
            $table->string('apply_type')->nullable()->comment('申请类型');
            $table->string('apply_desc')->nullable()->comment('申请描述');
            $table->string('suggestion')->nullable()->comment('审核意见建议');
            $table->timestamp('reviewed_at')->nullable()->comment('审核时间');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableName = config('review.reviews_table_name');
        Schema::dropIfExists($tableName);
    }
}
