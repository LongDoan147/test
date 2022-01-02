<header style="background: orange; margin-bottom: 10px; color: white;">
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mainmenu">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="index.php">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php foreach ($protype->getAll() as $value) { ?>
                                        <li><a href="cate.php?type=<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li>Blog</li>
                            <li>Liên hệ</li>
                            <li><a href="cart.php">Giỏ hàng</a></li>                      
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="search">
                        <div class="search_box pull-right">
                            <form action="result.php" method="get">
                                <input type="text" placeholder="Search" name="key" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>