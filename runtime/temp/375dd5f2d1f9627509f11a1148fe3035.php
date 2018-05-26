<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:49:"./template/mobile/rainbow/goods/integralMall.html";i:1522317286;s:71:"/home/wwwroot/jinyifuqin.vip/template/mobile/rainbow/public/header.html";i:1522317286;s:75:"/home/wwwroot/jinyifuqin.vip/template/mobile/rainbow/public/header_nav.html";i:1522317286;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>积分商城--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <link rel="stylesheet" href="/template/mobile/rainbow/static/css/style.css">
    <link rel="stylesheet" type="text/css" href="/template/mobile/rainbow/static/css/iconfont.css"/>
    <script src="/template/mobile/rainbow/static/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="/template/mobile/rainbow/static/js/zepto-1.2.0-min.js" type="text/javascript" charset="utf-8"></script>-->
    <script src="/template/mobile/rainbow/static/js/style.js" type="text/javascript" charset="utf-8"></script>
    <script src="/template/mobile/rainbow/static/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/global.js"></script>
    <script src="/template/mobile/rainbow/static/js/layer.js"  type="text/javascript" ></script>
    <script src="/template/mobile/rainbow/static/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo (isset($tpshop_config['shop_info_store_ico']) && ($tpshop_config['shop_info_store_ico'] !== '')?$tpshop_config['shop_info_store_ico']:'/public/static/images/logo/storeico_default.png'); ?>" media="screen"/>
</head>
<body class="">

<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="javascript:history.back(-1)"><img src="/template/mobile/rainbow/static/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>积分商城</span>
        </div>
        <div class="ds-in-bl menu">
            <a href="javascript:void(0);"><img src="/template/mobile/rainbow/static/images/class1.png" alt="菜单"></a>
        </div>
    </div>
</div>
<div class="flool tpnavf">
    <div class="footer">
        <ul>
            <li>
                <a class="yello" href="<?php echo U('Index/index'); ?>">
                    <div class="icon">
                        <i class="icon-shouye iconfont"></i>
                        <p>首页</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Goods/categoryList'); ?>">
                    <div class="icon">
                        <i class="icon-fenlei iconfont"></i>
                        <p>分类</p>
                    </div>
                </a>
            </li>
            <li>
                <!--<a href="shopcar.html">-->
                <a href="<?php echo U('Cart/index'); ?>">
                    <div class="icon">
                        <i class="icon-gouwuche iconfont"></i>
                        <p>购物车</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('User/index'); ?>">
                    <div class="icon">
                        <i class="icon-wode iconfont"></i>
                        <p>我的</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
    <nav class="storenav grst p">
        <ul>
            <li <?php if(\think\Request::instance()->param('rank') == ''): ?>class="red"<?php endif; ?>>
               <a href="<?php echo U('Mobile/Goods/integralMall'); ?>"><span>默认 </span></a>
            </li>
            <li <?php if(\think\Request::instance()->param('rank') == 'num'): ?>class="red"<?php endif; ?>>
                <a href="<?php echo U('Mobile/Goods/integralMall',array('rank'=>'num')); ?>"><span>兑换量</span></a>
                <i></i>
            </li>
            <li <?php if(\think\Request::instance()->param('rank') == 'integral'): ?>class="red"<?php endif; ?>>
                <a href="<?php echo U('Mobile/Goods/integralMall',array('rank'=>'integral')); ?>"><span>积分值</span></a>
                <i></i>
            </li>
        </ul>
    </nav>
    <!--换购商品列表-s-->
    <div id="goods_list">
        <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$good): ?>
            <div class="sc_list se_sclist paycloseto">
                <div class="maleri30">
                    <div class="shopimg fl">
                        <img src="<?php echo goods_thum_images($good['goods_id'],400,400); ?>">
                    </div>
                    <div class="deleshow fr">
                        <a href="<?php echo U('Mobile/Goods/goodsInfo', array('id'=>$good[goods_id])); ?>">
                            <div class="deletes">
                                <span class="similar-product-text"><?php echo $good[goods_name]; ?></span>
                            </div>
                            <div class="prices">
                                <p class="sc_pri">
                                    <span><?php echo round($good[shop_price]-$good[exchange_integral]/$point_rate,2); ?></span>
                                    <span class="cobl">+<?php echo $good[exchange_integral]; ?>积分</span></p>
                            </div>
                        </a>
                        <div class="qxatten">
                            <p class="weight"><span>市场价</span>&nbsp;<span>￥<?php echo $good[market_price]; ?></span></p>
                            <a class="closeannten" href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$good['goods_id'])); ?>" >立即兑换</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--换购商品列表-e-->
    <!--加载更多S-->
    <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): ?>
        <div class="loadbefore">
            <img class="ajaxloading" src="/template/mobile/rainbow/static/images/loading.gif" alt="loading...">
        </div>
    <?php endif; ?>
    <!--加载更多E-->
<script type="text/javascript" src="/template/mobile/rainbow/static/js/sourch_submit.js"></script>
<script type="text/javascript">
    //切换排序
    $(function(){
        $('.storenav ul li span').click(function(){
            $(this).parent().addClass('red').siblings('li').removeClass('red')
            //$(this).siblings().toggleClass('traat');
        });

//        ajax_sourch_submit();
    });

    //加载更多
    var page = 1;
    function ajax_sourch_submit(){
        ++page;
        <?php if(\think\Request::instance()->param('rank')): ?>
            var url = '/index.php/Mobile/Goods/integralMall/p/' + page +'rank/'+ '<?php echo \think\Request::instance()->param('rank'); ?>';
        <?php else: ?>
            var url = '/index.php/Mobile/Goods/integralMall/p/' + page;
        <?php endif; ?>

        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                if (data == '') {
                    $('#getmore').hide();
                    $('.loadbefore').hide();
                } else {
                    $('#goods_list').append(data);
                }
            }
        })
    }
    //滚动加载更多
    $(window).scroll(
        function() {
            var scrollTop = $(this).scrollTop();
            var scrollHeight = $(document).height();
            var windowHeight = $(this).height();
            if (scrollTop + windowHeight == scrollHeight) {
                ajax_sourch_submit();//调用加载更多
            }
        }
    );
</script>
</body>
</html>
