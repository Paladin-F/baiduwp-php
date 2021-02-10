<?php

/**
 * PanDownload 网页复刻版，PHP 语言版安装程序
 * 
 * 功能描述：安装PanDownload 网页复刻版
 *
 * 此项目 GitHub 地址：https://github.com/yuantuo666/baiduwp-php
 *
 * @version 1.4.5
 *
 * @author Yuan_Tuo <yuantuo666@gmail.com>
 * @link https://imwcr.cn/
 * @link https://space.bilibili.com/88197958
 *
 */
define('init', true);
if (version_compare(PHP_VERSION, '7.0.0', '<')) {
    http_response_code(503);
    header('Content-Type: text/plain; charset=utf-8');
    header('Refresh: 5;url=https://www.php.net/downloads.php');
    die("HTTP 503 服务不可用！\r\nPHP 版本过低！无法正常运行程序！\r\n请安装 7.0.0 或以上版本的 PHP！\r\n将在五秒内跳转到 PHP 官方下载页面！");
}
if (!(file_exists('functions.php') && file_exists('language.php'))) {
    http_response_code(503);
    header('Content-Type: text/plain; charset=utf-8');
    header('Refresh: 5;url=https://github.com/yuantuo666/baiduwp-php');
    die("HTTP 503 服务不可用！\r\n缺少相关配置和定义文件！无法正常运行程序！\r\n请重新 Clone 项目并进入此页面安装！\r\n将在五秒内跳转到 GitHub 储存库！");
}
// 通用响应头
header('Content-Type: text/html; charset=utf-8');
header('X-UA-Compatible: IE=edge,chrome=1');
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="referrer" content="same-origin" />
    <meta name="author" content="Yuan_Tuo" />
    <meta name="author" content="LC" />
    <title>PanDownload 复刻版 - 安装程序</title>
    <link rel="icon" href="favicon.ico" />
    <!-- <link rel="stylesheet" href="static/index.css" /> -->
    <link rel="stylesheet" disabled id="ColorMode-Auto" href="static/colorMode/auto.css" />
    <link rel="stylesheet" disabled id="ColorMode-Dark" href="static/colorMode/dark.css" />
    <link rel="stylesheet" disabled id="ColorMode-Light" href="static/colorMode/light.css" />
    <link rel="stylesheet" href="static/colorMode/index.css" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/5.8.1/css/all.min.css" />
    <link rel="stylesheet" disabled id="Swal2-Dark" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4.0.2/dark.min.css" />
    <link rel="stylesheet" disabled id="Swal2-Light" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default@4.0.2/default.min.css" />
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.min.js"></script>
    <script src="static/colorMode/index.js"></script>
</head>

