<?php

namespace Modules\Carrental\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Carrental\Repositories\CarModelRepository;
use Modules\Carrental\Repositories\CarSeriesRepository;

class CarController extends Controller
{
    /**
     * @var CarModelRepository
     */
    private $modelRepository;
    /**
     * @var CarSeriesRepository
     */
    private $seriesRepository;

    public function __construct(CarModelRepository $modelRepository, CarSeriesRepository $seriesRepository)
    {
        $this->modelRepository = $modelRepository;
        $this->seriesRepository = $seriesRepository;
    }

    public function getModels(Request $request)
    {
        try
        {
            if($request->has('brand_id')) {
                $models = $this->modelRepository->all()->where('brand_id', $request->get('brand_id'))->map(function($model){
                    return [
                        'name' => $model->name,
                        'value' => $model->id,
                        'text' => $model->name
                    ];
                });
                return response()->json([
                    'success'      => true,
                    'results'      => $models
                ]);
            } else {
                throw new \Exception('Marka girmediniz');
            }
        }
        catch (\Exception $exception)
        {
            return response()->json([
                'success'      => true,
                'results'      =>  [[
                    'name' => "Model Bulunamadı",
                    'value' => "",
                    'text' => "Model Bulunamadı"
                ]]
            ]);
        }
    }

    public function getSeries(Request $request) {
        try
        {
            if($request->has('model_id')) {
                $series = $this->seriesRepository->all()->where('model_id', $request->get('model_id'))->map(function($serie){
                    return [
                        'name' => $serie->name,
                        'value' => $serie->id,
                        'text' => $serie->name
                    ];
                });
                return response()->json([
                    'success'      => true,
                    'results'      => $series
                ]);
            } else {
                throw new \Exception('Model girmediniz');
            }
        }
        catch (\Exception $exception)
        {
            return response()->json([
                'success'      => true,
                'results'      =>  [[
                    'name' => "Seri Bulunamadı",
                    'value' => "",
                    'text' => "Seri Bulunamadı"
                ]]
            ]);
        }
    }
}
