<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\SmnScraperService;

class TestSmnScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:test-smn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Probar el scraper del Servicio Meteorológico Nacional';

    /**
     * Execute the console command.
     */
    public function handle(SmnScraperService $smn)
    {
        $this->info('🌤️  Probando scraper del SMN...');
        $this->newLine();

        try {
            $data = $smn->getWeatherData();
            
            $this->info('✅ Datos obtenidos correctamente!');
            $this->newLine();
            
            // Mostrar datos actuales
            $this->line('📍 Ubicación: ' . $data['location']);
            $this->line('🌡️  Temperatura: ' . $data['current']['temperature'] . '°C');
            $this->line('💧 Humedad: ' . $data['current']['humidity'] . '%');
            $this->line('💨 Viento: ' . $data['current']['wind_speed'] . ' km/h ' . $data['current']['wind_direction']);
            $this->line('🔽 Presión: ' . $data['current']['pressure'] . ' hPa');
            $this->line('☁️  Condición: ' . $data['current']['description']);
            $this->line('📡 Fuente: ' . $data['source']);
            $this->line('🕐 Actualizado: ' . $data['last_updated']);
            
            $this->newLine();
            $this->info('📅 Pronóstico (primeros 3 días):');
            
            foreach (array_slice($data['forecast'], 0, 3) as $day) {
                $this->line(sprintf(
                    '%s %s: Max %d°C, Min %d°C - Lluvia: %d%%',
                    $day['day'],
                    $day['date'],
                    $day['temp_max'],
                    $day['temp_min'],
                    $day['rain_probability']
                ));
            }
            
            $this->newLine();
            $this->info('✨ Scraper funcionando correctamente!');
            
            return Command::SUCCESS;
            
        } catch (\Exception $e) {
            $this->error('❌ Error: ' . $e->getMessage());
            $this->error('Stack trace: ' . $e->getTraceAsString());
            return Command::FAILURE;
        }
    }
}
