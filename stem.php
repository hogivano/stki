<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
     STKI - Algoritma Stemming Tala & EHCS
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/blk-design-system.css?v=1.0.0" rel="stylesheet" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="profile-page">
    <?php
    include './Controller/ReadController.php';
    foreach ($kata as $i) {
      # code...
      echo $i['kata'];
      echo "\n";
    }
    ?>

  
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index.php" rel="tooltip" title="STKI S1 Sistem Informasi" data-placement="bottom" target="_blank">
          <span>Algoritma Stemming•</span> Tala & EHCS
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                Algoritma Stemming•
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header">
      <img src="assets/img/dots.png" class="dots">
      <img src="assets/img/path4.png" class="path">
      <div class="container align-items-center">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h1 class="profile-title text-left">Tala</h1>
            <h5 class="text-on-back">01</h5>
            <p class="profile-description">Hasil Stemming dengan Algoritma Tala</p>
          </div>
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="ssets/img/mike.jpg" class="img-center img-fluid rounded-circle">
                <h4 class="title">Transactions</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#linka">
                      Wallet
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkb">
                      Send
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkc">
                      News
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-subcategories">
                  <div class="tab-pane active" id="linka">
                    <div class="table-responsive">
                      <table class="table tablesorter " id="plain-table">
                        <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              COIN
                            </th>
                            <th class="header">
                              AMOUNT
                            </th>
                            <th class="header">
                              VALUE
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              BTC
                            </td>
                            <td>
                              7.342
                            </td>
                            <td>
                              48,870.75 USD
                            </td>
                          </tr>
                          <tr>
                            <td>
                              ETH
                            </td>
                            <td>
                              30.737
                            </td>
                            <td>
                              64,53.30 USD
                            </td>
                          </tr>
                          <tr>
                            <td>
                              XRP
                            </td>
                            <td>
                              19.242
                            </td>
                            <td>
                              18,354.96 USD
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="linkb">
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Pay to</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="e.g. 1Nasd92348hU984353hfid">
                          <span class="form-text">Please enter a valid address.</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Amount</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="1.587">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-simple btn-primary btn-icon btn-round float-right"><i class="tim-icons icon-send"></i></button>
                  </div>
                  <div class="tab-pane" id="linkc">
                    <div class="table-responsive">
                      <table class="table tablesorter " id="plain-table">
                        <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              Latest Crypto News
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              The Daily: Nexo to Pay on Stable...
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Venezuela Begins Public of Nation...
                            </td>
                          </tr>
                          <tr>
                            <td>
                              PR: BitCanna – Dutch Blockchain...
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <img src="assets/img/dots.png" class="dots">
      <img src="assets/img/path4.png" class="path">
      <div class="container align-items-center">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <h1 class="profile-title text-left">EHCS</h1>
            <h5 class="text-on-back">02</h5>
            <p class="profile-description">Hasil Stemming dengan Algoritma EHCS</p>
          </div>
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="ssets/img/mike.jpg" class="img-center img-fluid rounded-circle">
                <h4 class="title">Transactions</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#linka">
                      Wallet
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkb">
                      Send
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#linkc">
                      News
                    </a>
                  </li>
                </ul>
                <div class="tab-content tab-subcategories">
                  <div class="tab-pane active" id="linka">
                    <div class="table-responsive">
                      <table class="table tablesorter " id="plain-table">
                        <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              COIN
                            </th>
                            <th class="header">
                              AMOUNT
                            </th>
                            <th class="header">
                              VALUE
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              BTC
                            </td>
                            <td>
                              7.342
                            </td>
                            <td>
                              48,870.75 USD
                            </td>
                          </tr>
                          <tr>
                            <td>
                              ETH
                            </td>
                            <td>
                              30.737
                            </td>
                            <td>
                              64,53.30 USD
                            </td>
                          </tr>
                          <tr>
                            <td>
                              XRP
                            </td>
                            <td>
                              19.242
                            </td>
                            <td>
                              18,354.96 USD
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="linkb">
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Pay to</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="e.g. 1Nasd92348hU984353hfid">
                          <span class="form-text">Please enter a valid address.</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-3 col-form-label">Amount</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="1.587">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-simple btn-primary btn-icon btn-round float-right"><i class="tim-icons icon-send"></i></button>
                  </div>
                  <div class="tab-pane" id="linkc">
                    <div class="table-responsive">
                      <table class="table tablesorter " id="plain-table">
                        <thead class=" text-primary">
                          <tr>
                            <th class="header">
                              Latest Crypto News
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              The Daily: Nexo to Pay on Stable...
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Venezuela Begins Public of Nation...
                            </td>
                          </tr>
                          <tr>
                            <td>
                              PR: BitCanna – Dutch Blockchain...
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title">Algoritma Stemming• Tala & EHCS</h1>
          </div>

        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/blk-design-system.min.js?v=1.0.0" type="text/javascript"></script>
</body>

</html>