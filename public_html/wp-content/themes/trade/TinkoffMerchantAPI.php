<?php
/*
Template Name: TinkoffMerchantAPI
Template Post Type: post, page, product
 */

get_header();
?>


<?php

class TinkoffMerchantAPI
{
    private $api_url;
    private $terminalKey;
    private $secretKey;
    private $paymentId;
    private $status;
    private $error;
    private $response;
    private $paymentUrl;


    public function __construct($terminalKey, $secretKey)
    {
        $this->api_url = 'https://securepay.tinkoff.ru/v2/';
        $this->terminalKey = $terminalKey;
        $this->secretKey = $secretKey;
    }

    public function __get($name)
    {
        switch ($name) {
            case 'paymentId':
                return $this->paymentId;
            case 'status':
                return $this->status;
            case 'error':
                return $this->error;
            case 'paymentUrl':
                return $this->paymentUrl;
            case 'response':
                return htmlentities($this->response);
            default:
                if ($this->response) {
                    if ($json = json_decode($this->response, true)) {
                        foreach ($json as $key => $value) {
                            if (strtolower($name) == strtolower($key)) {
                                return $json[$key];
                            }
                        }
                    }
                }

                return false;
        }
    }

    /**
     * @param $args mixed You could use associative array or url params string
     * @return bool
     * @throws HttpException
     */
    public function init($args)
    {
        return $this->buildQuery('Init', $args);
    }


    public function getState($args)
    {
        return $this->buildQuery('GetState', $args);
    }

    public function confirm($args)
    {
        return $this->buildQuery('Confirm', $args);
    }

    public function charge($args)
    {
        return $this->buildQuery('Charge', $args);
    }

    public function addCustomer($args)
    {
        return $this->buildQuery('AddCustomer', $args);
    }

    public function getCustomer($args)
    {
        return $this->buildQuery('GetCustomer', $args);
    }

    public function removeCustomer($args)
    {
        return $this->buildQuery('RemoveCustomer', $args);
    }

    public function getCardList($args)
    {
        return $this->buildQuery('GetCardList', $args);
    }

    public function removeCard($args)
    {
        return $this->buildQuery('RemoveCard', $args);
    }

    /**
     * Builds a query string and call sendRequest method.
     * Could be used to custom API call method.
     *
     * @param string $path API method name
     * @param mixed $args query params
     *
     * @return mixed
     * @throws HttpException
     */
    public function buildQuery($path, $args)
    {
        $url = $this->api_url;
        if (is_array($args)) {
            if (!array_key_exists('TerminalKey', $args)) {
                $args['TerminalKey'] = $this->terminalKey;
            }
            if (!array_key_exists('Token', $args)) {
                $args['Token'] = $this->_genToken($args);
            }
        }
        $url = $this->_combineUrl($url, $path);


        return $this->_sendRequest($url, $args);
    }

    /**
     * Generates Token
     *
     * @param $args
     * @return string
     */
    private function _genToken($args)
    {
        $token = '';
        $args['Password'] = $this->secretKey;
        ksort($args);

        foreach ($args as $arg) {
            if (!is_array($arg)) {
                $token .= $arg;
            }
        }
        $token = hash('sha256', $token);

        return $token;
    }

    /**
     * Combines parts of URL. Simply gets all parameters and puts '/' between
     *
     * @return string
     */
    private function _combineUrl()
    {
        $args = func_get_args();
        $url = '';
        foreach ($args as $arg) {
            if (is_string($arg)) {
                if ($arg[strlen($arg) - 1] !== '/') $arg .= '/';
                $url .= $arg;
            } else {
                continue;
            }
        }

        return $url;
    }

