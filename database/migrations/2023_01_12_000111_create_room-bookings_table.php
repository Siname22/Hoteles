<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Room;
use App\Models\Booking;


return new class extends Migration
{
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Room::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignIdFor(Booking::class)
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservas_habitacions');
    }
};
