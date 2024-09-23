<?php

namespace App\Console\Commands;

use App\Models\Device;
use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;

class MqttSubscribeCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'app:mqtt-subscribe-command';

    /**
     * The console command description.
     */
    protected $description = 'Subscribe to MQTT topics and handle messages';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $mqtt = MQTT::connection();

        $mqtt->subscribe('devices/+/status', function (string $topic, string $message) {
            // Extract the device UUID from the topic
            preg_match('/devices\/(.*?)\/status/', $topic, $matches);
            $deviceUuid = $matches[1] ?? null;

            if ($deviceUuid) {
                // Find the device by UUID
                $device = Device::where('uuid', $deviceUuid)->first();

                if ($device) {
                    // Update the device status
                    $device->status = $message;
                    $device->save();

                    $this->info("Updated status for device {$deviceUuid} to {$message}");
                } else {
                    $this->error("Device {$deviceUuid} not found");
                }
            } else {
                $this->error("Failed to extract device UUID from topic: {$topic}");
            }
        }, 0);

        $mqtt->loop(true);
    }
}