    /**
     * Main method. Call API with params
     *
     * @param $api_url
     * @param $args
     * @return bool|string
     * @throws HttpException
     */
    private function _sendRequest($api_url, $args)
    {
        $this->error = '';
        if (is_array($args)) {
            $args = json_encode($args);
        }

        if ($curl = curl_init()) {
            curl_setopt($curl, CURLOPT_URL, $api_url);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $args);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
            ));

            $out = curl_exec($curl);
            $this->response = $out;
            $json = json_decode($out);

            if ($json) {
                if (@$json->ErrorCode !== "0") {
                    $this->error = @$json->Details;
                } else {
                    $this->paymentUrl = @$json->PaymentURL;
                    $this->paymentId = @$json->PaymentId;
                    $this->status = @$json->Status;
                }
            }

            curl_close($curl);

            return $out;

        } else {
            throw new HttpException('Can not create connection to ' . $api_url . ' with args ' . $args, 404);
        }
    }
}



// function __autoload($className)
// {
//     include $className . '.php';
// }

spl_autoload('TinkoffMerchantAPI');
$api = new TinkoffMerchantAPI(
    'TinkoffBankTest',  //Ваш Terminal_Key
    'TinkoffBankTest'   //Ваш Secret_Key
);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css"/>
    <title>Testing Merchant API</title>

    <style>
        
        body {
    background-color: #00796B;
    font-size: 1.2em;
    color: #ffffff;
}

.error {
    color: #B71C1C;
    font-weight: bold;
}

.highlight {
    color: #212121;
    font-weight: bold;
}

.card {
    color: #727272;
    background-color: #fff;
    word-wrap: break-word;
    padding: 0;
    margin: 10px;
    /*margin: -40px 10px 10px 10px;*/
    /*border: 1px solid #9E9E9E;*/
    /*border-top: 50px solid #727272;*/
    /*border-radius: 2px;*/
    box-shadow: 1px 1px 1px #212121;
}

h2 {
    background-color: #727272;
    margin: 0;
    padding: 10px;
    color: #fff;
}

.article {
    margin: 10px;
    padding: 10px;
}

a {
    color: #448AFF;
}


    </style>
</head>
<body>
<h1 align="center">Тестирование MerchantAPI</h1>

<?php

$email = 'test@test.com';
$emailCompany = 'testCompany@test.com';
$phone = '89179990000';

$taxations = [
    'osn'                => 'osn',                // Общая СН
    'usn_income'         => 'usn_income',         // Упрощенная СН (доходы)
    'usn_income_outcome' => 'usn_income_outcome', // Упрощенная СН (доходы минус расходы)
    'envd'               => 'envd',               // Единый налог на вмененный доход
    'esn'                => 'esn',                // Единый сельскохозяйственный налог
    'patent'             => 'patent'              // Патентная СН
];

$paymentMethod = [
    'full_prepayment' => 'full_prepayment', //Предоплата 100%
    'prepayment'      => 'prepayment',      //Предоплата
    'advance'         => 'advance',         //Аванc
    'full_payment'    => 'full_payment',    //Полный расчет
    'partial_payment' => 'partial_payment', //Частичный расчет и кредит
    'credit'          => 'credit',          //Передача в кредит
    'credit_payment'  => 'credit_payment',  //Оплата кредита
];

$paymentObject = [
    'commodity'             => 'commodity',             //Товар
    'excise'                => 'excise',                //Подакцизный товар
    'job'                   => 'job',                   //Работа
    'service'               => 'service',               //Услуга
    'gambling_bet'          => 'gambling_bet',          //Ставка азартной игры
    'gambling_prize'        => 'gambling_prize',        //Выигрыш азартной игры
    'lottery'               => 'lottery',               //Лотерейный билет
    'lottery_prize'         => 'lottery_prize',         //Выигрыш лотереи
    'intellectual_activity' => 'intellectual_activity', //Предоставление результатов интеллектуальной деятельности
    'payment'               => 'payment',               //Платеж
    'agent_commission'      => 'agent_commission',      //Агентское вознаграждение
    'composite'             => 'composite',             //Составной предмет расчета
    'another'               => 'another',               //Иной предмет расчета
];

