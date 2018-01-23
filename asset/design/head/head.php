
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Rin</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <style type="text/css">
  body { padding-top: 80px; }
  @media ( min-width: 768px ) {
    #banner {
      min-height: 300px;
      border-bottom: none;
    }
    .bs-docs-section {
      margin-top: 8em;
    }
    .bs-component {
      position: relative;
    }
    .bs-component .modal {
      position: relative;
      top: auto;
      right: auto;
      left: auto;
      bottom: auto;
      z-index: 1;
      display: block;
    }
    .bs-component .modal-dialog {
      width: 90%;
    }
    .bs-component .popover {
      position: relative;
      display: inline-block;
      width: 220px;
      margin: 20px;
    }
    .nav-tabs {
      margin-bottom: 15px;
    }
    .progress {
      margin-bottom: 10px;
    }
  }
  </style>

  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>

<header>
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a href="/" class="navbar-brand">Rin</a>
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="navbar-collapse collapse" id="navbar-main">
        <ul class="nav navbar-nav">
          <li><a href="/">Top</a></li>
          <li class="dropdown active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Demo <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="./bootstrap-ja.html">Japanese Page</a></li>
              <li><a href="./bootstrap.html">English Page</a></li>
            </ul>
          </li>
          <li><a href="//github.com/raryosu/Rin/releases">Download</a></li>
          <li><a href="//github.com/windyakin/Honoka/wiki">Wiki</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>

<div class="container">

  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-8 col-md-7 col-sm-6">
        <h1>Rin</h1>
        <p class="lead">日本語も美しく表示できるBootstrapテーマ</p>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-6">
        <aside class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">游ゴシックの有効・無効切り替え</h4>
          </div>
          <div class="panel-body">
            <p>v3.3.5から<code>&lt;body&gt;</code>に<code>.no-thank-yu</code>を指定することで游ゴシックを使わないようにすることができるようになりました。</p>
            <p id="anti-yu-gothic-message">現在デモページは游ゴシックの指定が<span class="text-primary">有効</span>になっています。</p>
            <div><button id="anti-yu-gothic-button" class="btn btn-danger btn-block">游ゴシックを無効にする</button></div>
          </div>
        </aside>
      </div>
    </div>
  </div>

  <!-- Navbar
  ================================================== -->
  <div class="bs-docs-section clearfix">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="navbar">Navbar</h1>
        </div>

        <div class="bs-component">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                  <li><a href="#">Link</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">高坂 穂乃果</a></li>
                      <li><a href="#">南 ことり</a></li>
                      <li><a href="#">園田 海未</a></li>
                      <li class="divider"></li>
                      <li><a href="#">小泉 花陽</a></li>
                      <li><a href="#">星空 凛</a></li>
                      <li><a href="#">西木野 真姫</a></li>
                      <li class="divider"></li>
                      <li><a href="#">矢澤 にこ</a></li>
                      <li><a href="#">絢瀬 絵里</a></li>
                      <li><a href="#">東條 希</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">検索</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Link</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>

        <div class="bs-component">
          <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                  <li><a href="#">Link</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">高坂 穂乃果</a></li>
                      <li><a href="#">南 ことり</a></li>
                      <li><a href="#">園田 海未</a></li>
                      <li class="divider"></li>
                      <li><a href="#">小泉 花陽</a></li>
                      <li><a href="#">星空 凛</a></li>
                      <li><a href="#">西木野 真姫</a></li>
                      <li class="divider"></li>
                      <li><a href="#">矢澤 にこ</a></li>
                      <li><a href="#">絢瀬 絵里</a></li>
                      <li><a href="#">東條 希</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">検索</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Link</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div><!-- /example -->
      </div>
    </div>
  </div>
</dir>