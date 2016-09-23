<?php
namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * AppController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC ) for your controllers and their actions.
 */
class AppController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        // other rules
                        'controllers' => ['peserta'],
                        'actions' => ['index', 'view','upload'],
                        'allow' => true,
                        'roles' => ['member'],
                    ],
                    [
                        // other rules
                        'controllers' => ['peserta'],
                        'actions' => ['create', 'update'],
                        'allow' => true,
                        'roles' => ['employee'],
                    ],
                    [
                        // other rules
                        'controllers' => ['peserta'],
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],

                ], // rules

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

} // AppController