$vats = [
    'none'  => 'none', // Без НДС
    'vat0'  => 'vat0', // НДС 0%
    'vat10' => 'vat10',// НДС 10%
    'vat20' => 'vat20' // НДС 20%
];

$enabledTaxation = true;
$amount = 1000 * 100;

$receiptItem = [[
    'Name'          => 'product1',
    'Price'         => 200 * 100,
    'Quantity'      => 2,
    'Amount'        => 200 * 2 * 100,
    'PaymentMethod' => $paymentMethod['full_prepayment'],
    'PaymentObject' => $paymentObject['service'],
    'Tax'           => $vats['none']
], [
    'Name'          => 'product2',
    'Price'         => 500 * 100,
    'Quantity'      => 1,
    'Amount'        => 500 * 100,
    'PaymentMethod' => $paymentMethod['full_prepayment'],
    'PaymentObject' => $paymentObject['service'],
    'Tax'           => $vats['vat10']
], [
    'Name'          => 'shipping',
    'Price'         => 100 * 100,
    'Quantity'      => 1,
    'Amount'        => 100 * 100,
    'PaymentMethod' => $paymentMethod['full_prepayment'],
    'PaymentObject' => $paymentObject['service'],
    'Tax'           => $vats['vat20'],
]];

$isShipping = false;

if (!empty($isShipping[2]['Name'] === 'shipping')) {
    $isShipping = true;
}

$receipt = [
    'EmailCompany' => $emailCompany,
    'Email'        => $email,
    'Taxation'     => $taxations['osn'],
    'Items'        => balanceAmount($isShipping, $receiptItem, $amount),
];

function balanceAmount($isShipping, $items, $amount)
{
    $itemsWithoutShipping = $items;

    if ($isShipping) {
        $shipping = array_pop($itemsWithoutShipping);
    }

    $sum = 0;

    foreach ($itemsWithoutShipping as $item) {
        $sum += $item['Amount'];
    }

    if (isset($shipping)) {
        $sum += $shipping['Amount'];
    }

    if ($sum != $amount) {
        $sumAmountNew = 0;
        $difference = $amount - $sum;
        $amountNews = [];

        foreach ($itemsWithoutShipping as $key => $item) {
            $itemsAmountNew = $item['Amount'] + floor($difference * $item['Amount'] / $sum);
            $amountNews[$key] = $itemsAmountNew;
            $sumAmountNew += $itemsAmountNew;
        }

        if (isset($shipping)) {
            $sumAmountNew += $shipping['Amount'];
        }

        if ($sumAmountNew != $amount) {
            $max_key = array_keys($amountNews, max($amountNews))[0];    // ключ макс значения
            $amountNews[$max_key] = max($amountNews) + ($amount - $sumAmountNew);
        }

        foreach ($amountNews as $key => $item) {
            $items[$key]['Amount'] = $amountNews[$key];
        }
    }

    return $items;
}

?>

