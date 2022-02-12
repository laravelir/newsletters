<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Laravelir\Newsletters\Enums\MessageDeliveryStatusEnum;

class CreateNewslettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('email')->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('subscriber_id');
            $table->string('subject');
            $table->string('from');
            $table->text('body');
            $table->char('driver');
            $table->char('delivered')->default(MessageDeliveryStatusEnum::UNSENT);
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('failed_at')->nullable();
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
        Schema::dropIfExists('newsletter_subscribers');
        Schema::dropIfExists('newsletters');
    }
}
