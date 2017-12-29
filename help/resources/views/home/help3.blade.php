
<!DOCTYPE html>
<html dir="ltr" lang="zh-TW">
<head>
  <meta charset="utf-8">
  <!-- v13180 -->
  <title>搜索结果</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <link rel="stylesheet" type="text/css" href="/home/css/less.css">
  <script src="/home/js/jquery-2.1.3.min.js"></script>
</head>
<body class="">
  <header class="header">
    <div class="logo">
       <img src="/home/img/1.png" alt="ThaiEX">
    </div>
  </header>
<main role="main">
    <div class="container-divider"></div>
<div class="container">
  <nav class="sub-nav">
    <ol class="breadcrumbs">
      <li title="ThaiEX">
          <a href="/article">ThaiEX</a>
      </li>
      <li title="搜索结果"> 
          搜索结果
      </li>
    </ol>
  </nav>
  <div class="section-container">
    <section class="section-content">
      <header class="page-header">
        <h1>
           搜索结果
        </h1>
      </header>
      <ul class="article-list">     
          @foreach($articles as $v)
             
                 <li class="article-list-item ">
                  <a href="/article/content/{{$v['id']}}">{{$v['title']}}</a>
                 </li>
             
          @endforeach   
      </ul>
    </section>
  </div>
</div>
</main>
  <footer class="footer">
  <div class="footer-inner">
    <a title="ThaiEX" href="/article">ThaiEX</a>
    <div class="footer-language-selector">
        <div class="dropdown language-selector" aria-haspopup="true">
          <a class="dropdown-toggle">
            繁體中文
          </a>
          <span class="dropdown-menu dropdown-menu-end" role="menu">
              <a href="#" dir="ltr" rel="nofollow" role="menuitem">
                English (US)
              </a>
          </span>
        </div>
    </div>
  </div>
</footer>

</body>
</html>