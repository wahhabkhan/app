<?php

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap\Breadcrumbs;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\View;

/* @var $this View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TextILES Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/backend/web/css/site.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <style>
    /* ... Paste the provided CSS code here ... */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 200px;
        background-color: light ;
        padding: 20px;
        overflow-y: auto;
    }

    .giz-logo-container {
        margin-bottom: 20px;
    }

    .nav {
        flex-direction: column;
    }

    .nav-link {
        padding: 5px 0;
    }

    .content {
        margin-left: 220px;
        padding: 20px;
    }

    .filters {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .stat-box {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        margin-bottom: 20px;
    }

    .stat-box h5 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .table-responsive {
        margin-bottom: 40px;
    }

    h4 {
        margin-bottom: 20px;
    }

    .menu-item {
        position: relative;
        cursor: pointer;
        padding: 8px 0;
        /* Add padding to the top and bottom of the menu items */
        margin: 4px 0;
    }

    .arrow {
        border: solid #333;
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 3px;
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
    }

    .arrow.down {
        transform: translateY(-50%) rotate(45deg);
        
    }

    .arrow.up {
        transform: translateY(-50%) rotate(-135deg);
    }

    .sub-menu {
        display: none;
        padding-left: 20px;
        padding: 8px 0;
        /* Add padding to the top and bottom of the sub-menu items */
        margin: 4px 0;
    }

    .nav a {
        color: #000;
        text-decoration: none;
        font-size: 16px;
        /* Adjust this value to your desired font size */
        padding: 8px 0;
        /* Add padding to the top and bottom of the menu items */
      
    }


    .nav a:hover {
        color: blue;
        
    }

    .menu-item:hover .arrow {
        border-color: blue;
        
    }

    body {
        font-family: Arial, sans-serif;
    }
    .custom-icon {
        color: red !important;
}


    </style>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
    NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md hover navbar-dark bg-primary fixed-top', // Add justify-content-between class
        ],
    ]);
    ?>


        <?php
    $menuItems = [
        ['label' => 'Biovera Europe BV', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'ms-2 font-italic text-light  mb-1']],
        ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'ms-3 text-light mb-1']],
        // Add more menu items as needed.
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login'],
    ];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => [
                'class' => 'logout text-light mb-1 ms-3',
                'data-method' => 'post', // This is the key part for sending a POST request
            ],
        ];
        
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    NavBar::end(); // Close the navbar here
    ?>

    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Alert::widget() ?>
            <div class="sidebar" style="background : light-green">

                <nav class="nav flex-column">
                    <br><br>
                    
                    <div class="menu-item" onclick="toggleSubMenu('customer')">
                        <a class="text-dark font-weight-bold" href="#">Customer</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="customer">
                        <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['customer/create'])?>">Add Customer</a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['customer/index'])?>">View Customer</a>
                    </div>
                    
                    <div class="menu-item" onclick="toggleSubMenu('order')">
                        <a class="text-dark font-weight-bold" href="#">Order</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="order">
                        <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['order/customer-type-selection'])?>">Add Order</a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['order/index'])?>">View Order</a>
                    </div>
                    
                    
                    <div class="menu-item" onclick="toggleSubMenu('stockgoods')">
                        <a class="text-dark font-weight-bold" href="#">Stock of Goods Ready for Sale</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="stockgoods">
                        <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['stock-goods/create'])?>">Add Stock</a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['stock-goods/index'])?>">View Stock</a>
                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('manager')">
                        <a class="text-dark font-weight-bold" href="#">Manager</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="manager">
                        <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['manager/create'])?>">Add Manager</a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['manager/index'])?>">View Manager</a>
                    </div>
                

                

                    <div  class="menu-item" onclick="toggleSubMenu('supplier')">
                        <a class="text-dark font-weight-bold" href="#">Supplier</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="supplier">
                        <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['supplier/create'])?>">Add Supplier
                            </a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['supplier/index'])?>">View Supplier
                            </a>
                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('delivery')">
                        <a class="text-dark font-weight-bold" href="#">Delivery of a <br> Raw Material</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="delivery">
                        <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['delivery-raw-material/create'])?>">Add Delivery
                            </a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['delivery-raw-material/index'])?>">View Delivery
                            </a>
                    </div>



                    <div class="menu-item" onclick="toggleSubMenu('product')">
                        <a class="text-dark font-weight-bold" href="#">Product</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="product">
                        <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['product/create'])?>">Add Product
                            </a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['product/index'])?>">View Product
                            </a>
                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('productionemployees')">
                        <a class="text-dark font-weight-bold" href="#">Production <br> Employee</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="productionemployees">
                            <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['production-employees/create'])?>">Add Employees
                            </a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['production-employees/index'])?>">View Employees
                            </a>
                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('productionbatch')">
                        <a class="text-dark font-weight-bold" href="#">Production <br> Batch</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="productionbatch">
                            <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['production-batch/create'])?>">Add Batch
                            </a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['production-batch/index'])?>">View Batch
                            </a>
                    </div>


                    <div class="menu-item" onclick="toggleSubMenu('user')">
                        <a class="text-dark font-weight-bold" href="#">User</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="user">
                        <a class="btn btn-danger p-2 text-light font-weight-bold" href="<?=Yii::$app->urlManager->createUrl(['user/add-user'])?>">Add User</a>
                        <br>
                        <a class="btn btn-danger p-2 text-light font-weight-bold mt-1" href="<?=Yii::$app->urlManager->createUrl(['user/view-user'])?>">View User</a>
                    </div>
                </nav>

            </div>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">

        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage(); ?>
<script>
function toggleSubMenu(id) {
    const subMenu = document.getElementById(id);
    const arrow = subMenu.previousElementSibling.querySelector('.arrow');
    subMenu.style.display = subMenu.style.display === "block" ? "none" : "block";
    arrow.classList.toggle('down');
    arrow.classList.toggle('up');
}
</script>