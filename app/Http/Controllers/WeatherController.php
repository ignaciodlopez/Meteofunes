<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SmnScraperService;

class WeatherController extends Controller
{
    protected $smn;

    public function __construct(SmnScraperService $smn)
    {
        $this->smn = $smn;
    }

    /**
     * Mostrar la página principal
     */
    public function index()
    {
        return view('weather.index');
    }

    /**
     * Obtener datos del clima actual desde SMN
     */
    public function getCurrentWeather()
    {
        try {
            $weatherData = $this->smn->getWeatherData();
            
            return response()->json(array_merge(
                $weatherData['current'],
                [
                    'location' => $weatherData['location'],
                    'source' => $weatherData['source']
                ]
            ));
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener datos del clima',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener pronóstico extendido desde SMN
     */
    public function getForecast()
    {
        try {
            $weatherData = $this->smn->getWeatherData();
            return response()->json($weatherData['forecast']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener pronóstico',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Limpiar caché de datos meteorológicos
     */
    public function clearCache()
    {
        $this->smn->clearCache();
        return response()->json(['message' => 'Caché limpiado correctamente']);
    }

    /**
     * Obtener condición climática aleatoria
     */
    private function getRandomCondition()
    {
        $conditions = ['sunny', 'cloudy', 'partly_cloudy', 'rainy', 'stormy', 'windy'];
        return $conditions[array_rand($conditions)];
    }

    /**
     * Obtener dirección del viento aleatoria
     */
    private function getRandomWindDirection()
    {
        $directions = ['N', 'NE', 'E', 'SE', 'S', 'SO', 'O', 'NO'];
        return $directions[array_rand($directions)];
    }

    /**
     * Obtener icono según condición
     */
    private function getWeatherIcon($condition)
    {
        $icons = [
            'sunny' => 'bi-sun-fill',
            'cloudy' => 'bi-cloud-fill',
            'partly_cloudy' => 'bi-cloud-sun-fill',
            'rainy' => 'bi-cloud-rain-fill',
            'stormy' => 'bi-cloud-lightning-rain-fill',
            'windy' => 'bi-wind',
        ];

        return $icons[$condition] ?? 'bi-cloud-sun-fill';
    }
}
