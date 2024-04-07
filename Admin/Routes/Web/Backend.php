<?php declare(strict_types=1);

use Modules\Production\Controller\BackendController;
use Modules\Production\Models\PermissionState;
use phpOMS\Account\PermissionType;
use phpOMS\Router\RouteVerb;

return [
    '^/production/list(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionList',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionState::PRODUCTION,
            ],
        ],
    ],
    '^/production/create(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionCreate',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionState::PRODUCTION,
            ],
        ],
    ],
    '^/production/view(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionView',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionState::PRODUCTION,
            ],
        ],
    ],
    '^/production/machine/list(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionMachineList',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionState::MACHINE,
            ],
        ],
    ],
    '^/production/machine/create(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionMachineCreate',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionState::MACHINE,
            ],
        ],
    ],
    '^/production/machine/view(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionMachineCreate',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionState::MACHINE,
            ],
        ],
    ],
    '^/production/recipe/list(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionMachineList',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::READ,
                'state'  => PermissionState::RECIPE,
            ],
        ],
    ],
    '^/production/recipe/create(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionMachineCreate',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionState::RECIPE,
            ],
        ],
    ],
    '^/production/recipe/view(\?.*$|$)' => [
        [
            'dest'       => '\Modules\Production\Controller\BackendController:viewProductionMachineCreate',
            'verb'       => RouteVerb::GET,
            'active'     => true,
            'permission' => [
                'module' => BackendController::MODULE_NAME,
                'type'   => PermissionType::CREATE,
                'state'  => PermissionState::RECIPE,
            ],
        ],
    ],
];
