<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('../css/login.css')}}" />
    <title>Your Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h4 class="mb-3">Dashboard</h4>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{$_c['currency_code']} {number_format($iday, 0, $_c['dec_point'], $_c['thousands_sep'])}</h4>
                        <p class="card-text">{$_L['Income_Today']}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{$_url}reports/by-date" class="card-link">{$_L['View_Reports']}</a>
                    </div>
                </div>
            </div>
            <!-- ... Lanjutkan dengan kotak-kotak lainnya ... -->
        </div>
        <!-- ... Lanjutkan dengan sebagian besar konten Anda ... -->
    </div>
    {else}
    <div class="container mt-5">
        <h4 class="mb-3">{$_L['Welcome']}, {$_user['fullname']}</h4>
        <p>{$_L['Welcome_Text_User']}</p>
        <ul>
            <li>{$_L['Account_Information']}</li>
            <li><a href="{$_url}voucher/activation">{$_L['Voucher_Activation']}</a></li>
            <li><a href="{$_url}voucher/list-activated">{$_L['List_Activated_Voucher']}</a></li>
            <li><a href="{$_url}accounts/change-password">{$_L['Change_Password']}</a></li>
            <li>{$_L['Order_Voucher']}</li>
            <li>{$_L['Private_Message']}</li>
        </ul>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">{$_L['Account_Information']}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="small text-success text-uppercase text-normal">{$_L['Username']}</p>
                        <p class="small mb-3">{$_bill['username']}</p>
                    </div>
                    <!-- ... Lanjutkan dengan informasi akun lainnya ... -->
                </div>
            </div>
        </div>
    </div>
    {/if}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            $.getJSON("./version.json?" + Math.random(), function (data) {
                var localVersion = data.version;
                $('#version').html('Version: ' + localVersion);
                $.getJSON("https://raw.githubusercontent.com/ibnux/phpmixbill/master/version.json?" + Math.random(), function (data) {
                    var latestVersion = data.version;
                    if (localVersion !== latestVersion) {
                        $('#version').html('Latest Version: ' + latestVersion);
                    }
                });
            });

        });
    </script>

    {include file="sections/footer.tpl"}
</body>
</html>
