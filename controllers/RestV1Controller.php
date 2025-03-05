<?php

declare(strict_types = 1);

namespace app\controllers;

use app\restApi\RestInterface;
use Yii;
use yii\rest\Controller;
use yii\web\HttpException;
use yii\web\Response;

/**
 * Class RestV1Controller
 *
 * @author Marina Shevchenko
 */
class RestV1Controller extends Controller
{
    //TODO: Temporary solution. I am sure, some better decision can be implemented in real API service.
    // Or even avoid usage of '-' in endpoints name
    private const array ALLOWED_RESOURCES = [
        'sum-even'
    ];

    /**
     * Action for API V1 POST requests.
     *
     * @return void
     * @throws \yii\web\HttpException
     */
    public function actionCreate(): void
    {
        $model = $this->getResourceModel();
        $model->setInputData(json_decode(Yii::$app->request->getRawBody(), true));

        $response = $model->create();

        $this->response->setStatusCode($response->getStatusCode());
        $this->response->format = Response::FORMAT_JSON;
        $this->response->content = $response->getStatusMessage();
    }

    private function getResourceRootNamespace(): string
    {
        return 'app\restApi\v1';
    }

    /**
     * @throws \yii\web\HttpException
     */
    private function getResourceModel(): RestInterface
    {
        $resourceName = strtolower($this->request->getQueryParam('resourceName'));
        if (!in_array($resourceName, self::ALLOWED_RESOURCES, true)) {
            throw new HttpException(501, 'Invalid resource name.');
        }

        $resourceName = str_replace('-', '', $resourceName);
        $className = $this->getResourceRootNamespace() . '\\' . $resourceName . '\\' . $resourceName;
        $model = null;
        if (class_exists($className)) {
            $model = new $className();
        }

        if (!($model instanceof RestInterface)) {
            throw new HttpException(501, 'Not implemented.');
        }

        return $model;
    }
}