<body>
    <div class="container">
        <nav>
            <ol class="breadcrumb my-4">
                <li class="breadcrumb-item"><a href="index.php">baiduwp-php</a></li>
                <li class="breadcrumb-item"><a href="install.php">安装程序</a></li>
                <li class="breadcrumb-item">设置页面</li>
            </ol>
        </nav>

        <?php
        if (!isset($_POST["Sitename"])) {
        ?>
            <!-- 设置页面 -->
            <div class="card">
                <div class="card-header">
                    设置页面
                </div>
                <div class="card-body">
                    <form action="install.php" method="post" id="SettingForm">
                        <h5 class="card-title">站点设置</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">站点名称</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="Pandownload 复刻版" name="Sitename">
                                <small class="form-text text-muted">设置你的站点名称，将在首页标题处显示。</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">是否开启解析密码</label>
                            <div class="col-sm-10">
                                <div class="form-check  form-check-inline">
                                    <input class="form-check-input" type="radio" name="IsCheckPassword" id="IsCheckPassword1" value="true" checked>
                                    <label class="form-check-label" for="IsCheckPassword1">
                                        是
                                    </label>
                                </div>
                                <div class="form-check  form-check-inline">
                                    <input class="form-check-input" type="radio" name="IsCheckPassword" id="IsCheckPassword2" value="false">
                                    <label class="form-check-label" for="IsCheckPassword2">
                                        否
                                    </label>
                                </div>
                                <small class="form-text text-muted">若开启，则在使用解析前必须输入设置的密码；若关闭（一般用于局域网搭建），则无需输入密码即可解析。</small>
                            </div>
                        </div>
                        <div class="form-group row" id="Password">
                            <label class="col-sm-2 col-form-label">解析密码设置</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="Password">
                                <small class="form-text text-muted">在首页需要输入的密码，至少需要6位字符。</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">管理员密码设置</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="ADMIN_PASSWORD">
                                <small class="form-text text-muted">用于登录管理后台(setting.php)的密码。</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">下载次数限制修改</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="DownloadTimes" value="5">
                                <small class="form-text text-muted">设置每一个IP的下载次数。</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">页脚设置</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="Footer" rows="3"></textarea>
                                <small class="form-text text-muted">通常用于设置隐藏的统计代码。</small>
                            </div>
                        </div>
                        <hr />
                        <h5 class="card-title">解析账号设置</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">普通账号BDUSS</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="BDUSS">
                                <small class="form-text text-muted">用来获取文件列表及信息，不需要SVIP也可。</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">普通账号STOKEN</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="STOKEN">
                                <small class="form-text text-muted">用来获取文件列表及信息，不需要SVIP也可。</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">超级会员账号BDUSS</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="SVIP_BDUSS">
                                <small class="form-text text-muted">用来获取文件告诉下载地址，必须为SVIP账号，否则将获取到限速地址。</small>
                            </div>
                        </div>
                        <hr />
                        <h5 class="card-title">MySQL数据库设置</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">是否启用数据库</label>
                            <div class="col-sm-10">
                                <div class="form-check  form-check-inline">
                                    <input class="form-check-input" type="radio" name="USING_DB" id="USING_DB1" value="true" checked>
                                    <label class="form-check-label" for="USING_DB1">
                                        是
                                    </label>
                                </div>
                                <div class="form-check  form-check-inline">
                                    <input class="form-check-input" type="radio" name="USING_DB" id="USING_DB2" value="false">
                                    <label class="form-check-label" for="USING_DB2">
                                        否
                                    </label>
                                </div>
                                <small class="form-text text-muted">如需使用记录解析数据、设置黑\白名单、自动切换限速SVIP账号等功能，需开启数据库。</small>
                            </div>
                        </div>
                        <div id="DbConfig">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">数据库地址</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="DbConfig_servername" value="localhost">
                                    <small class="form-text text-muted">填入MySQL数据库的地址。</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">数据库用户名</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="DbConfig_username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">数据库密码</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="DbConfig_password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">数据库名</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="DbConfig_dbname">
                                    <small class="form-text text-muted">如果此数据库不存在将会在检查连接时自动创建。</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">数据库表名前缀</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="DbConfig_dbtable" value="bdwp">
                                    <small class="form-text text-muted">一般情况无需修改</small>
                                </div>
                            </div>
                            <a href="javascript:CheckMySQLConnect();" class="btn btn-primary">检查数据库连接</a>
                        </div>
                        <hr />

                        <a href="javascript:CheckForm();" class="btn btn-primary">提交</a>
                        <br><br>


                        <script>
                            $("input[name='IsCheckPassword']").on('click', function() {
                                item = $(this).val(); //这里获取的是你点击的那个radio的值，而不是设置的值。（虽然效果是一样的
                                if (item == "false") {
                                    $("div#Password").slideUp();
                                } else {
                                    $("div#Password").slideDown();
                                }
                            });
                            $("input[name='USING_DB']").on('click', function() {
                                item = $(this).val();
                                if (item == "false") {
                                    $("div#DbConfig").slideUp();
                                } else {
                                    $("div#DbConfig").slideDown();
                                }
                            });

                            var SQLConnect = false;

                            function CheckMySQLConnect() {
                                servername = $("input[name='DbConfig_servername']").val();
                                username = $("input[name='DbConfig_username']").val();
                                password = $("input[name='DbConfig_password']").val();
                                dbname = $("input[name='DbConfig_dbname']").val();
                                dbtable = $("input[name='DbConfig_dbtable']").val();

                                async function postAPI(method, body) { // 获取 API 数据
                                    try {
                                        const response = await fetch(`api.php?m=${method}`, { // fetch API
                                            credentials: 'same-origin', // 发送验证信息 (cookies)
                                            method: 'POST',
                                            headers: {
                                                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
                                            },
                                            body: body,
                                        });
                                        if (response.ok) { // 判断是否出现 HTTP 异常
                                            return {
                                                success: true,
                                                data: await response.json() // 如果正常，则获取 JSON 数据
                                            }
                                        } else { // 若不正常，返回异常信息
                                            return {
                                                success: false,
                                                msg: `服务器返回异常 HTTP 状态码：HTTP ${response.status} ${response.statusText}.`
                                            };
                                        }
                                    } catch (reason) { // 若与服务器连接异常
                                        return {
                                            success: false,
                                            msg: '连接服务器过程中出现异常，消息：' + reason.message
                                        };
                                    }
                                }


                                body = `servername=${servername}&username=${username}&password=${password}&dbname=${dbname}&dbtable=${dbtable}`;

                                postAPI('CheckMySQLConnect', body).then(function(response) {
                                    if (response.success) {
                                        const data = response.data;
                                        if (data.error == 0) {
                                            //连接成功
                                            Swal.fire({
                                                title: "数据库连接成功",
                                                html: "请完成其他信息填写并提交。<br />详细信息：" + data.msg
                                            });
                                            $("input[name='DbConfig_servername']").attr("readonly", true); //禁用修改，防止提交后出错
                                            $("input[name='DbConfig_username']").attr("readonly", true);
                                            $("input[name='DbConfig_password']").attr("readonly", true);
                                            $("input[name='DbConfig_dbname']").attr("readonly", true);
                                            SQLConnect = true;
                                        } else {
                                            ;
                                            //连接失败
                                            Swal.fire({
                                                title: "数据库连接错误",
                                                html: "请检查你的数据库设置，并重新提交。<br />详细信息：" + data.msg
                                            });
                                        }
                                    }
                                });

                            }

                            function CheckForm() {
                                USING_DB = $("input[name='USING_DB']:checked").val();
                                ADMIN_PASSWORDLength = $("input[name='ADMIN_PASSWORD']").val().length;

                                if (ADMIN_PASSWORDLength < 6) {
                                    //密码过短
                                    Swal.fire({
                                        title: "密码过短",
                                        html: "请检查你设置的密码，为保证站点安全，管理员密码必须为6位或6位以上。"
                                    })
                                    return 0;
                                }
                                if (USING_DB == "true") {
                                    if (!SQLConnect) {
                                        //暂未连接数据库
                                        Swal.fire({
                                            title: "暂未连接数据库",
                                            html: "请先点击检查数据库连接按钮，再提交数据。"
                                        })
                                        return 0;
                                    }
                                }
                                $("#SettingForm").submit();
                            }
                        </script>
                </div>
            </div>

        <?php
        } else {
        ?>
            <div class="card">
                <div class="card-header">
                    设置页面
                </div>
                <div class="card-body">
                    安装结果：
                <?php
                //已经获取到所需信息，先导入数据库，再写配置到config.php

                //处理post数据
                $Sitename = (!empty($POST["Sitename"])) ? $_POST["Sitename"] : "";
                $IsCheckPassword = (!empty($_POST["IsCheckPassword"])) ? $_POST["IsCheckPassword"] : "";
                $Password = (!empty($_POST["Password"])) ? $_POST["Password"] : "";
                $ADMIN_PASSWORD = (!empty($_POST["ADMIN_PASSWORD"])) ? $_POST["ADMIN_PASSWORD"] : "";
                $DownloadTimes = (!empty($_POST["DownloadTimes"])) ? $_POST["DownloadTimes"] : "";
                $Footer = (!empty($_POST["Footer"])) ? $_POST["Footer"] : "";

                $BDUSS = (!empty($_POST["BDUSS"])) ? $_POST["BDUSS"] : "";
                $STOKEN = (!empty($_POST["STOKEN"])) ? $_POST["STOKEN"] : "";
                $SVIP_BDUSS = (!empty($_POST["SVIP_BDUSS"])) ? $_POST["SVIP_BDUSS"] : "";

                $USING_DB = (!empty($_POST["USING_DB"])) ? $_POST["USING_DB"] : "";
                $servername = (!empty($_POST["DbConfig_servername"])) ? $_POST["DbConfig_servername"] : "";
                $username = (!empty($_POST["DbConfig_username"])) ? $_POST["DbConfig_username"] : "";
                $password = (!empty($_POST["DbConfig_password"])) ? $_POST["DbConfig_password"] : "";
                $dbname = (!empty($_POST["DbConfig_dbname"])) ? $_POST["DbConfig_dbname"] : "";
                $dbtable = (!empty($_POST["DbConfig_dbtable"])) ? $_POST["DbConfig_dbtable"] : "";

                //连接数据库
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("数据库连接错误，详细信息：" . mysqli_connect_error());
                }
                //打开sql文件
                $SQLfile = file_get_contents("./install/bdwp.sql");
                if ($SQLfile == false) die("无法打开bdwp.sql文件");

                $SQLfile = str_replace('<dbtable>', $dbtable, $SQLfile);

                $sccess_result = 0;
                if (mysqli_multi_query($conn, $SQLfile)) {
                    do {
                        $sccess_result = $sccess_result + 1;
                    } while (mysqli_more_results($conn) && mysqli_next_result($conn));
                }

                $affect_row = mysqli_affected_rows($conn);
                if ($affect_row == -1) {
                    die("数据库导入出错，错误在" . $sccess_result . "行");
                } else {
                    echo "数据库导入成功，成功导入" . $sccess_result . "条数据<br />";
                }
                //修改文件
                $raw_config = file_get_contents("./install/config_raw");
                if ($raw_config == false) die("无法打开config_raw文件");


                $update_config = $raw_config;

                $update_config = str_replace('<Sitename>', $Sitename, $update_config);
                $update_config = str_replace('<IsCheckPassword>', $IsCheckPassword, $update_config);
                $update_config = str_replace('<Password>', $Password, $update_config);
                $update_config = str_replace('<ADMIN_PASSWORD>', $ADMIN_PASSWORD, $update_config);
                $update_config = str_replace('<DownloadTimes>', $DownloadTimes, $update_config);
                $update_config = str_replace('<Footer>', $Footer, $update_config);

                $update_config = str_replace('<BDUSS>', $BDUSS, $update_config);
                $update_config = str_replace('<STOKEN>', $STOKEN, $update_config);
                $update_config = str_replace('<SVIP_BDUSS>', $SVIP_BDUSS, $update_config);

                $update_config = str_replace('<USING_DB>', $USING_DB, $update_config);
                $update_config = str_replace('<servername>', $servername, $update_config);
                $update_config = str_replace('<username>', $username, $update_config);
                $update_config = str_replace('<password>', $password, $update_config);
                $update_config = str_replace('<dbname>', $dbname, $update_config);
                $update_config = str_replace('<dbtable>', $dbtable, $update_config);

                $len = file_put_contents('config.php', $update_config);

                if ($len != false) {
                    echo "成功！成功写入 config.php 共 $len 个字符。<br />";
                } else {
                    die("写入 config.php 文件失败，请检查 config.php 文件状态及当前用户权限。");
                }
                echo "恭喜你！你的安装成功了~<br /><a href='./index.php'>点此链接</a>前往主页查看。";
            }
                ?>
                </div>
            </div>

    </div>

</body>

</html>