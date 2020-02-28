<?php

namespace app\controllers;

require '../vendor/autoload.php';

use app\models\Site;
use Yii;
use app\models\SchemeSearch;
use yii\web\Controller;

class SiteController extends Controller
{
    public function behaviors()
    {
        /*
            Везде, где будет определен данный метод, будет ограничен доступ для гостей
            (Конкретно будет перенаправлять на хуй знает куда)
        */
        return [
            //AccessBehavior::className(),//А нахуя я его закоментил и везде проверяю на isGuest?
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            $model_site = new Site();
            $searchModel = new SchemeSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            return $this->render('index', [
                'model_site' => $model_site,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionDownload()
    {
        $request = Yii::$app->request;
        $request = $request->post('Site');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("../doc/Template/TemplateSHCH.xlsx");
        $select = Yii::$app->db->createCommand('SELECT station.name, scheme.scheme, scheme.descriptin, scheme.reason, shl.date_utv, shch.number_date_protocol, shch.number_date_raport, shch.date_plan, shch.date_fuck, shch.couse FROM scheme INNER JOIN shl ON scheme.id = shl.number_scheme INNER JOIN shch ON scheme.id = shch.number_scheme INNER JOIN station ON scheme.id_station = station.id WHERE (shl.date_utv BETWEEN \''.$request['date_first']. '\' AND \''. $request['date_second'] . '\') AND scheme.id_org = \'' . Yii::$app->user->identity->id_org .'\'')
            ->queryAll();
        $worksheet = $spreadsheet->getActiveSheet();
        for($i = 0; $i< count($select); $i++)
        {
            $s = 0;
            foreach ($select[$i] as &$item)
            {
                $worksheet->setCellValue("A".("$i"+2), $i+1);
                switch ($s)
                {
                    case(0):
                        $worksheet->setCellValue("B".("$i"+2), $item);
                    case(1):
                        $worksheet->setCellValue("C".("$i"+2), $item);
                    case(2):
                        $worksheet->setCellValue("D".("$i"+2), $item);
                    case(3):
                        $worksheet->setCellValue("E".("$i"+2), $item);
                    case(4):
                        $worksheet->setCellValue("F".("$i"+2), $item);
                    case(5):
                        $worksheet->setCellValue("G".("$i"+2), $item);
                    case(6):
                        $worksheet->setCellValue("H".("$i"+2), $item);
                    case(7):
                        $worksheet->setCellValue("I".("$i"+2), $item);
                    case(8):
                        $worksheet->setCellValue("J".("$i"+2), $item);
                    case(9):
                        $worksheet->setCellValue("K".("$i"+2), $item);
                }
                $s++;
            }
        }
        header('Content-disposition: attachment; filename=Otchet_za_'. date('d-m-Y').'.xlsx');
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        ob_clean();
        flush();
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        return null;
    }

    public function actionLogout()
    {
        if(Yii::$app->user->isGuest)
        {
            return Yii::$app->getResponse()->redirect(array('user/login'));
        }
        else {
            Yii::$app->user->logout();

            return $this->goHome();
        }
    }

    public function actionContact()
    {
            $model = new Site();
            return $this->render('contact', [
                'model' => $model,
            ]);
    }

    public function actionAbout()
    {
            return $this->render('about');
    }
}
