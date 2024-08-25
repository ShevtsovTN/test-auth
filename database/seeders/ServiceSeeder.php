<?php

namespace Database\Seeders;

use App\Enums\ServiceActionEnum;
use App\Enums\ServiceCodeEnum;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'id' => Str::uuid()->toString(),
                'name' => 'Astroway',
                'code' => ServiceCodeEnum::ASTROWAY,
                'action' => ServiceActionEnum::CRON,
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'MyDream',
                'code' => ServiceCodeEnum::MY_DREAM,
                'action' => ServiceActionEnum::CRON,
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'MindHealthy',
                'code' => ServiceCodeEnum::MIND_HEALTHY,
                'action' => ServiceActionEnum::CRON,
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'SurnameMystery',
                'code' => ServiceCodeEnum::SURNAME_MYSTERY,
                'action' => ServiceActionEnum::CRON,
            ],
            [
                'id' => Str::uuid()->toString(),
                'name' => 'PastLife',
                'code' => ServiceCodeEnum::PAST_LIFE,
                'action' => ServiceActionEnum::CRON,
            ],
        ];

        foreach ($services as $service) {
            Service::factory()->create($service);
        }
    }
}
