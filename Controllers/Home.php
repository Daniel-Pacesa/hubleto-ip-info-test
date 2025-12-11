<?php

namespace Hubleto\App\Custom\IpInfoTest\Controllers;

use Hubleto\App\Custom\IpInfoTest\Models\IpFavorite;

class Home extends \Hubleto\Erp\Controller
{

    public function getBreadcrumbs(): array
    {
        return array_merge(parent::getBreadcrumbs(), [
            [ 'url' => 'ipinfotest', 'content' => 'IpInfoTest' ],
        ]);
    }
    public function prepareView(): void
    {
        parent::prepareView();

        $contentType = $_SERVER["CONTENT_TYPE"] ?? '';
        if (strpos($contentType, 'application/json') !== false) {
            $input = json_decode(file_get_contents('php://input'), true);

            if (isset($input['action']) && $input['action'] === 'save_favorite') {

                $model = new IpFavorite();

                $saved = $model->add(
                    $input['ip'] ?? '',
                    $input['country'] ?? '',
                    $input['city'] ?? '',
                    $input['isp'] ?? ''
                );

                header('Content-Type: application/json');
                echo json_encode(['success' => $saved]);
                exit;
            }
        }

        $model = new IpFavorite();
        $this->viewParams['favorites'] = $model->getAll();
        $this->viewParams['now'] = date('Y-m-d H:i:s');
        $this->setView('@Hubleto:App:Custom:IpInfoTest/Home.twig');
    }
}