<?php if (true) : ?>
    <div class="card">
        <h2>Метод Init:</h2>

        <div class="article">
            <?php
            $enabledTaxation = true;

            $params = [
                'OrderId' => 200001,
                'Amount'  => $amount,
                'DATA'    => [
                    'Email'           => $email,
                    'Connection_type' => 'example'
                ],
            ];

            if ($enabledTaxation) {
                $params['Receipt'] = $receipt;
            }

            $api->init($params);
            echo 'Params:';
            ?>

            <p><span class="highlight">Response</span>: <?= $api->response ?></p>

            <?php if ($api->error) : ?>
                <span class="error"><?= $api->error ?></span>
            <?php else: ?>
                <p><span class="highlight">Status</span>: <?= $api->status ?></p>
                <p>
                    <span class="highlight">PaymentUrl</span>:
                    <a href="<?= $api->paymentUrl ?>" target="_blank"><?= $api->paymentUrl ?></a>
                </p>
                <p><span class="highlight">PaymentId</span>: <?= $api->paymentId ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (false) : ?>
    <div class="card">
        <h2>Метод GetState:</h2>

        <div class="article">
            <?php
            $params = [
                'PaymentId' => '2012735',
            ];

            $api->getState($params);
            ?>
            <p><span class="highlight">Response</span>: <?= $api->response ?></p>
            <?php if ($api->error) : ?>
                <p><span class="error"><?= $api->error ?></span></p>
            <?php else: ?>
                <p><span class="highlight">Status</span>: <?= $api->status ?></p>
                <p><span class="highlight">PaymentId</span>: <?= $api->paymentId ?></p>
                <p><span class="highlight">OrderId</span>: <?= $api->orderId ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (false) : ?>
    <div class="card">
        <h2>Метод Confirm:</h2>

        <div class="article">
            <?php
            $params = [
                'PaymentId' => '2014742',
                'Amount'    => 1000 * 100,
            ];

            if ($enabledTaxation) {
                $params['Receipt'] = $receipt;
            }

            $api->confirm($params);
            ?>

            <p><span class="highlight">Response</span>: <?= $api->response ?></p>

            <?php if ($api->error) : ?>
                <span class="error"><?= $api->error ?></span>
            <?php else: ?>
                <p><span class="highlight">Status</span>: <?= $api->status ?></p>
                <p><span class="highlight">PaymentId</span>: <?= $api->paymentId ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (false) : ?>
    <div class="card">
        <h2>Метод AddCustomer</h2>

        <div class="article">
            <?php
            $params = [
                'CustomerKey' => 'TestCustomer',
                'Email'       => $email,
                'Phone'       => $phone,
            ];
            $api->addCustomer($params);
            ?>

            <p><span class="highlight">Response</span>: <?= $api->response ?></p>
            <?php if ($api->error) : ?>
                <p><span class="error"><?= $api->error ?></span></p>
            <?php else: ?>
                <p><span class="highlight">CustomerKey</span>: <?= $api->customerKey ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (true) : ?>
    <div class="card">
        <h2>Метод GetCustomer</h2>

        <div class="article">
            <?php
            $params = [
                'CustomerKey' => 'TestCustomer',
            ];
            $api->getCustomer($params);
            ?>

            <p><span class="highlight">Response</span>: <?= $api->response ?></p>
            <?php if ($api->error) : ?>
                <p><span class="error"><?= $api->error ?></span></p>
            <?php else: ?>
                <p><span class="highlight">CustomerKey</span>: <?= $api->customerKey ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (true) : ?>
    <div class="card">
        <h2>Метод RemoveCustomer</h2>

        <div class="article">
            <?php
            $params = [
                'CustomerKey' => 'TestCustomer',
            ];
            $api->removeCustomer($params);
            ?>

            <p><span class="highlight">Response</span>: <?= $api->response ?></p>
            <?php if ($api->error) : ?>
                <p><span class="error"><?= $api->error ?></span></p>
            <?php else: ?>
                <p><span class="highlight">CustomerKey</span>: <?= $api->customerKey ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (true) : ?>
    <div class="card">
        <h2>Метод GetCardList</h2>

        <div class="article">
            <?php
            $params = [
                'CustomerKey' => 'TestCustomer',
            ];
            $api->getCardList($params);
            ?>

            <p><span class="highlight">Response</span>: <?= $api->response ?></p>
            <?php if ($api->error) : ?>
                <p><span class="error"><?= $api->error ?></span></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if (false) : ?>
    <div class="card">
        <h2>Метод RemoveCard</h2>

        <div class="article">
            <?php
            $params = [
                'CardId'      => '869301',
                'CustomerKey' => 'TestCustomer',
            ];
            $api->removeCard($params);
            ?>

            <p><span class="highlight">Response</span>: <?= $api->response ?></p>
            <?php if ($api->error) : ?>
                <p><span class="error"><?= $api->error ?></span></p>
            <?php else: ?>
                <p><span class="highlight">CustomerKey</span>: <?= $api->customerKey ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

</body>
</html>

<?php
get_footer();