
<!DOCTYPE html>
<html dir="ltr" lang="zh-TW">
<head>
  <meta charset="utf-8">
  <title>ThaiEX</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <link rel="stylesheet" type="text/css" href="home/css/less.css">
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/home/js/jquery-2.1.3.min.js"></script>
</head>
<body class="">
  <header class="header">
    <div class="logo">
        <img src="/home/img/1.png" alt="thaiex">
    </div>
  </header>
<main role="main">
<section class="section hero">
  <div class="hero-inner">
    <form role="search" class="search search-full"  autocomplete="off" action="" accept-charset="UTF-8" method="get">
      <input name="utf8" type="hidden" value="&#x2713;" />
      <i class="search search-full article-search"></i>
      <input type="search" name="query" id="query" placeholder="搜索" autocomplete="off" aria-label="搜尋" />
    </form>
  </div>
</section>
<div class="container">
  <section class="section knowledge-base">
    <section class="categories blocks">
      <ul class="blocks-list">
          @foreach($categorys as $v)
            <li class="blocks-item">
              <a href='/category/{{$v["id"]}}' class="blocks-item-link">
                <h4 class="blocks-item-title">{{$v['name']}}</h4>
                <p class="blocks-item-description"></p>
              </a>
            </li> 
          @endforeach
      </ul>   
    </section>
    <section class="articles">
        <h3>被推薦的文章</h3>
        <ul class="article-list promoted-articles">
          @foreach($recommend as $v)
             <li class="promoted-articles-item">
                <a href="article/content/{{$v['id']}}">
                  {{$v['title']}}
                </a>
              </li>
          @endforeach
        </ul>
      </section>
  </section>
  <section class="section activity">
    <div class="recent-activity">
        <h2 class="recent-activity-header">近期的活動</h2>
        <ul class="recent-activity-list">
                <li class="recent-activity-item" data-recent-activity-action="article_created"><a class="recent-activity-item-parent" href='/category/1'>公告中心</a>
                  <a class="recent-activity-item-link" href="article/content/{{$article1['id']}}">{{$article1['title']}}</a>
                  <div class="recent-activity-item-meta">
                    @if($date1<=0)
                    <div class="recent-activity-item-time">文章刚建立</div>
                    @else
                    <div class="recent-activity-item-time">文章建立於{{$date1}}天前</div>
                    @endif
                   <!--  <div class="recent-activity-item-comment"><span>0</span></div> -->
                  </div>
               </li>
               <li class="recent-activity-item" data-recent-activity-action="article_created"><a class="recent-activity-item-parent" href='/category/2'>操作指南</a>
                  <a class="recent-activity-item-link" href="article/content/{{$article2['id']}}">{{$article2['title']}}</a>
                  <div class="recent-activity-item-meta">
                     @if($date2<=0)
                    <div class="recent-activity-item-time">文章刚建立</div>
                    @else
                    <div class="recent-activity-item-time">文章建立於{{$date2}}天前</div>
                     @endif
                   <!--  <div class="recent-activity-item-comment"><span>0</span></div> -->
                  </div>
               </li>
               <li class="recent-activity-item" data-recent-activity-action="article_created"><a class="recent-activity-item-parent" href='/category/3'>资讯中心</a>
                  <a class="recent-activity-item-link" href="article/content/{{$article3['id']}}">{{$article3['title']}}</a>
                  <div class="recent-activity-item-meta">
                     @if($date3<=0)
                    <div class="recent-activity-item-time">文章刚建立</div>
                    @else
                    <div class="recent-activity-item-time">文章建立於{{$date3}}天前</div>
                     @endif
                   <!--  <div class="recent-activity-item-comment"><span>0</span></div> -->
                  </div>
               </li>
      
      </ul>
    </div>
  </section>
</div>
</main>
<footer class="footer">
  <div class="footer-inner">
    <a title="主頁" href="/hc/zh-tw">ThaiEX</a>
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
<script type="text/javascript">
  $('.article-search').click(function(){
    location.href="/article/search?search="+$('#query').val();
  });
</script>